<td>
<ul class="sf_admin_td_actions">
<!--test-->
  <li><?php echo link_to(image_tag('/sf/sf_admin/images/edit_icon.png', array('alt' => __('edit'), 'title' => __('edit'))), 'property_photos/edit?id='.$property_photo->getId()) ?></li>
  <!--li><?php echo link_to(image_tag('/sf/sf_admin/images/delete_icon.png', array('alt' => __('delete'), 'title' => __('delete'))), 'property_photos/delete?id='.$property_photo->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
)) ?></li-->
<li>
  <a onclick="if (confirm('Are you sure?')) { var f = document.createElement('form'); f.style.display = 'none'; this.parentNode.appendChild(f); f.method = 'post'; f.action = this.href;f.submit(); };return false;" href="/backend.php/property_photos/delete/id/<?php echo $property_photo->getId()?>"><img alt="delete" title="delete" src="/sf/sf_admin/images/delete_icon.png"></a>
  </li>
</ul>
</td>
