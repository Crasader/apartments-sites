          <div id="sec-search-property">          
            <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)" class="sec-search-list">
              <option value="" selected="selected">Apartments by Property</option>
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
              <option value="" selected="selected">Apartments by City</option>
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
              <option value="" selected="selected">Apartments by State</option>
              <?php foreach($states as $key => $value):
                    $stateSelected = '';
                    //if($state->getCode() == $sf_params->get('code')){
                    if($key == $sf_params->get('code')){
                      $stateSelected = 'selected';
                    }
              ?>
              <option <?php echo $stateSelected ?> value="<?php echo url_for('property/list?view=state&code='.$key); ?>"><?php echo $value ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="sec-search-divider">
					<img border="0" alt="view" src="/images/search-divider-sec.gif">
					</div>
          <div style="padding: 0 0 15px;">
          <img src="/images/search_by_zipcode.gif" /></div>
          <script type="text/javascript">
          function validateForm(form){
            
	          var z=Number(form["zcode"].value);
	          var r=Number(form["radius"].value);
	          if (z==null || z=="" || isNaN(z)){
	            alert("Fields must not be blank");
	            return false;
	          }
	          
	          if (r==null || r=="" || isNaN(r)){
		          alert("Fields must not be blank");
		          return false;
		        }
          }
          </script>
          <div style="padding: 0 0 15px;">
          <form method="post" action="<?php echo url_for('property/list?view=zip'); ?>" onsubmit="return validateForm(this)">         
            within 
            <select name="radius" id="radius">
            <option value="1">1</option>
            <?php for($i=5;$i<=30;$i=$i+5):
                    $radiusSelected = '';
                    if($i == $sf_params->get('radius')){
                      $radiusSelected = 'selected';
                    }
              ?>
              <option <?php echo $radiusSelected ?> value="<?php echo $i ?>"><?php echo $i ?></option>
              <?php endfor; ?>
              </select>mile(s) of 
              <input type="text" name="zcode" id="zcode" maxlength="5" style="width:40px;" onclick="this.value='';" onblur="this.value=!this.value?'zip':this.value;" value="<?php echo $sf_params->get('zcode') ? $sf_params->get('zcode') : 'zip'?>" /><br />
            <input style="padding-top:10px;" type="image" name="submit" value="View Apartments within Range" src="/images/view_within_range.gif" />
            </form>
          </div>

