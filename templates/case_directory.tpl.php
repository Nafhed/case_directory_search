<div class="row" ng-app="CaseDirectory">
  <div id="search-ctrls" ng-controller="SearchCtrl" class="col-lg-3 col-md-5 col-xs-12">
    <form id="caseSearch" class="grid-4" role="search-form">
      <fieldset class="section-house">
        <legend class="icon icon-house" ng-class="{'collapsed': !checkExisting(selected, 'house')}" data-toggle="collapse" data-target="#houseSearch" aria-controls="houseSearch">House <span class="caret"></span></legend>
        <div class="form-options collapse" ng-class="{'in': checkExisting(selected, 'house')}" id="houseSearch">
          <div class="form-control select-list">
            <span class="dropdown" dropdown on-toggle="toggled(open)">
              <label for="age_of_home"><a href class="dropdown-toggle" ng-bind="(selected.age_of_home.label) || 'Select age of home...'" dropdown-toggle></a></label>
              <ul class="dropdown-menu">
                <li ng-repeat="age in age_of_home">
                  <a ng-click="setSelectedValue(age)" href>{{age.label}}</a>
                </li>
              </ul>
            </span>
          </div>
          <div class="form-control select-list">
            <span class="dropdown" dropdown on-toggle="toggled(open)">
              <label for="construction_types"><a href class="dropdown-toggle" ng-bind="(selected.construction_types.label) || 'Select construction type...'" dropdown-toggle></a></label>
              <ul class="dropdown-menu">
                <li ng-repeat="construction in construction_types">
                  <a ng-click="setSelectedValue(construction)" href>{{construction.label}}</a>
                </li>
              </ul>
            </span>
          </div>
          <div class="form-control radio-buttons">
            <label for="conservation-listed">Conservation/Listed</label>
            <!-- <pre>{{ radioModel.conservation_listed || 'null' }}</pre> -->
            <div class="radio-container">
              <div class="radio-control"><div class="radio-border"><span class="opt single-mode opt-radio" ng-model="selected.conservation_listed" btn-radio="'Yes'" ng-change="showMe()" uncheckable>Yes</span></div><label for="Conservation listed">Yes</label></div>
              <div class="radio-control"><div class="radio-border"><span class="opt single-mode opt-radio" ng-model="selected.conservation_listed" btn-radio="'No'" ng-change="showMe()" uncheckable>No</span></div><label for="Conservation listed">No</label></div>
            </div>
          </div>
        </div>
      </fieldset>

      <fieldset class="section-measures">
        <legend class="icon icon-measures" ng-class="{'collapsed': !checkExisting(selected.measure, 'measure')}" data-toggle="collapse" data-target="#measuresAdvancedSearch" aria-controls="measuresAdvancedSearch">What's been improved <span class="caret"></span></legend>
        <div class="form-options collapse" ng-class="{'in': checkExisting(selected.measure, 'measure')}" id="measuresAdvancedSearch">
          <div class="measure-option">
            <switch id="enabled" name="enabled" ng-model="checkModel.measure.building_changing_home" ng-change="showMe()" class="opt-measure measure-building_changing_home"></switch><label class="label-measure measure-building_changing_home">Building &amp; changing your home</label>
          </div>
          <div class="measure-option">
            <switch id="enabled" name="enabled" ng-model="selected.measure.draughts_ventilation" ng-change="showMe()" class="opt-measure measure-draughts_ventilation"></switch><label class="label-measure">Draughts &amp; Ventilation</label>
          </div>
          <div class="measure-option">
            <switch id="enabled" name="enabled" ng-model="checkModel.measure.heating" ng-change="showMe()" class="opt-measure measure-heating"></switch><label class="label-measure measure-heating">Heating</label>
          </div>
          <div class="measure-option">
            <switch id="enabled" name="enabled" ng-model="checkModel.measure.keeping_heat_in" ng-change="showMe()" class="opt-measure measure-keeping_heat_in"></switch><label class="label-measure measure-keeping_heat_in">Keeping heat in</label>
          </div>
          <div class="measure-option">
            <switch id="enabled" name="enabled" ng-model="checkModel.measure.lighting" ng-change="showMe()" class="opt-measure measure-lighting"></switch><label class="label-measure measure-lighting">Lighting</label>
          </div>
          <div class="measure-option">
            <switch id="enabled" name="enabled" ng-model="checkModel.measure.managing_water" ng-change="showMe()" class="opt-measure measure-managing_water"></switch><label class="label-measure measure-managing_water">Managing energy and water</label>
          </div>
          <div class="measure-option">
            <switch id="enabled" name="enabled" ng-model="checkModel.measure.solar_energy" ng-change="showMe()" class="opt-measure measure-solar_energy"></switch><label class="label-measure measure-solar_energy">Solar &amp; Renewable Energy</label>
          </div>
          <div class="measure-option">
            <switch id="enabled" name="enabled" ng-model="checkModel.measure.windows" ng-change="showMe()" class="opt-measure measure-windows"></switch><label class="label-measure measure-windows">Windows</label>
          </div>
        </div>
      </fieldset>

      <fieldset class="epc-level">
        <legend class="icon icon-epc" ng-class="{'collapsed': !checkExisting(selected.epc, 'epc')}" data-toggle="collapse" data-target="#epcSearch" aria-controls="epcSearch">EPC Level <span class="caret"></span></legend>
        <div class="form-options collapse" ng-class="{'in': checkExisting(selected.epc, 'epc')}" id="epcSearch">
