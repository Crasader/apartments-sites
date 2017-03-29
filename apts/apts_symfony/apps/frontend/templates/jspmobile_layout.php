<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <?php include_title() ?>
      <?php include_http_metas() ?>
      <?php include_metas() ?>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="/css/jquery.mobile-1.4.2.min.css" />
      <link rel="stylesheet" href="/css/darkorange-jsp.css" />
      <link rel="stylesheet" href="/css/jquery.mobile.icons.min.css" />
      <link rel="stylesheet" href="/css/jspmobile.css" />
      <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
      <script src="https://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
      <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
      <?php if (has_slot('tracking-code')): ?>
		    <?php include_slot('tracking-code') ?>
		  <?php endif; ?>
  </head>
   <body>
    <?php echo $sf_content ?>
  </body>
</html>
