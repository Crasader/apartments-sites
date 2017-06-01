<?php use App\Util\Util; ?>
<!DOCTYPE html><html xmlns=http://www.w3.org/1999/xhtml><head><meta http-equiv=Content-Type content=text/html; charset=utf-8>
<link href=http://www.400rhett.com/css/jquery-ui.min.css rel=stylesheet>
<?php foreach ($styleSheets as $index => $href): ?>
    <link href=<?php echo $href;?> rel=stylesheet>
<?php endforeach; ?>

<body id=schedule-a-tour contact>
<!-- contact -->
<section class=content><div class=container>
<div class=row><div class=col-md-12><div class=page-title><h1>Maintenance Request Received</h1><div class=divder-teal></div></div></div></div>

<p>For questions, give us a call:&nbsp;<span class=teal><?php echo $entity->getPhone(); ?></span></p></div></div>
<div class=row><div class=col-md-6><p>Sincerely, <br><?php echo $apartmentName;?> Apartments Management Team</p></div></div>
<div class=row><div class=col-md-6><p>The following was submitted:</p><p>
Name: <?php echo Util::arrayGet($contact,'ResidentName'); ?><br>

Unit: <?php echo Util::arrayGet($contact,'maintenance_unit');?><br>

You have told us the best way to contact you is at: <b><?php echo Util::arrayGet($contact,'maintenance_phone');?></b><br>

We will be in touch with you shortly.

<br><br>
</p></div></div></div></section>
</div></div></body></html>
