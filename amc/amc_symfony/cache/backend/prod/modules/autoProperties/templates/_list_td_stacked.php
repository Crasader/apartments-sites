<td colspan="7">
    <?php echo $property->getCode() ?>
     - 
    <?php echo $property->getName() ?>
     - 
    <?php echo $property->getCity() ?>
     - 
    <?php echo $property->getState() ?>
     - 
    <?php echo $property->getFeatured() ? image_tag(sfConfig::get('sf_admin_web_dir').'/images/tick.png') : '&nbsp;' ?>
     - 
    <?php echo $property->getStatus() ?>
     - 
    <?php echo $property->getUrl() ?>
     - 
</td>