<?php echo form_tag('property_blogarticles/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($property_blogarticle, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('property_blogarticle[property_id]', __($labels['property_blogarticle{property_id}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property_blogarticle{property_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_blogarticle{property_id}')): ?>
    <?php echo form_error('property_blogarticle{property_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($property_blogarticle, 'getPropertyId', array (
  'related_class' => 'Property',
  'control_name' => 'property_blogarticle[property_id]',
  'peer_method' => 'getAll',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_blogarticle[title]', __($labels['property_blogarticle{title}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property_blogarticle{title}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_blogarticle{title}')): ?>
    <?php echo form_error('property_blogarticle{title}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property_blogarticle, 'getTitle', array (
  'size' => '80x10',
  'control_name' => 'property_blogarticle[title]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_blogarticle[perma_link]', __($labels['property_blogarticle{perma_link}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property_blogarticle{perma_link}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_blogarticle{perma_link}')): ?>
    <?php echo form_error('property_blogarticle{perma_link}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property_blogarticle, 'getPermaLink', array (
  'size' => '80x10',
  'control_name' => 'property_blogarticle[perma_link]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_blogarticle[article_image1]', __($labels['property_blogarticle{article_image1}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property_blogarticle{article_image1}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_blogarticle{article_image1}')): ?>
    <?php echo form_error('property_blogarticle{article_image1}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_admin_input_file_tag($property_blogarticle, 'getArticleImage1', array (
  'control_name' => 'property_blogarticle[article_image1]',
  'include_link' => 'blogarticles',
  'include_remove' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_blogarticle[article_image2]', __($labels['property_blogarticle{article_image2}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property_blogarticle{article_image2}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_blogarticle{article_image2}')): ?>
    <?php echo form_error('property_blogarticle{article_image2}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_admin_input_file_tag($property_blogarticle, 'getArticleImage2', array (
  'control_name' => 'property_blogarticle[article_image2]',
  'include_link' => 'blogarticles',
  'include_remove' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_blogarticle[article_content]', __($labels['property_blogarticle{article_content}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property_blogarticle{article_content}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_blogarticle{article_content}')): ?>
    <?php echo form_error('property_blogarticle{article_content}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($property_blogarticle, 'getArticleContent', array (
  'size' => '120x30',
  'control_name' => 'property_blogarticle[article_content]',
  'rich' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('property_blogarticle' => $property_blogarticle)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($property_blogarticle->getId()): ?>
<?php echo button_to(__('delete'), 'property_blogarticles/delete?id='.$property_blogarticle->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
