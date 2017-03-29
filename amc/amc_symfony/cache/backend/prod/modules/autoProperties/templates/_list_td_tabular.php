    <td><?php echo $property->getCode() ?></td>
      <td><?php echo $property->getName() ?></td>
      <td><?php echo $property->getCity() ?></td>
      <td><?php echo $property->getState() ?></td>
      <td><?php echo $property->getFeatured() ? image_tag(sfConfig::get('sf_admin_web_dir').'/images/tick.png') : '&nbsp;' ?></td>
      <td><?php echo $property->getStatus() ?></td>
      <td><?php echo $property->getUrl() ?></td>
  