<div class="row" ng-app="CaseDirectory">
  <div id="search-ctrls" ng-controller="SearchCtrl" class="col-lg-12 col-md-12 col-xs-12">
    <form id="caseSearch" class="grid-4" role="search-form" ng-submit="eventsDirectory()">
      <fieldset class="section-area">
        <legend class="icon icon-area collapsed" data-toggle="collapse" data-target="#areaSearch" aria-controls="areaSearch">Area <span class="caret"></span></legend>
        <div class="form-options collapse" id="areaSearch">
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
      <fieldset class="section-house">
        <legend class="icon icon-house collapsed" data-toggle="collapse" data-target="#houseSearch" aria-controls="houseSearch">House <span class="caret"></span></legend>
        <div class="form-options collapse" id="houseSearch">
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
            <div class="radio-control"><div class="radio-border"><span class="opt single-mode opt-radio" ng-model="selected.conservation_listed" btn-radio="'Yes'" uncheckable>Yes</span></div><label for="Conservation listed">Yes<label></div>
              <div class="radio-control"><div class="radio-border"><span class="opt single-mode opt-radio" ng-model="selected.conservation_listed" btn-radio="'No'" uncheckable>No</span></div><label for="Conservation listed">No<label></div>
          </div>
        </div>
      </fieldset>
      <fieldset class="epc-level">
        <legend class="icon icon-epc collapsed" data-toggle="collapse" data-target="#epcSearch" aria-controls="epcSearch">EPC Level <span class="caret"></span></legend>
        <div class="form-options collapse" id="epcSearch">
          <div class="form-options checkbox-buttons">
            <div class="checkbox-control"><div class="checkbox-border"><span class="opt-checkbox" ng-model="checkModel.epc.A" btn-checkbox></span></div><label class="opt-epc epc-rating-a">A <span class="badge">(92+)</span></label></div>
            <div class="checkbox-control"><div class="checkbox-border"><span class="opt-checkbox" ng-model="checkModel.epc.B" btn-checkbox></span></div><label class="opt-epc epc-rating-b">B <span class="badge">(81-90)</span></label></div>
            <div class="checkbox-control"><div class="checkbox-border"><span class="opt-checkbox" ng-model="checkModel.epc.C" btn-checkbox></span></div><label class="opt-epc epc-rating-c">C <span class="badge">(69-80)</span></label></div>
            <div class="checkbox-control"><div class="checkbox-border"><span class="opt-checkbox" ng-model="checkModel.epc.D" btn-checkbox></span></div><label class="opt-epc epc-rating-d">D <span class="badge">(55-68)</span></label></div>
            <div class="checkbox-control"><div class="checkbox-border"><span class="opt-checkbox" ng-model="checkModel.epc.E" btn-checkbox></span></div><label class="opt-epc epc-rating-e">E <span class="badge">(39-54)</span></label></div>
            <div class="checkbox-control"><div class="checkbox-border"><span class="opt-checkbox" ng-model="checkModel.epc.F" btn-checkbox></span></div><label class="opt-epc epc-rating-f">F <span class="badge">(21-38)</span></label></div>
          </div>
        </div>
      </fieldset>
      <!-- <fieldset class="approach-to-work">
        <legend class="icon icon-approach collapsed" data-toggle="collapse" data-target="#workSearch" aria-controls="workSearch">Approach to work <span class="caret"></span></legend>
        <div class="form-options collapse" id="workSearch">
          <p> Area... </p>
        </div>
      </fieldset> -->
      <!-- // Advanced Selections \\ -->
      <fieldset class="advanced-options">
        <legend class="icon icon-advanced collapsed" data-toggle="collapse" data-target="#advancedSearch" aria-controls="advancedSearch">Advanced options <span class="caret"></span></legend>
        <div class="advanced-section secondary collapse" id="advancedSearch">
          <fieldset class="section-measures">
            <legend class="icon icon-measures collapsed" data-toggle="collapse" data-target="#measuresAdvancedSearch" aria-controls="measuresAdvancedSearch">What's been improved <span class="caret"></span></legend>
            <div class="form-options collapse" id="measuresAdvancedSearch">
              <div class="measure-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.measure.draughts_ventilation" class="opt-measure measure-draughts_ventilation"></switch><label class="label-measure">Draughts &amp; Ventilation</label>
              </div>
              <div class="measure-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.measure.heating" class="opt-measure measure-heating"></switch><label class="label-measure measure-heating">Heating</label>
              </div>
              <div class="measure-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.measure.keeping_heat_in" class="opt-measure measure-keeping_heat_in"></switch><label class="label-measure measure-keeping_heat_in">Keeping heat in</label>
              </div>
              <div class="measure-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.measure.windows" class="opt-measure measure-windows"></switch><label class="label-measure measure-windows">Windows</label>
              </div>
              <div class="measure-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.measure.lighting" class="opt-measure measure-lighting"></switch><label class="label-measure measure-lighting">Lighting</label>
              </div>
              <div class="measure-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.measure.solar_energy" class="opt-measure measure-solar_energy"></switch><label class="label-measure measure-solar_energy">Solar &amp; Renewable Energy</label>
              </div>
              <div class="measure-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.measure.building_changing_home" class="opt-measure measure-building_changing_home"></switch><label class="label-measure measure-building_changing_home">Building &amp; changing your home</label>
              </div>
              <div class="measure-option">
                <switch id="enabled" name="enabled" ng-model="checkModel.measure.managing_water" class="opt-measure measure-managing_water"></switch><label class="label-measure measure-managing_water">Managing energy and water</label>
              </div>
            </div>
          </fieldset>
          <fieldset class="section-solutions">
            <legend class="icon icon-solutions collapsed" data-toggle="collapse" data-target="#solutionsAdvancedSearch" aria-controls="solutionsAdvancedSearch">Measures <span class="caret"></span></legend>
                           <div class="form-options collapse" id="solutionsAdvancedSearch">
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
            <legend class="icon icon-house-advanced collapsed" data-toggle="collapse" data-target="#houseAdvancedSearch" aria-controls="houseAdvancedSearch">House: Advanced <span class="caret"></span></legend>
            <div class="form-options collapse" id="houseAdvancedSearch">
              <div class="range-slider-container">
                  <label for="bedrooms">No. of Bedrooms between: <span class="darker" ng-bind="selected.bedrooms.min"></span> and <span class="darker" ng-bind="selected.bedrooms.max"></span> bedrooms.</label>
                  <div range-slider min="0" max="7" ng-model="selected.bedrooms" model-min="selected.bedrooms.min" model-max="selected.bedrooms.max" show-values="true" prevent-equal-min-max="true" step="1" on-handle-up="showMe()"></div>
              </div>
            </div>
          </fieldset>
          <fieldset class="section-miscellaneous">
            <legend class="icon icon-miscellaneous collapsed" data-toggle="collapse" data-target="#miscAdvancedSearch" aria-controls="houseAdvancedSearch">Miscellaneous <span class="caret"></span></legend>
            <div class="form-options collapse" id="miscAdvancedSearch">
              <div class="form-control radio-buttons">
                <label for="work in progress">Work in progress</label>
                <div class="btn-group">
                  <div class="radio-control"><div class="radio-border"><span class="opt single-mode opt-radio" ng-model="selected.work_in_progress" btn-radio="'Yes'" uncheckable>Yes</span></div><label for="Work in progress">Yes</label></div>
                    <div class="radio-control"><div class="radio-border"><span class="opt single-mode opt-radio" ng-model="selected.work_in_progress" btn-radio="'No'" uncheckable>No</span></div><label for="Work in progress">No</label></div>
                </div>
              </div>
              <div class="form-control radio-buttons">
                <label for="wheelchair access">Wheelchair access</label>
                <div class="btn-group">
                  <div class="radio-control"><div class="radio-border"><span class="opt single-mode opt-radio" ng-model="selected.wheelchair_access" btn-radio="'Yes'" uncheckable>Yes</span></div><label for="Wheelchair access">Yes</label></div>
                    <div class="radio-control"><div class="radio-border"><span class="opt single-mode opt-radio" ng-model="selected.wheelchair_access" btn-radio="'No'" uncheckable>No</span></div><label for="Wheelchair access">No</label></div>
                </div>
              </div>
              <div class="form-control radio-buttons">
                <label for="opening days">Opening days</label>
                <div class="btn-group">
                  <div class="radio-control"><div class="radio-border"><span class="opt single-mode opt-radio" ng-model="radioModel.opening_days" btn-radio="'Yes'" uncheckable>Yes</span></div><label for="opening_days">Yes</label></div>
                    <div class="radio-control"><div class="radio-border"><span class="opt single-mode opt-radio" ng-model="radioModel.opening_days" btn-radio="'No'" uncheckable>No</span></div><label for="opening days">No</label></div>
                </div>
              </div>
              <div class="form-control auto-complete">
                <label for="installer">Trade Directory</label>
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
        </div>
      </fieldset>
      <div class="form-action">
        <input type="submit" class="btn btn-default search" ng-click="redirect('/events/directory')" value="Search" />
      </div>
    </form>
  </div>