<!--           <pre>{{ checkModel.epc || 'null' }}</pre> -->
          <div class="form-options checkbox-buttons">
            <div class="checkbox-control"><div class="checkbox-border"><span class="opt-checkbox" ng-model="checkModel.epc.A" ng-change="showMe()" btn-checkbox></span></div><label class="opt-epc epc-rating-a">A <span class="badge">(92+)</span></label></div>
            <div class="checkbox-control"><div class="checkbox-border"><span class="opt-checkbox" ng-model="checkModel.epc.B" ng-change="showMe()" btn-checkbox></span></div><label class="opt-epc epc-rating-b">B <span class="badge">(81-90)</span></label></div>
            <div class="checkbox-control"><div class="checkbox-border"><span class="opt-checkbox" ng-model="checkModel.epc.C" ng-change="showMe()" btn-checkbox></span></div><label class="opt-epc epc-rating-c">C <span class="badge">(69-80)</span></label></div>
            <div class="checkbox-control"><div class="checkbox-border"><span class="opt-checkbox" ng-model="checkModel.epc.D" ng-change="showMe()" btn-checkbox></span></div><label class="opt-epc epc-rating-d">D <span class="badge">(55-68)</span></label></div>
            <div class="checkbox-control"><div class="checkbox-border"><span class="opt-checkbox" ng-model="checkModel.epc.E" ng-change="showMe()" btn-checkbox></span></div><label class="opt-epc epc-rating-e">E <span class="badge">(39-54)</span></label></div>
            <div class="checkbox-control"><div class="checkbox-border"><span class="opt-checkbox" ng-model="checkModel.epc.F" ng-change="showMe()" btn-checkbox></span></div><label class="opt-epc epc-rating-f">F <span class="badge">(21-38)</span></label></div>
          </div>
        </div>
      </fieldset>

      <fieldset class="section-area">
        <legend class="icon icon-area" ng-class="{'collapsed': !selected.area_of_bristol.area_value}" data-toggle="collapse" data-target="#areaSearch" aria-controls="areaSearch">Area <span class="caret"></span></legend>
        <div class="form-options collapse" ng-class="{'in': selected.area_of_bristol.area_value}" id="areaSearch">
          <div class="form-control select-list">
            <span class="dropdown" dropdown on-toggle="toggled(open)">
              <label for="area_of_bristol"><a href class="dropdown-toggle" ng-bind="(selected.area_of_bristol.area_label) || 'Select an area...'" dropdown-toggle>
              </a></label>
              <ul class="dropdown-menu">
                <li ng-repeat="area in area_of_bristol">
                  <a ng-click="setSelectedValue(area)" href>{{area.area_label}}</a>
                </li>
              </ul>
            </span>
          </div>
        </div>
      </fieldset>

      <fieldset class="section-installer">
        <legend class="icon icon-installer" ng-class="{'collapsed': !checkExisting(selected, 'trade')}" data-toggle="collapse" data-target="#installerSearch" aria-controls="installerSearch">Trade Directory <span class="caret"></span></legend>
        <div class="form-options collapse" ng-class="{'in': checkExisting(selected, 'trade')}" id="installerSearch">
          <div class="form-control auto-complete">
            <label for="installer">Installer</label>
            <!-- <pre>Model: {{selected.installer | json}}</pre> -->
              <div class="auto-complete">
                <input type="text" ng-model="selected.installer" typeahead="installer as installer.display_name for installer in installers_suppliers | filter:$viewValue | limitTo:8" typeahead-on-select="showMe()" class="form-control">
              </div>
          </div>
          <div class="form-control auto-complete">
            <label for="supplier">Supplier</label>
            <!-- <pre>Model: {{selected.installer | json}}</pre> -->
              <div class="auto-complete">
                <input type="text" ng-model="selected.supplier" typeahead="supplier as supplier.display_name for supplier in installers_suppliers | filter:$viewValue | limitTo:8" typeahead-on-select="showMe()" class="form-control">
              </div>
          </div>
        </div>
      </fieldset>

      <!-- // Advanced Selections \\ -->
      <fieldset class="advanced-options">
        <legend class="icon icon-advanced" ng-class="{'collapsed': checkExisting(selected, 'advanced-solution') || checkExisting(selected, 'advanced-house')}" data-toggle="collapse" data-target="#advancedSearch" aria-controls="advancedSearch">Advanced options <span class="caret"></span></legend>
        <div class="advanced-section secondary collapse" ng-class="{'in': checkExisting(selected, 'advanced-solution') || checkExisting(selected, 'advanced-house')}" id="advancedSearch">
          <fieldset class="section-solutions">
            <legend class="icon icon-solutions" ng-class="{'collapsed': !checkExisting(selected, 'advanced-solution')}" data-toggle="collapse" data-target="#solutionsAdvancedSearch" aria-controls="solutionsAdvancedSearch">Measures <span class="caret"></span></legend>
              <div class="form-options collapse" ng-class="{'in': checkExisting(selected, 'advanced-solution')}" id="solutionsAdvancedSearch">
              <div class="solution-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.solution.air_tightness" ng-change="showMe()" class="opt-measure measure-air_tightness"></switch> <label class="label-measure meaure-air_tightness">Air tightness</label>
              </div>
              <div class="solution-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.solution.design_features" ng-change="showMe()" class="opt-measure measure-building_changing_home"></switch><label class="label-measure measure-building_changing_home">Design Features</label>
              </div>
              <div class="solution-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.solution.draught_proofing" ng-change="showMe()" class="opt-measure measure-draughts_ventilation"></switch><label class="label-measure measure-draughts_ventilation">Draught Proofing</label>
              </div>
              <div class="solution-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.solution.energy_management" ng-change="showMe()" class="opt-measure measure-managing_water"></switch><label class="label-measure measure-managing_water">Energy Management</label>
              </div>
              <div class="solution-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.solution.extensions_conversions" ng-change="showMe()" class="opt-measure measure-building_changing_home"></switch><label class="label-measure measure-building_changing_home">Extensions and Conversions</label>
              </div>
              <div class="solution-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.solution.glazing_double_secondary" ng-change="showMe()" class="opt-measure measure-windows"></switch><label class="label-measure measure-windows">Glazing - Double and Secondary</label>
              </div>
              <div class="solution-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.solution.glazing_high_quality" ng-change="showMe()" class="opt-measure measure-windows"></switch><label class="label-measure measure-windows">Glazing - V High Quality</label>
              </div>
              <div class="solution-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.solution.heating_biomass_wood" ng-change="showMe()" class="opt-measure measure-heating"></switch><label class="label-measure measure-heating">Heating - Biomass and Wood</label>
              </div>
              <div class="solution-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.solution.heating_boilers" ng-change="showMe()" class="opt-measure measure-heating"></switch><label class="label-measure measure-heating">Heating - Boilers</label>
              </div>
              <div class="solution-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.solution.heating_other" ng-change="showMe()" class="opt-measure measure-heating"></switch><label class="label-measure measure-heating">Heating - Other</label>
              </div>
              <div class="solution-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.solution.heating_pumps" ng-change="showMe()" class="opt-measure measure-heating"></switch><label class="label-measure measure-heating">Heat pumps</label>
              </div>
              <div class="solution-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.solution.insulation_solid_wall" ng-change="showMe()" class="opt-measure measure-keeping_heat_in"></switch><label class="label-measure measure-insulation_solid_wall">Insulation - Solid Wall</label>
              </div>
              <div class="solution-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.solution.insulation_floor_ceiling" ng-change="showMe()" class="opt-measure measure-keeping_heat_in"></switch><label class="label-measure measure-keeping_heat_in">Insulation - Floor &amp; Ceiling</label>
              </div>
              <div class="solution-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.solution.insulation_other" ng-change="showMe()" class="opt-measure measure-keeping_heat_in"></switch><label class="label-measure measure-keeping_heat_in">Insulation - Other</label>
              </div>
              <div class="solution-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.solution.low_e_lighting" ng-change="showMe()" class="opt-measure measure-lighting"></switch><label class="label-measure measure-lighting">Low E lighting</label>
              </div>
              <div class="solution-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.solution.materials" ng-change="showMe()" class="opt-measure measure-building_changing_home"></switch><label class="label-measure measure-building_changing_home">Materials</label>
              </div>
              <div class="solution-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.solution.other_energy" ng-change="showMe()" class="opt-measure measure-solar_energy"></switch><label class="label-measure measure-solar_energy">Other Energy sources</label>
              </div>
              <div class="solution-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.solution.outdoor_spaces" ng-change="showMe()" class="opt-measure measure-building_changing_home"></switch><label class="label-measure measure-building_changing_home">Outdoor Spaces</label>
              </div>
              <div class="solution-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.solution.solar_water" ng-change="showMe()" class="opt-measure measure-solar_energy"></switch><label class="label-measure measure-solar_energy">Solar Water</label>
              </div>
              <div class="solution-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.solution.ventilation" ng-change="showMe()" class="opt-measure measure-draughts_venitilation"></switch> <label class="label-measure meaure-draughts_venitilation">Ventilation, Heat Recovery</label>
              </div>
              <div class="solution-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.solution.water_management" ng-change="showMe()" class="opt-measure measure-managing_water"></switch><label class="label-measure measure-managing_water">Water Management</label>
              </div>
            </div>
          </fieldset>
          <fieldset class="section-house-advanced">
            <legend class="icon icon-house-advanced" ng-class="{'collapsed': !checkExisting(selected, 'advanced-house')}" data-toggle="collapse" data-target="#houseAdvancedSearch" aria-controls="houseAdvancedSearch">House: Advanced <span class="caret"></span></legend>
            <div class="form-options collapse" ng-class="{'in': checkExisting(selected, 'advanced-house')}" id="houseAdvancedSearch">
              <div class="range-slider-container">
                  <label for="bedrooms">No. of Bedrooms between: <span class="darker" ng-bind="selected.bedrooms.min"></span> and <span class="darker" ng-bind="selected.bedrooms.max"></span> bedrooms.</label>
                  <div range-slider min="0" max="7" ng-model="selected.bedrooms" model-min="selected.bedrooms.min" model-max="selected.bedrooms.max" show-values="true" prevent-equal-min-max="true" step="1" on-handle-up="showMe()"></div>
              </div>
              <div class="form-control select-list">
                <span class="dropdown" dropdown on-toggle="toggled(open)">
                  <label for="house_types"><a href class="dropdown-toggle" ng-bind="(selected.house_types.label) || 'Select house type...'" dropdown-toggle></a></label>
                  <ul class="dropdown-menu">
                    <li ng-repeat="house in house_types">
                      <a ng-click="setSelectedValue(house)" href>{{house.label}}</a>
                    </li>
                  </ul>
                </span>
              </div>
            </div>
          </fieldset>
        </div>
      </fieldset>
    </form>
  </div>
  <div id="layout-ctrls" class="col-lg-9 col-md-7 col-xs-12">
    <div class="display-settings settings">
      <span class="setting grid icon-grid"></span>
      <span class="setting list icon-list"></span>
      <span class="setting map icon-pin"></span>
    </div>

  </div>
  <div id="searchResults" ng-controller="SearchResults" class="col-lg-9 col-md-7 col-xs-12" ng-init="showMe()">
    <span class="results-statistics">Showing {{ resultsCount }} results of {{ total }}...</span>
    <pagination boundary-links="true" total-items="resultsCount" max-size="4" items-per-page="12" ng-model="pages.currentPage" class="pagination-sm" previous-text="&lsaquo;" next-text="&rsaquo;" first-text="&laquo;" last-text="&raquo;"></pagination>

    <div class="row row-flex row-flex-wrap" ng-repeat="resultRow in pagedResults">
      <div id="result-{{item.entity_id}}" class="col-sm-6 col-md-4 result flex-col flex-grow result" ng-repeat="item in resultRow">
        <div class="search-result home">
          <div class="thumbnail">
            <img front-image />
            <div class="caption">
              <!-- <span class="overlay-blue" ng-bind="(item.cost) || '£££'"></span> -->
              <span class="overlay-blue" ng-bind="(item.area_of_bristol || 'Somewhere') + ', Bristol'">Somewhere, Bristol</span>
            </div>
            <div class="epc-tag epc-rating-{{item.epc_rating || 'z' |lowercase}}"><span class="epc-label epc-rating-{{item.epc_rating || 'z' |lowercase}}" ng-bind="(item.epc_rating) || 'N/A'"></span></div>
          </div>
          <div class="home-detail">
            <!-- <h4 class="home-title" ng-bind="item.display_name"></h4> -->
            <div class="measures" ng-show="item.measures">
              <span class="label">What's been improved</span>
              <i ng-repeat="(measure_key, measure_value) in item.measures" class="measure circle measure-{{measure_key}}" tooltip-placement="bottom" tooltip="{{measure_value}}"></i>
            </div>
          </div>
          <a class="contact-link" href="/case-study/{{item.entity_id}}"></a>
        </div>
      </div>
    </div>
      <h1 ng-show="resultsCount == 0" class="no-results">{{error.results}}</h1>
  </div>
</div>
