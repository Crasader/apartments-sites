Dear <?php echo $name ? $name : ' '?>,

Thank you for contacting <?php echo $propertyname ? $propertyname : ' '?>.

We have received your email and someone from our office will follow up with you as soon as possible.

In the meantime, please feel free to contact our Leasing Professionals directly on <?php echo $propertyphone ? $propertyphone : ' '?>.

We thank you for your interest,

<?php echo $propmanager ? $propmanager : ' '?>

<?php echo $propertyname ? $propertyname : ' '?>

<?php echo $propertyaddress ? $propertyaddress : ' '?>

<?php echo $propertycity ? $propertycity : ' '?>, <?php echo $propertystate ? $propertystate : ' '?> <?php echo $propertyzip ? $propertyzip : ' ' ?>

<?php if($propertyphone):?>
P: <?php echo $propertyphone ?>
<?php endif;?>

<?php if($propertyfax):?>
F: <?php echo $propertyfax ?>
<?php endif;?>
