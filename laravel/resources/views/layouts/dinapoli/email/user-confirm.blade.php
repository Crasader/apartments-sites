<!DOCTYPE html><html xmlns=http://www.w3.org/1999/xhtml><head><meta http-equiv=Content-Type content=text/html; charset=utf-8>
<link href=http://www.400rhett.com/css/jquery-ui.min.css rel=stylesheet>
<?php foreach($styleSheets as $index => $href): ?>
    <link href=<?php echo $href;?> rel=stylesheet>
<?php endforeach; ?>

<body id=schedule-a-tour contact>
<!-- contact -->
<section class=content><div class=container>
<div class=row><div class=col-md-12><div class=page-title><h1>Your submission was received!</h1><div class=divder-teal></div></div></div></div>

<div class=row><div class=col-md-6><p>Thank you <?php echo $contact['fname']; ?> <?php echo $contact['lname']; ?> for your interest in <?php echo $apartmentName;?> Apartments. 
Our team will quickly review your submission and get back to you as soon as possible. </p>
<p>For questions, give us a call:&nbsp;<span class=teal><?php echo $entity->getPhone(); ?></span></p></div></div>
<div class=row><div class=col-md-6><p>Sincerely, <br><?php echo $apartmentName;?> Apartments Management Team</p></div></div>
<div class=row><div class=col-md-6><p>The following was submitted:</p><p>

<?php if($mode == 'contact'): ?>

First Name: <?php echo $contact['fname'];?> <br>

Last Name: <?php echo $contact['lname'];?><br>

Email: <?php echo $contact['email'];?> <br>

Phone: <?php echo $contact['phone'];?> <br>

Move-in date: <?php echo $contact['movein'];?> <br>

Action Requested: CONTACT<br>
<?php endif; ?>

<?php if($mode == 'schedule-a-tour'): ?>
First Name: <?php echo $contact['fname'];?> <br>

Last Name: <?php echo $contact['lname'];?><br>

Email: <?php echo $contact['email'];?> <br>

Phone: <?php echo $contact['phone'];?> <br>

Move-in date: <?php echo $contact['movein'];?> <br>

Visit date: <?php echo $contact['visit'];?> <br>

Action Requested: SCHEDULE A TOUR<br>
<?php endif; ?>

<?php if($mode == 'apply-online'): ?>
First Name: <?php echo $contact['fname'];?> <br>

Last Name: <?php echo $contact['lname'];?><br>

Email: <?php echo $contact['email'];?> <br>

Phone: <?php echo $contact['phone'];?> <br>

Action Requested: APPLY ONLINE<br>
<?php endif; ?>

<?php if($mode == 'apply-now' || $mode == 'avail-unit'): ?>
First Name: <?php echo $contact['fname'];?> <br>

Last Name: <?php echo $contact['lname'];?><br>

Email: <?php echo $contact['email'];?> <br>

Phone: <?php echo $contact['phone'];?> <br>

Unit number: <?php echo $contact['unit'];?> <br>

Preferred floor plan: <?php echo $contact['floorplan'];?> <br>

Action Requested: APPLY NOW<br>
<?php endif; ?>


<?php if($mode == 'pre-applicaton'): ?>
First Name: <?php echo $contact['fname'];?> <br>

Last Name: <?php echo $contact['lname'];?><br>

Email: <?php echo $contact['email'];?> <br>

Phone: <?php echo $contact['phone'];?> <br>

Preferred floor plan: <?php echo $contact['floorplan'];?> <br>

Action Requested: PRE-APPLICATION<br>
<?php endif; ?>

<br><br>
</p></div></div></div></section>
</div></div></body></html>
