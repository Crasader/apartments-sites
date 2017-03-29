<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="/css/respmain.css" />
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen" />
<meta charset="utf-8">
<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />
</head><body>
<div id="schedulecontain" class="schedulecontain">
  <div id="popoverform">
    <h1>Schedule a Tour</h1>
    <div id="contact-form-title">Your message has been sent.<br>A leasing agent will be contacting you shortly. 
        <br><br>For questions, give us a call:&nbsp;<strong><a href="tel:<?php echo $property->getPhone()?>">
<?php echo $property->getPhone()?></a></strong>
    </div>
  </div>
</div>
</body>
</html>