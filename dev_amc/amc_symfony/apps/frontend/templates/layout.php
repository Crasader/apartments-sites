<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <?php include_title() ?>
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <meta name="google-site-verification" content="00ZIqTO_IZxXUv6lB6v3dBPs2HuOrBKgR6giCStR6C0" />
  <link rel="shortcut icon" href="/favicon.ico" />
  <!--[if IE 6]>
  <link href="/css/ie6.css" rel="stylesheet">
  <script type="text/javascript" src="/js/unitpngfix.js"></script>
  <![endif]-->
  <script type="text/javascript">
  <!--
  function MM_jumpMenu(targ,selObj,restore){ //v3.0
    eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
    if (restore) selObj.selectedIndex=0;
  }
  function viewState(state){
    window.location.href="<?php echo url_for('property/list?view=state&code='); ?>"+state;
  }
  //-->
  </script>
</head>
<body>
  <div id="container">
    <div><a href="/"><img src="/images/header.png" alt="Find Apartments for Rent, Studio, Townhomes using Apartment Locator, Listings and Search - View Virtual Tours, Photos, Floor Plans and Rental Information" title="Find Apartments for Rent, Studio, Townhomes using Apartment Locator, Listings and Search - View Virtual Tours, Photos, Floor Plans and Rental Information" width="914" height="130" border="0" /></a></div>
    <?php include_partial('global/mainnav') ?>
    <div id="content-top-sec"></div>
    <div id="content-sec">
      <div id="sec-left">
        <div id="sec-search">
          <div id="sec-search-title"><img src="/images/search-title-sec.gif" alt="search" border="0" /></div>
          <div id="sec-search-viewall"><a href="<?php echo url_for('property/list'); ?>"><img src="/images/search-viewall-sec.gif" alt="View all AMC Apartment Listings" title="View all AMC Apartment Listings" border="0" /></a></div>
          <div class="sec-search-divider"><img src="/images/search-divider-sec.gif" alt="view" border="0" /></div>
          <div id="sec-search-listtitle"><img src="/images/search-listtitle-sec.gif" alt="View all Apartments by Property, City or State" title="View all Apartments by Property, City or State" border="0" /></div>
          <?php include_component('property', 'search') ?>
          <!--div id="sec-search-property">
            <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)" class="sec-search-list">
              <option selected="selected">Select a Property</option>
              <option value="<?php echo url_for('property/list?view=detail&id=Prop1'); ?>">Property #1</option>
              <option>Property #2</option>
              <option>Property #3</option>
            </select>
          </div>
          <div id="sec-search-city">
            <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)" class="sec-search-list">
              <option selected="selected">Select a City</option>
              <option value="<?php echo url_for('property/list?id=City1'); ?>">City #1</option>
              <option>City #2</option>
              <option>City #3</option>
            </select>       
          </div>
          <div id="sec-search-state">
            <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)" class="sec-search-list">
              <option selected="selected">Select a State</option>
              <option value="<?php echo url_for('property/list?id=AZ'); ?>">Arizona</option>
              <option>California</option>
              <option>Utah</option>
            </select>
          </div-->
          <div class="sec-search-divider"><img src="/images/search-divider-sec.gif" alt="view" border="0" /></div>
          <?php if($sf_params->get('module') != 'default'):?>
          <div id="sec-search-viewmap"><a href="<?php echo url_for('property/map'); ?>"><img src="/images/search-viewmap-sec.gif" alt="view map" border="0" /></a></div>
          <?php endif;?>
        </div>
        <div style="padding: 0 10px 0 15px;">At AMCApartments.com, searching for an <b>apartment</b> reaches a new level
of convenience as you are able to browse through <b>apartment listings</b>
from the comfort of your computer. AMCApartments.com makes <b>rental
searches</b> easy and fast. AMCApartments.com enables <b>renters</b> to find
their <b>apartment</b> by city, state, property name,<b>floor plan</b> and
number of bedrooms. The site gives renters all the information needed to
find your next <b>apartment home</b>.
        </div>
      </div>
      <?php echo $sf_content ?>
    </div>
    <div id="content-bot-sec"><br /><span style="text-align:right; padding: 0 0 0 210px;"><a href="<?php echo url_for('about/index'); ?>">About AMC</a> | <a href="<?php echo url_for('privacypolicy/index'); ?>">Privacy Policy</a> | <a href="<?php echo url_for('termsofuse/index'); ?>">Terms of Use</a> | Apartments | Rentals | Copyright
&copy;<?php echo date('Y')?></span></div>
  </div>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-2975289-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>  
</body>
</html>