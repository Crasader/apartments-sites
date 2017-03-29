<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="title" content="<?php echo $property->getName()?>" />
    <title><?php echo $property->getName()?></title>
    <link rel="shortcut icon" href="<?php echo $property->getUrl()?>/favicon.ico" />
  <script type="text/javascript" src="<?php echo $property->getUrl()?>/js/common.js"></script>
<script type="text/javascript" src="<?php echo $property->getUrl()?>/js/prototype.js"></script>

<script type="text/javascript" src="<?php echo $property->getUrl()?>/js/scriptaculous.js"></script>
<script type="text/javascript" src="<?php echo $property->getUrl()?>/js/builder.js"></script>
<script type="text/javascript" src="<?php echo $property->getUrl()?>/js/effects.js"></script>
<script type="text/javascript" src="<?php echo $property->getUrl()?>/js/lightbox.js"></script>
<!--[if lte IE 6]><script type="text/javascript" src="<?php echo $property->getUrl()?>/js/unitpngfix.js"></script><![endif]-->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $property->getUrl()?>/css/lightbox.css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $property->getUrl()?>/css/main.css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $property->getUrl()?>/css/styles.css" />
<link rel="stylesheet" type="text/css" media="print" href="<?php echo $property->getUrl()?>/css/print.css" />
<!--[if lte IE 6]><link rel="stylesheet" type="text/css" media="screen" href="<?php echo $property->getUrl()?>/css/ie6-styles.css" /><![endif]-->
</head>
  <body>
<style type="text/css" media="screen">
  <?php echo isset($propertyTemplate) ? "body {background-color:".$propertyTemplate->getBackgroundColor()."}" : ""?>
  <?php echo isset($propertyTemplate) ? "body a {color:".$propertyTemplate->getStyleColor()."}" : ""?>
  <?php echo isset($propertyTemplate) ? "#header {background-color:".$propertyTemplate->getStyleColor()."}" : ""?>
  <?php echo isset($propertyTemplate) ? "#login-login a:hover {color:".$propertyTemplate->getStyleColor()."}" : ""?>
  <?php echo isset($propertyTemplate) ? "#logout-txt a:hover {color:".$propertyTemplate->getStyleColor()."}" : ""?>
  <?php echo isset($propertyTemplate) ? ".stripe3 {background-color:".$propertyTemplate->getStyleColor()."}" : ""?>
  <?php echo isset($propertyTemplate) ? ".nav-item {color:".$propertyTemplate->getStyleColor()."}" : ""?>
  <?php echo isset($propertyTemplate) ? ".nav-item a:hover {color:".$propertyTemplate->getStyleColor()."}" : ""?>
  <?php echo isset($propertyTemplate) ? ".community-image {border-color:".$propertyTemplate->getStyleColor()."}" : ""?>
  <?php echo isset($propertyTemplate) ? ".right-title {background-color:".$propertyTemplate->getStyleColor()."}" : ""?>
  <?php echo isset($propertyTemplate) ? ".colorb {color:".$propertyTemplate->getStyleColor()."}" : ""?>
  <?php echo isset($propertyTemplate) ? ".color14 {color:".$propertyTemplate->getStyleColor()."}" : ""?>
  <?php echo isset($propertyTemplate) ? ".color14b {color:".$propertyTemplate->getStyleColor()."}" : ""?>
  <?php echo isset($propertyTemplate) ? ".color16 {color:".$propertyTemplate->getStyleColor()."}" : ""?>
  <?php echo isset($propertyTemplate) ? ".title {color:".$propertyTemplate->getStyleColor()."}" : ""?>
  <?php echo isset($propertyTemplate) ? "#contact-map iframe {border-color:".$propertyTemplate->getStyleColor()."}" : ""?>
  <?php echo isset($propertyTemplate) ? ".right-txt img {border-color:".$propertyTemplate->getStyleColor()."}" : ""?>
  <?php echo isset($propertyTemplate) ? "#email-footer a {color:".$propertyTemplate->getStyleColor()."}" : ""?>
</style>
<div id="container">
 <div id="main-top">&nbsp;</div>
              <div id="main-repeat">
              <div id="content">
          <div id="header">
            <div id="logout">
  <div id="logout-txt"><a href="<?php echo $property->getUrl()?>/residents">Resident's Center</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $property->getUrl()?>/residents/logout">Logout</a></div>

