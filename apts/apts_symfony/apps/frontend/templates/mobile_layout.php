<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <?php include_title() ?>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <meta id="viewport" name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0, width=device-width">
    <link rel="stylesheet" href="//code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
    <link rel="stylesheet" href="/css/jquery.mobile.icons-1.4.2.min.css" />
    <script src="//code.jquery.com/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="//code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js" type="text/javascript"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.js" type="text/javascript"></script>
    <script src="/js/photos.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" media="all" href="/css/mobilemain.css" />
    <?php if (has_slot('tracking-code')): ?>
		  <?php include_slot('tracking-code') ?>
		<?php endif; ?>
  </head>
  <body>
  <?php echo $sf_content ?>
  </body>
</html>
