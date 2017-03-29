          <div id="sec-search-property">          
            <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)" class="sec-search-list">
              <option value="" selected="selected">Select a Property</option>
              <?php foreach($properties as $Pkey => $Pvalue):
                    $propertySelected = '';
                    if($Pkey == $sf_params->get('id')){
                      $propertySelected = 'selected';
                    }
              ?>
              <option <?php echo $propertySelected ?> value="<?php echo url_for('property/list?view=detail&id='.$Pkey); ?>"><?php echo $Pvalue ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div id="sec-search-city">
            <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)" class="sec-search-list">
              <option value="" selected="selected">Select a City</option>
              <?php foreach($cities as $key => $value):
                    $citySelected = '';
                    if($key == $sf_params->get('code')){
                      $citySelected = 'selected';
                    }
              ?>
              <option <?php echo $citySelected ?> value="<?php echo url_for('property/list?view=city&code='.$key); ?>"><?php echo $value ?></option>
              <?php endforeach; ?>
            </select>      
          </div>
          <div id="sec-search-state">          
            <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)" class="sec-search-list">
              <option value="" selected="selected">Select a State</option>
              <?php foreach($states as $state):
                    $stateSelected = '';
                    if($state->getCode() == $sf_params->get('code')){
                      $stateSelected = 'selected';
                    }
              ?>
              <option <?php echo $stateSelected ?> value="<?php echo url_for('property/list?view=state&code='.$state->getCode()); ?>"><?php echo $state->getName() ?></option>
              <?php endforeach; ?>
            </select>
          </div>