</div>
  <?php if($propertyTemplate->getLogoImage()):?>
    <div id="logo"><a href="<?php echo $property->getUrl()?>"><img src="<?php echo $property->getUrl()?>/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" alt="<?php echo $property->getName()?>" border="0" /></a></div>
  <?php else:?>
    <div id="logo-text"><a href="<?php echo $property->getUrl()?>"><?php echo $property->getName()?></a></div>
  <?php endif;?>
 
</div>
<div class="stripe1"></div>
<div id="nav">
  <div class="nav-item"><a href="<?php echo $property->getUrl()?>/">Home</a></div>
  <div class="nav-item"><a href="<?php echo $property->getUrl()?>/floorplans">Floor Plans</a></div>
  <div class="nav-item"><a href="<?php echo $property->getUrl()?>/photos">Photos</a></div>

  <div class="nav-item"><a href="<?php echo $property->getUrl()?>/features">Features</a></div>
  <div class="nav-item"><a href="<?php echo $property->getUrl()?>/community">Our Community</a></div>
  <?php if($propertyTemplate->getCustomPageName() != ''):?>
    <div class="nav-item"><a href="<?php echo $property->getUrl()?>/ourpage"><?php echo $propertyTemplate->getCustomPageName()?></a></div>
  <?php endif;?> 
  <div class="nav-item"><a href="<?php echo $property->getUrl()?>/contact">Contact Us</a></div>
  <div class="nav-item"><a href="<?php echo $property->getUrl()?>/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank">Rental Application</a></div>
  <!--<div id="nav-item-extra"><a href="extra.html">Extra</a></div>-->
</div>
<div id="sec-content">

<div id="sec-left"> <span class="title">Resident's Center</span><br />
  <br />
    <div id="res-payment">
      <div class="bold14f">Make a Payment</div><br />
      <?php if ($sf_user->hasFlash('mailsuccess')): ?>
      <div class="res-left1020">
        <div id="bold14f"> <span class="color14b"><?php echo $sf_user->getFlash('mailsuccess') ?></span> </div>
      </div>
      <?php else: ?>
      <form action="<?php echo url_for('payment/index?id='.$propertyId); ?>" method="post">
        <?php if($form->hasErrors()): ?>
        <div class="res-left1020">
          <ul>
            <?php foreach($form as $formField): ?>
            <?php if($formField->hasError()): ?>
            <li><?php echo $formField->renderError();?></li>
            <?php endif; ?>
            <?php endforeach;?>
          </ul>
        </div>
        <?php endif; ?>
          <div class="res-left1020"> To make an online payment please fill in your credit card information below and click submit. If you have any additional comments please use the notes field.<br />
          <br />
          <div class="res-form-txt"><span class="red">*</span>Name:</div>
          <div class="res-form-field"><?php echo $form['name']->render(array('size' => '40')); ?></div>
          <br />
          <br />
          <div class="res-form-txt"><span class="red">*</span>Apt Number:</div>
          <div class="res-form-field"><?php echo $form['aptnum']->render(array('size' => '10')); ?></div>
          <br />
          <br />
          <div class="res-form-txt"><span class="red">*</span>Amount:</div>
          <div class="res-form-field"><?php echo $form['amount']->render(array('size' => '10')); ?></div>
          <br />
          <br />
          <div class="res-form-txt"><span class="red">*</span>Card Number:</div>
          <div class="res-form-field"><?php echo $form['ccnumber']->render(array('size' => '20')); ?></div>
          <br />
          <br />
          <div class="res-form-txt"><span class="red">*</span>Verification Number:</div>
          <div class="res-form-field"><?php echo $form['cvv']->render(array('size' => '10')); ?></div>
          <br />

          <br />
          <div class="res-form-txt"><span class="red">*</span>Card Type:</div>
          <div class="res-form-field"><?php echo $form['method']->render(); ?></div>
          <br />
          <br />
          <div class="res-form-txt"><span class="red">*</span>Expiration Date:</div>
          <div class="res-form-field"><?php echo $form['expmonth']->render(); ?> <?php echo $form['expyear']->render() ?></div>
          <br />

          <br />
          <br />
          <br />

          <div class="res-form-txt">&nbsp;</div>
          <div class="res-form-field">
            <input name="submit" type="submit" value="Submit" />
          </div>
        </div>
      </form>
      <?php endif;?>
     </div>
    
  </div>

  <div id="right">

    <div class="right-title">
      <div class="right-title-txt">
  
      </div>
    </div>
    <div class="right-txt">
  
    </div>
  </div>
  
</div>
 </div>
 </div>
 <div id="main-bot"></div>
</div>
</body>
</html>
