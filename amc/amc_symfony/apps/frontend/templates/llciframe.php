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
  function viewState(state){
    window.location.href="<?php echo url_for('llcproperty/list?view=state&code='); ?>"+state;
  }
  //-->
  </script>
</head>
<body>
<?php echo $sf_content ?>
</body>
</html>