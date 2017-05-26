<!DOCTYPE HTML PUBLIC -//W3C//DTD HTML 4.01 Transitional//EN><html>
<head><meta http-equiv=Content-Type content=text/html; charset=utf-8>
	<?php foreach ($styleSheets as $i => $sheet): ?>
		<link rel=stylesheet type=text/css href='<?php echo $sheet;?>'>
	<?php endforeach; ?>
<title></title></head><body>
<section class=content><div class=container><div class=row><div class=col-md-12><div class=page-title><h1>Maintenance Request</h1><div class=divder-teal></div></div></div></div>
<div class=row><div class=col-md-6><h4><p>Resident Center Maintenance Request has been submitted<br>
Resident Name - <?php echo $ResidentName;?> <br>
Unit Number - <?php echo $maintenance_unit; ?><br>
Email - <?php echo $email;?> <br>
Phone Number - <?php echo $maintenance_phone;?> <br>
<?php if ($permissionToEnter) {
    ?>
Permission to Enter by - <?php echo $maintenance_name; ?> <br>
Scheduled Entry Date: <?php echo $PermissionToEnterDate; ?><br>
<?php 
} ?>
Description - <?php echo $maintenance_mrequest;?><br>
Work Order Number - <?php echo $data['workOrder']['WorkOrderNumber'];?><br>
</p></h4><br></div></div>
</body></html>


