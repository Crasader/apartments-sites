<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_title() ?> 
    <?php include_http_metas() ?>
    <?php include_metas() ?>
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
    //-->
    </script>
  </head>
<body>
  <div id="container">
    <div><a href="/"><img src="/images/header.png" alt="header" width="914" height="130" border="0" /></a></div>
    <?php include_partial('global/mainnav') ?>
    <div id="content-top-home">&nbsp;</div>
    <div id="content">
      <div id="home-left">
        <div id="search">
          <div id="search-title"><img src="/images/search-title.gif" alt="search" border="0" /></div>
          <div id="search-viewall"><a href="<?php echo url_for('property/list'); ?>"><img src="/images/search-viewall.gif" alt="View all AMC Apartment Listings" title="View all AMC Apartment Listings" border="0" /></a></div>
          <div class="search-divider"><img src="/images/search-divider-home.gif" alt="view" border="0" /></div>
          <div id="search-listtitle"><img src="/images/search-listtitle.gif" alt="view" border="0" /></div>
          <?php include_component('property', 'search') ?>
          <!--div id="search-property">
            <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)" class="search-list">
              <option selected="selected">Select a Property</option>
              <option value="<?php echo url_for('property/list?view=detail&id=Prop1'); ?>">Property #1</option>
              <option>Property #2</option>
              <option>Property #3</option>
            </select>
          </div>
          <div id="search-city">
            <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)" class="search-list">
              <option selected="selected">Select a City</option>
              <option value="<?php echo url_for('property/list?id=City1'); ?>">City #1</option>
              <option>City #2</option>
              <option>City #3</option>
            </select>
          </div>
          <div id="search-state">
            <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)" class="search-list">
              <option selected="selected">Select a State</option>
              <option value="<?php echo url_for('property/list?id=AZ'); ?>">Arizona</option>
              <option>California</option>
              <option>Utah</option>
            </select>
          </div-->
          <div class="search-divider"><img src="/images/search-divider-home.gif" alt="view" border="0" /></div>
          <div id="search-viewmap"><a href="<?php echo url_for('property/map'); ?>"><img src="/images/search-viewmap.gif" alt="view map" border="0" /></a></div>
        </div>
        <?php include_partial('global/advert1') ?>
        <?php include_partial('global/advert2') ?>
      </div>
      <?php echo $sf_content ?>
    </div>
    <div id="content-bot-home"></div>
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