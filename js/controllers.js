
var ajaxURL = "/sites/bristolgreendoors.org/modules/custom/bgd_case_directory/ajax.php";

angular.module('CaseDirectory.controllers', ['ui.bootstrap.typeahead', 'ui.bootstrap.dropdown', 'ui.bootstrap.buttons', 'ui.bootstrap.tooltip', 'ui.bootstrap.pagination', 'ui.bootstrap.tpls', 'uiSwitch', 'ui-rangeSlider', 'ngStorage']).controller('TypeaheadCtrl', function($scope, $http) {

    $scope.getTypeahead = function(val, field) {
        params = {op: 'autocomplete'};
        params[field] = val;
        return $http.post(ajaxURL, params).then(function(response) {
            return response.data.results;
        });
    };

}).controller('SearchCtrl', function($scope, $http, $log, $location, $window, $sessionStorage, SelectedTerms, searchCriteria) {

  // SelectedTerms = $sessionStorage;

  // get the number of nested objects
  $scope.sizeOf = function(obj) {
    return Object.keys(obj).length;
  };

  // check if there are any true values in nested object
  $scope.checkExisting = function(obj, key) {

    switch(key) {

      case 'house':
        if(obj.age_of_home.value || obj.construction_types.value || obj.conservation_listed)
          return true;
      break;

      case 'measure':
        for(var measure in obj.measure)
          if(obj.hasOwnProperty(measure))
            if(obj[measure])
              return true;
      break;

      case 'epc':
        for(var epc in obj)
          if(obj.hasOwnProperty(epc))
              if(obj[epc])
                return true;
      break;

      case 'trade':
        if(obj.installer || obj.supplier)
          return true;
      break;

      case 'advanced-solution':
          for(var adv in obj.solution)
            if(obj.hasOwnProperty(adv))
              if(obj[adv])
                return true;
      break;

      case 'advanced-house':
        if((obj.house_types.value) || (obj.bedrooms.min != 0 || obj.bedrooms.max != 4)) // reflected within the template
            return true;
      break;

      default:
        return false;
      break;

    }

    return false;
  };

  $scope.redirect = function(page) {
    window.location.href = page;
  };

  $scope.selected = searchCriteria;

  // set values / defaults
  $scope.house_types                = Drupal.settings.CaseDirectory.house_types;
  $scope.no_of_rooms                = Drupal.settings.CaseDirectory.no_of_rooms;
  $scope.area_of_bristol            = Drupal.settings.CaseDirectory.area_of_bristol;
  $scope.construction_types         = Drupal.settings.CaseDirectory.construction_types;
  $scope.age_of_home                = Drupal.settings.CaseDirectory.age_of_home;
  $scope.installers_suppliers       = Drupal.settings.CaseDirectory.installers_suppliers;


  // revert the search
  $scope.area_of_bristol.unshift(
    {
      area_label: "All",
      area_value: ""
    }
  );

  $scope.age_of_home.unshift({
      id: 0,
      label: "All",
      optgrpid: 269,
      value: ""
  });
  $scope.house_types.unshift({
      id: 0,
      label: "All",
      optgrpid: 270,
      value: ""
  });
  $scope.construction_types.unshift({
      id: 0,
      label: "All",
      optgrpid: 271,
      value: ""
  });

  if(!$sessionStorage.hasOwnProperty('selected')) {

    // $sessionStorage.selected = '';
    SelectedTerms = searchCriteria;

    $scope.radioModel = {
      conservation_listed: '',
      work_in_progress: '',
      wheelchair_access: '',
      opening_days: '',
    };

    $scope.checkModel = {
      epc: {
        A: false,
        B: false,
        C: false,
        D: false,
        E: false,
        F: false
      },
      measure: {
        draughts_ventilation: false,
        heating: false,
        measure: false,
        windows: false,
        lighting: false,
        solar_energy: false,
        building_changing_home: false,
        managing_water: false
      },
      solution: {
        air_tightness: false,
        draught_proofing: false,
        extensions_conversions: false,
        glazing_high_quality: false,
        glazing_double_secondary: false,
        heating_biomass_wood: false,
        heating_other: false,
        heating_pumps: false,
        heating_boiler: false,
        insulation_solid_wall: false,
        insulation_floor_ceiling: false,
        insulation_other: false,
        low_e_lighting: false,
        other_energy: false,
        solar_pv: false,
        ventilation: false,
        solar_water: false,
        outdoor_spaces: false,
        materials: false,
        water_management: false,
        energy_management: false,
        design_features: false
      }
    };

      // look for changes in Checkboxes
      $scope.$watch("checkModel + selected", function() {

        $scope.selected.epc = $scope.checkModel.epc;
        $scope.selected.measure = $scope.checkModel.measure;
        $scope.selected.solution = $scope.checkModel.solution;

        $sessionStorage.selected = $scope.selected;

      });
  }

  if($sessionStorage.hasOwnProperty('selected') && $scope.sizeOf($sessionStorage.selected)) {

    $scope.selected = $sessionStorage.selected;

    $scope.checkModel = {
      epc: $scope.selected.epc,
      measure: $scope.selected.measure,
      solution: $scope.selected.solution
    };

      $scope.numPages = function() {
        return Math.ceil($scope.resultsCount / $scope.pagedResults.count);
      }

      // look for changes in Checkboxes
      $scope.$watch("checkModel", function() {

        $scope.selected.epc = $scope.checkModel.epc;
        $scope.selected.measure = $scope.checkModel.measure;
        $scope.selected.solution = $scope.checkModel.solution;

        $sessionStorage.selected = $scope.selected;
      });
  }

  $scope.toggleDropdown = function($event) {
    $event.preventDefault();
    $event.stopPropagation();
    $scope.status.isopen = !$scope.status.isopen;
  };

  $scope.setSelectedValue = function(value) {
    // change to the selected values for dropdowns
    if('area_value' in value) {
      $scope.selected.area_of_bristol = value;
    } else if(value.optgrpid == "270") {
      $scope.selected.house_types = value;
    } else if(value.optgrpid == "271") {
      $scope.selected.construction_types = value;
    } else if(value.optgrpid == "272") {
      $scope.selected.no_of_bedrooms = value;
    } else if(value.optgrpid == "269") {
      $scope.selected.age_of_home = value;
    }

    // // $scope.selected = SelectedTerms;
    // SelectedTerms = $scope.selected;
  }

  // AngularJS -> BootStrap UI - Pagination control
  $scope.setPage = function(pageNo) {
    SelectedTerms.currentPage = $scope.currentPage;
  }

  $scope.pageChanged = function() {
    $log.log('Page changed to: ' + $scope.currentPage);
  };

  // debugging information
  // console.log('settings ', Drupal.settings);
  // console.log('angular search scope ', $scope);

}).controller('SearchResults', function($scope, $http, $log, $sessionStorage, SelectedTerms, searchCriteria) {


  // chunk results for pagination and grouping output into <row>
  function chunk(arr, size) {
    var newArr = [];
    for (var i=0; i<arr.length; i+=size) {
    newArr.push(arr.slice(i, i+size));
    }
    return newArr;
  }

  // https://github.com/coolaj86/knuth-shuffle
  // shuffle the results to create a random order
  function shuffle(array) {
    var currentIndex = array.length
      , temporaryValue
      , randomIndex
      ;

    // While there remain elements to shuffle...
    while (0 !== currentIndex) {

      // Pick a remaining element...
      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex -= 1;

      // And swap it with the current element.
      temporaryValue = array[currentIndex];
      array[currentIndex] = array[randomIndex];
      array[randomIndex] = temporaryValue;
    }

    return array;
  }



    $scope.sizeOf = function(obj) {
      return Object.keys(obj).length;
    };

    $scope.pages = {
      currentPage: 1,
      resultsPerPage: 4
    };

    function showMe( query ) {

      SelectedTerms = searchCriteria;
      $scope.selected = $sessionStorage.selected ? $sessionStorage.selected:SelectedTerms;

      if($scope.sizeOf($sessionStorage.selected))
        SelectedTerms = $sessionStorage.selected;

        $http.post(ajaxURL, {
          op: 'search',
          // house_type: SelectedTerms.house_types.value,
          area_of_bristol: $scope.selected.area_of_bristol.area_value,
          construction_type: $scope.selected.construction_types.value,
          conservation_listed: $scope.selected.conservation_listed,
          wheelchair_access: $scope.selected.wheelchair_access,
          work_in_progress: $scope.selected.work_in_progress,
          age_of_home: $scope.selected.age_of_home.value,
          number_of_bedrooms: $scope.selected.bedrooms,
          opening_days: $scope.selected.opening_days,
          installer: $scope.selected.installer,
          supplier: $scope.selected.supplier,
          measure: $scope.selected.measure,
          solution: $scope.selected.solution,
          epc_rating: $scope.selected.epc,
          limit: $scope.selected.resultsCount
        })
        .success(function(data, status) {
          if(data) {
            $scope.resultsCount = data.results.length;
            $scope.status = data.status;

            if($scope.resultsCount > 0) {
              // assign total - just once!
              if($scope.total === undefined) {
                $scope.total = data.results.length;
              }

              $scope.results = chunk(shuffle(data.results), 3);

              // watch for a change in paged results, then output the next/previous page
              $scope.$watch("$scope.pages.currentPage + $scope.pages.resultsPerPage", function() {

                var begin = (($scope.pages.currentPage - 1) * $scope.pages.resultsPerPage), end = begin + $scope.pages.resultsPerPage;
                  
                $scope.pagedResults = $scope.results.slice(begin, end);

                // count lengths of the paged results
                var sum = 0;
                for(var i=0; i < $scope.pagedResults.length; i++) {
                  sum += $scope.pagedResults[i].length;
                }
                $scope.pagedResults.count = sum;
              });

              // $log.log('results length', data.results.length);
              // $log.log('sql = ', data.query);
              // $log.log('array = ', data.array);
            } else {
              $scope.results = data.results;
              $scope.pagedResults = 0;
              $scope.resultsCount = 0;
              $scope.error = {
                results: 'Sorry, there are no results to display'
              }
            }
          }
      })
      .error(function(data, status) {

        // $log.log(data);

        $scope.status = data.status;
        $scope.data = "Sorry, no results were found";
      });
    };

  // listen for changes in the web storage
  $scope.$watch(function () {
    return $sessionStorage.selected;
  }, function ($scope) {

    return showMe($scope);
  }, true); 

  // listen for changes in pagination
  $scope.$watch(function () {
    return $scope.pages;
  }, function ($scope) {

    return showMe($scope);
  }, true); 

}).directive('frontImage', function() {

  return {
    restrict: 'A',
    replace: true,
    template: '<img ng-attr-src="{{item.hero_image_uri || \'/sites/bristolgreendoors.org/modules/custom/bgd_case_directory/images/img-default-house.jpg\'}}" />'
  };

}).filter('gridFormat', function() {
   return function(layout, size) {
    // console.log(layout);
    // console.log(size);
        var layoutGroup = [], i = 1;
        while(layout[size*(i-1)]) {
            layoutGroup.push(layout.slice(size*(i-1), size*i));
            i++;
        }
        // console.log(layoutGroup);
        return layoutGroup;
    }
}).factory('SelectedTerms', function() { 

    return {};
});
