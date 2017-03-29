
       <div data-role="content">
      <!--  **************** /Home Page *************************  -->
      <div data-role="page" id="page_home">

      <!-- /header -->
        <div data-role="none" class="ui-ac-header">
          <img src="/images/acacia/<?php echo $property->getCode()?>/logo.png" />
        </div>

        <div data-role="none" class="ui-ac-headnav">
          <a href="#page_home" class="navItem"><img src="/images/acacia/mobile/nav_home.png" class="scaleNav"></a>
          <a href="#page_about" class="navItem"><img src="/images/acacia/mobile/nav_about.png" class="scaleNav"></a>
          <a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="navItem"><img src="/images/acacia/mobile/nav_map.png" class="scaleNav"></a>
          <a href="tel:<?php echo preg_replace('/[^0-9]/','',$property->getPhone())?>" class="lastItem"><img src="/images/acacia/mobile/nav_call.png" class="scaleNav"></a>
        </div>

        <!-- /content -->
        <div data-role="none" class="ui-ac-homecontent">
          <img src="/images/acacia/mobile/ac_home_img.jpg" class="resizeFull"/>
        </div>

        <!-- /footerNav-->
        <div data-role="none" class="ui-ac-footernav">
          <div data-role="none" class="ui-ac-footernav-inner">
             <a href="#page_floorplans" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Floorplans</a>
             <a href="#page_photos" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Photos</a>
             <a href="#page_features" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Features</a>
             <a href="#page_contactus" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Contact Us</a>
          </div>
        </div>

        <!-- /footer-->
        <div data-role="none" class="ui-ac-footer">
			<div data-role="none" class="ui-ac-footer-links">
			  <div class="ui-ac-footer-inner">
				<a href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;<a href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy</a>
			  </div>
			</div>
			<div class="ui-ac-equal-shell">
				<img src="/images/acacia/mobile/equal.png" class="ui-ac-equal">
			</div>
        </div>

      </div>

  <!--  **************** /Floor Plans *************************  -->
      <div data-role="page" id="page_floorplans">

      <!-- /header -->
        <div data-role="none" class="ui-ac-header">
          <img src="/images/acacia/mobile/logo_pheasant.png" />
        </div>

        <div data-role="none" class="ui-ac-headnav">
          <a href="#page_home" class="navItem"><img src="/images/acacia/mobile/nav_home.png" class="scaleNav"></a>
          <a href="#page_about" class="navItem"><img src="/images/acacia/mobile/nav_about.png" class="scaleNav"></a>
          <a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="navItem"><img src="/images/acacia/mobile/nav_map.png" class="scaleNav"></a>
          <a href="tel:<?php echo preg_replace('/[^0-9]/','',$property->getPhone())?>" class="lastItem"><img src="/images/acacia/mobile/nav_call.png" class="scaleNav"></a>
        </div>

        <!-- /title_bar-->
         <div data-role="none" class="ui-ac-titlebar">
           Floorplans
         </div>

        <!-- /content -->
        <div data-role="none" class="ui-ac-tancontent">
        <?php foreach($property->getPropertyFloorPlans() as $floorplan):?>
			<!-- floorplan 1 -->
           <div data-role="none" class="ui-ac-floorplan first_floorplan" >
              <div data-role="none" class="ui-ac-floorplan_inner first_floorplan_inner " >

                <table cellpadding="0" cellspacing="0" width="100%">
                  <tr valign="top">
                    <td class="tb_thumb ">
                      <a href="/uploads/floorplans/<?php echo $floorplan->getImage()?>" target="_blank"><img src="/uploads/floorplans/<?php echo $floorplan->getImage()?>" class="floorplan_thumb" border="0" /></a>
                    </td>
                    <td class="tb_cont">

                    <span class="floorplan_name"><?php echo $floorplan->getName();?></span><br />
                      <span class="floorplan_details">
												<?php echo $floorplan->getBedrooms();?> Bed <?php echo $floorplan->getBathrooms();?> Bath<br />
												<?php echo $floorplan->getSquareFeet();?> Sq. Ft.<br />
												<small><em>*Prices are subject to change</em></small>
                      </span>

                    </td>
                    <td class="tb_price">
                       <span class="floorplan_price"><?php echo $floorplan->getPrice();?></span>
                    </td>

                  </tr>
                </table>

              </div>
           </div>
           <?php endforeach;?>
           <?php /*
           <!-- floorplan 1 -->
           <div data-role="none" class="ui-ac-floorplan first_floorplan" >
              <div data-role="none" class="ui-ac-floorplan_inner first_floorplan_inner " >

                <table cellpadding="0" cellspacing="0" width="100%">
                  <tr valign="top">
                    <td class="tb_thumb ">
                      <img src="/images/acacia/mobile/floorplan_b1.png" class="floorplan_thumb" />
                    </td>
                    <td class="tb_cont">
					<a href="#">
                    <span class="floorplan_name">The Hampton</span><br />
                      <span class="floorplan_details">
                          2 Bedroom(s), 2 Bath<br />
                          1005 Sq. Ft.<br />
                      </span>
					</a>
                    </td>
                    <td class="tb_price">
						<a href="#" class="floorplan_arrow"><img src="/images/acacia/mobile/floorplan_arrow.png"><br />
                       <span class="floorplan_price">$1003</span></a>
                    </td>
                  </tr>
                </table>

              </div>
           </div>*/?>


        </div>

        <!-- /footerNav-->
        <div data-role="none" class="ui-ac-footernav">
          <div data-role="none" class="ui-ac-footernav-inner">
             <a href="#page_floorplans" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn active">Floorplans</a>
             <a href="#page_photos" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Photos</a>
             <a href="#page_features" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Features</a>
             <a href="#page_contactus" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Contact Us</a>
          </div>
        </div>

        <!-- /footer-->
        <div data-role="none" class="ui-ac-footer">


             <div data-role="none" class="ui-ac-footer-links">

              <div class="ui-ac-footer-inner">
                <a href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;<a href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy</a>
                </div>
            </div>
             <div class="ui-ac-equal-shell">
                <img src="/images/acacia/mobile/equal.png" class="ui-ac-equal">
              </div>
        </div>
      </div>


  <!--  **************** /Photos *************************  -->
      <div data-role="page" id="page_photos">

      <!-- /header -->
        <div data-role="none" class="ui-ac-header">
          <img src="/images/acacia/mobile/logo_pheasant.png" />
        </div>

        <div data-role="none" class="ui-ac-headnav">
          <a href="#page_home" class="navItem"><img src="/images/acacia/mobile/nav_home.png" class="scaleNav"></a>
          <a href="#page_about" class="navItem"><img src="/images/acacia/mobile/nav_about.png" class="scaleNav"></a>
          <a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="navItem"><img src="/images/acacia/mobile/nav_map.png" class="scaleNav"></a>
          <a href="tel:<?php echo preg_replace('/[^0-9]/','',$property->getPhone())?>" class="lastItem"><img src="/images/acacia/mobile/nav_call.png" class="scaleNav"></a>
        </div>

        <!-- /title_bar-->
         <div data-role="none" class="ui-ac-titlebar">
           Photos
         </div>

        <!-- /content -->
        <div data-role="none" class="ui-ac-tancontent">
             <div data-role="none" class="photoParam"><img src="/uploads/photos/<?php echo $mainPhotos[0]->getImage()?>"  class="resizeFull" id="currentPhoto"/></div>
             <div data-role="none" class="photoNav">
                <table class="photoTable" cellpadding="0" cellspacing="0" width="100%" height="75">
                  <tr>
                    <td width="55"><div class="photoNavLeft"><img src="/images/acacia/mobile/left_arrow.png" /></div></td>
                    <td width="100%" align="center" >
                      <div class="photoNavScroller">
                        <div class="photoGroup">
                        <?php foreach($mainPhotos as $photo):?>
                          <div class="photoItem" ref="/uploads/photos/<?php echo $photo->getImage()?>" title="<?php echo $photo->getName()?>"><img src="/uploads/photos/258/<?php echo $photo->getImage()?>" class="photoThumb"/></div>
                          <?php /*<div class="photoItem" ref="/images/acacia/mobile/photos/photo2.jpg"><img src="/images/acacia/mobile/photos/photo2thumb.jpg" class="photoThumb"/></div>
                          <div class="photoItem" ref="/images/acacia/mobile/photos/photo3.jpg"><img src="/images/acacia/mobile/photos/photo3thumb.jpg" class="photoThumb"/></div>
                          <div class="photoItem" ref="/images/acacia/mobile/photos/photo4.jpg"><img src="/images/acacia/mobile/photos/photo4thumb.jpg" class="photoThumb"/></div>
                          <div class="photoItem" ref="/images/acacia/mobile/photos/photo5.jpg"><img src="/images/acacia/mobile/photos/photo5thumb.jpg" class="photoThumb"/></div>
                          <div class="photoItem" ref="/images/acacia/mobile/photos/photo6.jpg"><img src="/images/acacia/mobile/photos/photo6thumb.jpg" class="photoThumb"/></div>
                          <div class="photoItem" ref="/images/acacia/mobile/photos/photo7.jpg"><img src="/images/acacia/mobile/photos/photo7thumb.jpg" class="photoThumb"/></div>*/?>
                         <?php endforeach;?>
                        </div>
                      </div>
                    </td>
                    <td width="55"><div class="photoNavRight"><img src="/images/acacia/mobile/right_arrow.png" /></div></td>
                  </tr>
                </table>
             </div>
        </div>

        <!-- /footerNav-->
        <div data-role="none" class="ui-ac-footernav">
          <div data-role="none" class="ui-ac-footernav-inner">
             <a href="#page_floorplans" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Floorplans</a>
             <a href="#page_photos" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn active">Photos</a>
             <a href="#page_features" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Features</a>
             <a href="#page_contactus" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Contact Us</a>
          </div>
        </div>

        <!-- /footer-->
        <div data-role="none" class="ui-ac-footer">



             <div data-role="none" class="ui-ac-footer-links">

              <div class="ui-ac-footer-inner">
                <a href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;<a href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy</a>
               </div>
            </div>
             <div class="ui-ac-equal-shell">
                <img src="/images/acacia/mobile/equal.png" class="ui-ac-equal">
              </div>
        </div>
      </div>

  <!--  **************** /Features *************************  -->
      <div data-role="page" id="page_features">

      <!-- /header -->
        <div data-role="none" class="ui-ac-header">
          <img src="/images/acacia/mobile/logo_pheasant.png" />
        </div>

        <div data-role="none" class="ui-ac-headnav">
          <a href="#page_home" class="navItem"><img src="/images/acacia/mobile/nav_home.png" class="scaleNav"></a>
          <a href="#page_about" class="navItem"><img src="/images/acacia/mobile/nav_about.png" class="scaleNav"></a>
          <a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="navItem"><img src="/images/acacia/mobile/nav_map.png" class="scaleNav"></a>
          <a href="tel:<?php echo preg_replace('/[^0-9]/','',$property->getPhone())?>" class="lastItem"><img src="/images/acacia/mobile/nav_call.png" class="scaleNav"></a>
        </div>

        <!-- /title_bar-->
         <div data-role="none" class="ui-ac-titlebar">
           Features
         </div>

        <!-- /content -->
        <div data-role="none" class="ui-ac-tancontent">
          <div class="ui-ac-tancontent-inner-nopad">
            <h2>Apartment Features:</h2>
			<div class="ui-ac-bump">
            <ul>
            <?php foreach($property->getPropertyApartmentFeatures() as $feature):?>
							<li><?php echo $feature->getApartmentFeature()->getName()?></li>
						<?php endforeach;?>
				<?php /*<li>Granite countertops.</li>
				<li>18” tile in entire apartment.</li>
				<li>Hardwood floor options</li>
				<li>Stainless steel fridge and oven.</li>
				<li>Two toned paint.</li>
				<li>Stainless steel fridge and oven.</li>
				<li>Two toned paint.</li>
				<li>Designed with modern interiors</li>*/?>
            </ul>
			</div>

            <h2>Community Features:</h2>
			<div class="ui-ac-bump">
            <ul>
            <?php foreach($property->getPropertyCommunityFeatures() as $feature):?>
							<li><?php echo $feature->getCommunityFeature()->getName()?></li>
						<?php endforeach;?>
            <?php /*   <li>Convenient location</li>
               <li>Credit Cards Accepted</li>
               <li>Easy Freeway Access</li>
               <li>Pets Welcome! No weight limit (2 per apartment)</li>
               <li>(Breed Restrictions Apply)</li>
               <li>Housing Vouchers Welcome</li>
               <li>Playgrounds</li>
               <li>Fitness Center</li>
               <li>Swimming Pool</li>
               <li>Spa</li>
               <li>Gated Access</li>*/?>
            </ul>
			</div>

          </div>
        </div>

        <!-- /footerNav-->
        <div data-role="none" class="ui-ac-footernav">
          <div data-role="none" class="ui-ac-footernav-inner">
             <a href="#page_floorplans" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Floorplans</a>
             <a href="#page_photos" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Photos</a>
             <a href="#page_features" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn active">Features</a>
             <a href="#page_contactus" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Contact Us</a>
          </div>
        </div>

        <!-- /footer-->
        <div data-role="none" class="ui-ac-footer">



             <div data-role="none" class="ui-ac-footer-links">
              <div class="ui-ac-footer-inner">
                <a href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;<a href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy</a>
                </div>
            </div>
             <div class="ui-ac-equal-shell">
                <img src="/images/acacia/mobile/equal.png" class="ui-ac-equal">
              </div>
        </div>
      </div>

  <!--  **************** /About *************************  -->
      <div data-role="page" id="page_about">

      <!-- /header -->
        <div data-role="none" class="ui-ac-header">
          <img src="/images/acacia/mobile/logo_pheasant.png" />
        </div>

        <div data-role="none" class="ui-ac-headnav">
          <a href="#page_home" class="navItem"><img src="/images/acacia/mobile/nav_home.png" class="scaleNav"></a>
          <a href="#page_about" class="navItem"><img src="/images/acacia/mobile/nav_about.png" class="scaleNav"></a>
          <a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="navItem"><img src="/images/acacia/mobile/nav_map.png" class="scaleNav"></a>
          <a href="tel:<?php echo preg_replace('/[^0-9]/','',$property->getPhone())?>" class="lastItem"><img src="/images/acacia/mobile/nav_call.png" class="scaleNav"></a>
        </div>

        <!-- /title_bar-->
         <div data-role="none" class="ui-ac-titlebar">
           About
         </div>

        <!-- /content -->
		<div data-role="none" class="ui-ac-homecontent">
          <img src="/images/acacia/mobile/about_banner.jpg" class="resizeFull"/>
        </div>

        <div data-role="none" class="ui-ac-tancontent">
          <div class="ui-ac-tancontent-inner">
			<span style="color:#597a2a; font-style:italic;">Important Message:</span><br />
            <?php echo nl2br($propertyTemplate->getDescription()); ?>
          </div>
        </div>

        <!-- /footerNav-->
        <div data-role="none" class="ui-ac-footernav">
          <div data-role="none" class="ui-ac-footernav-inner">
             <a href="#page_floorplans" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Floorplans</a>
             <a href="#page_photos" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Photos</a>
             <a href="#page_features" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Features</a>
             <a href="#page_contactus" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Contact Us</a>
          </div>
        </div>

        <!-- /footer-->
        <div data-role="none" class="ui-ac-footer">



             <div data-role="none" class="ui-ac-footer-links">
              <div class="ui-ac-footer-inner">
                <a href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;<a href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy</a>
                </div>
            </div>
             <div class="ui-ac-equal-shell">
                <img src="/images/acacia/mobile/equal.png" class="ui-ac-equal">
              </div>
        </div>
      </div>


  <!--  **************** /Contact Us *************************  -->

      <div data-role="page" id="page_contactus">

      <!-- /header -->
        <div data-role="none" class="ui-ac-header">
          <img src="/images/acacia/mobile/logo_pheasant.png" />
        </div>

        <div data-role="none" class="ui-ac-headnav">
          <a href="#page_home" class="navItem"><img src="/images/acacia/mobile/nav_home.png" class="scaleNav"></a>
          <a href="#page_about" class="navItem"><img src="/images/acacia/mobile/nav_about.png" class="scaleNav"></a>
          <a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="navItem"><img src="/images/acacia/mobile/nav_map.png" class="scaleNav"></a>
          <a href="tel:<?php echo preg_replace('/[^0-9]/','',$property->getPhone())?>" class="lastItem"><img src="/images/acacia/mobile/nav_call.png" class="scaleNav"></a>
        </div>

        <!-- /title_bar-->
         <div data-role="none" class="ui-ac-titlebar">
           Contact Us
         </div>

        <!-- /content -->
        <div data-role="none" class="ui-ac-tancontent">
          <div class="ui-ac-tancontent-inner">
            <div style="font-size:18px;">
			  <p>
			  <a href="#"><?php echo $property->getAddress()?><br />
				<?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> <?php echo $property->getZip()?></a>
			  </p>

              <p>Interested in <?php echo $property->getName()?>? Fill out the form below and click “send” or call us at  <?php echo $property->getPhone()?></p>

              <span style="color:#597a2a; font-style:italic;">Hours of Operation:</span><br />
              <?php echo nl2br($property->getHours())?>
            </div>

              <form name="mContact" id="mContact" method="post" action="<?php echo url_for('contact/shortm'); ?>" data-ajax="false">
                <div style="padding:10px 0 10px 0; margin:10px 0 10px 0;">
                <label for="firstname">First Name*:</label>
                <input name="firstname" id="firstname">

                <label for="lastname">Last Name <span class="red">*</span></label>
                <input name="lastname" id="lastname">

                <label for="phonenumber">Phone Number:</label>
                <input name="phonenumber" id="phonenumber">

                <label for="email">Email Address*:</label>
                <input name="email" id="email">

                </div>
                <input type="submit" value="Submit" data-role="none" class="ui-btn ui-shadow ui-btn-corner-all ui-mini btn_submit"/>
              </form>

            </div>
        </div>

        <!-- /footerNav-->
        <div data-role="none" class="ui-ac-footernav">
          <div data-role="none" class="ui-ac-footernav-inner">
             <a href="#page_floorplans" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Floorplans</a>
             <a href="#page_photos" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Photos</a>
             <a href="#page_features" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Features</a>
             <a href="#page_contactus" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn active">Contact Us</a>
          </div>
        </div>

        <!-- /footer-->
        <div data-role="none" class="ui-ac-footer">
            <div data-role="none" class="ui-ac-footer-links">
              <div class="ui-ac-footer-inner">
                <a href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;<a href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy</a>
                </div>
            </div>
            <div class="ui-ac-equal-shell">
                <img src="/images/acacia/mobile/equal.png" class="ui-ac-equal">
            </div>
        </div>
      </div>


      </div>
    </body>
