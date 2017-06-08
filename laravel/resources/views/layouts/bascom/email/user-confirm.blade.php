<?php use App\Util\Util as U;?>
<!DOCTYPE html><html xmlns=http://www.w3.org/1999/xhtml><head><meta http-equiv=Content-Type content=text/html; charset=utf-8>
<link href=http://www.400rhett.com/css/jquery-ui.min.css rel=stylesheet>
<?php foreach ($styleSheets as $index => $href): ?>
    <link href=<?php echo $href;?> rel=stylesheet>
<?php endforeach; ?>

<body id=schedule-a-tour contact>
<!-- contact -->
<section class=content><div class=container>
<div class=row><div class=col-md-12><div class=page-title><h1>Your submission was received!</h1><div class=divder-teal></div></div></div></div>

<?php if ($mode == 'briefContact'): ?>
<div class=row><div class=col-md-5><p>Thank you <?php echo $contact['name']; ?> for your interest in <?php echo $apartmentName;?> Apartments.
<?php elseif ($mode == 'schedule-a-tour'): ?>
<div class=row><div class=col-md-6><p>Thank you <?php echo $contact['firstname']; ?> <?php echo $contact['lastname']; ?> for your interest in <?php echo $apartmentName;?> Apartments.
<?php elseif ($mode == 'maintenance'): ?>
<div class=row><div class=col-md-6><p>Thank you <?php echo array_get($contact, 'residentName'); ?>  for this request.
<?php else: ?>
<div class=row><div class=col-md-6><p>Thank you <?php echo $contact['fname']; ?> <?php echo $contact['lname']; ?> for your interest in <?php echo $apartmentName;?> Apartments.
<?php endif; ?>
Our team will quickly review your submission and get back to you as soon as possible. </p>
<p>For questions, give us a call:&nbsp;<span class=teal><?php echo $entity->getPhone(); ?></span></p></div></div>
<div class=row><div class=col-md-6><p>Sincerely, <br><?php echo $apartmentName;?> Apartments Management Team</p></div></div>
<div class=row><div class=col-md-6><p>The following was submitted:</p><p>

<?php if ($mode == 'maintenance'): ?>
Resident Name: <?php echo $contact['ResidentName']; ?><br>
email: <?php echo $contact['email']; ?><br>
Maintenance Phone: <?php echo $contact['maintenance_phone']; ?><br>
Maintenance Unit: <?php echo $contact['maintenance_unit']; ?><br>
permission To Enter: <?php echo $contact['permissionToEnter']; ?><br>
Permission To Enter Date: <?php echo $contact['PermissionToEnterDate']; ?><br>
Permission Given By: <?php echo $contact['maintenance_name']; ?><br>
Request Summary: <?php echo $contact['maintenance_mrequest']; ?><br>

Action Requested: Maintenance Request
<?php endif;?>

<?php if ($mode == 'briefContact'): ?>
Name: <?php echo $contact['name']; ?><br>

Email: <?php echo $contact['email'];?><br>

Message: <?php echo $contact['message']; ?><br>

Action Requested: SCHEDULE A TOUR (From Front Page )
<?php endif;?>

<?php if ($mode == 'more'): ?>

First Name: <?php echo $contact['fname'];?> <br>

Last Name: <?php echo $contact['lname'];?><br>

Email: <?php echo $contact['email'];?> <br>

Phone: <?php echo $contact['phone'];?> <br>

Move-in date: <?php echo $contact['movein'];?> <br>
<?php if(U::arrayGet($contact,'limited.unittype')): ?>
<br>
<b>You are interested in this unit:</b><br>
Unit Type: <?php echo U::arrayGet($contact,'limited.unittype','--no unit type specified--');?><br>

Bed: <?php echo U::arrayGet($contact,'limited.bed','--not available--');?><br>

Bath: <?php echo U::arrayGet($contact,'limited.bath','--not available--');?><br>

Square Feet: <?php echo U::arrayGet($contact,'limited.sqft','--not available--');?><br>
<?php endif;?>
Action Requested: Request For More Information<br>
<?php endif; ?>

<?php if ($mode == 'contact'): ?>

First Name: <?php echo $contact['fname'];?> <br>

Last Name: <?php echo $contact['lname'];?><br>

Email: <?php echo $contact['email'];?> <br>

Phone: <?php echo $contact['phone'];?> <br>

Move-in date: <?php echo $contact['movein'];?> <br>

Action Requested: Contact<br>
<?php endif; ?>

<?php if ($mode == 'schedule-a-tour'): ?>
First Name: <?php echo $contact['firstname'];?> <br>

Last Name: <?php echo $contact['lastname'];?><br>

Email: <?php echo $contact['email'];?> <br>

Phone: <?php echo $contact['phone'];?> <br>

Move-in date: <?php echo $contact['moveindate'];?> <br>

Visit date: <?php echo $contact['visitdate'];?> <br>

Visit time: <?php echo $contact['visittime'];?><br>

Action Requested: SCHEDULE A TOUR<br>
<?php endif; ?>

<?php if ($mode == 'apply-online'): ?>
First Name: <?php echo $contact['fname'];?> <br>

Last Name: <?php echo $contact['lname'];?><br>

Email: <?php echo $contact['email'];?> <br>

Phone: <?php echo $contact['phone'];?> <br>

Action Requested: APPLY ONLINE<br>
<?php endif; ?>

<?php if ($mode == 'apply-now' || $mode == 'avail-unit'): ?>
First Name: <?php echo $contact['fname'];?> <br>

Last Name: <?php echo $contact['lname'];?><br>

Email: <?php echo $contact['email'];?> <br>

Phone: <?php echo $contact['phone'];?> <br>

Unit number: <?php echo $contact['unit'];?> <br>

Preferred floor plan: <?php echo $contact['floorplan'];?> <br>

Action Requested: APPLY NOW<br>
<?php endif; ?>


<?php if ($mode == 'pre-applicaton'): ?>
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
