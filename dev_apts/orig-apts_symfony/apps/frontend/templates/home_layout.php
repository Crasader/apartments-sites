<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_title() ?>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <!--[if IE 6]>
      <script type="text/javascript" src="/js/unitpngfix.js"></script>
      <link rel="stylesheet" type="text/css" href="/css/ie6-styles.css" />
    <![endif]-->
    <?php if (has_slot('tracking-code')): ?>
      <?php include_slot('tracking-code') ?>
    <?php endif; ?>
  </head>
  <body>
    <?php if (has_slot('customstyles')): ?>
      <?php include_slot('customstyles') ?>
    <?php endif; ?> 
    <div id="container">
    <?php if (has_slot('chat')): ?>
      <?php include_slot('chat') ?>
    <?php endif; ?>
      <div id="main-top">&nbsp;</div>
      <div id="main-repeat">
        <div id="content">
          <div id="header">
            <?php include_partial('global/login') ?>
            <?php if (has_slot('logo')): ?>
              <?php include_slot('logo') ?>
            <?php endif; ?>
          </div>
          <div class="stripe1"></div>
          <div class="stripe2"></div>
          <div class="stripe3"></div>
          <?php if (has_slot('home-img')): ?>
            <?php include_slot('home-img') ?>
          <?php endif; ?>
          <div class="stripe3"></div>
          <div class="stripe2"></div>
          <div class="stripe1"></div>
          <?php if (has_slot('nav')): ?>
            <?php include_slot('nav') ?>
          <?php endif; ?>
          <?php echo $sf_content ?>
        </div>
      </div>
      <div id="main-bot"></div>
    </div>
    <?php if (has_slot('bot-nav')): ?>
      <?php include_slot('bot-nav') ?>
    <?php endif; ?>
  </body>
</html>
