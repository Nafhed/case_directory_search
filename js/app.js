var app = angular.module('CaseDirectory', [
  'CaseDirectory.controllers', 'ngRoute'
]);

app.value("searchCriteria",{
    area_of_bristol: {
      area_value: ''
    },
    construction_types: [],
    house_types: [],
    bedrooms: {
      min: 0,
      max: 7
    },
    conservation_listed: '',
    age_of_home: '',
    epc: [],
    measure: [],
    solution: [],
    installer: '',
    supplier: ''
});

jQuery(function($) {

  $('.select-picker').selectpicker();

});
