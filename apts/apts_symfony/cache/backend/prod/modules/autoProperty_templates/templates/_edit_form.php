<?php echo form_tag('property_templates/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($property_template, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('property_template[property]', __($labels['property_template{property}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property_template{property}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_template{property}')): ?>
    <?php echo form_error('property_template{property}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = $property_template->getProperty(); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_template[welcome]', __($labels['property_template{welcome}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property_template{welcome}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_template{welcome}')): ?>
    <?php echo form_error('property_template{welcome}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property_template, 'getWelcome', array (
  'size' => 80,
  'control_name' => 'property_template[welcome]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_template[description]', __($labels['property_template{description}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property_template{description}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_template{description}')): ?>
    <?php echo form_error('property_template{description}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = $property_template->getDescription(); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_template[announcements]', __($labels['property_template{announcements}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property_template{announcements}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_template{announcements}')): ?>
    <?php echo form_error('property_template{announcements}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($property_template, 'getAnnouncements', array (
  'size' => '80x10',
  'control_name' => 'property_template[announcements]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_template[email]', __($labels['property_template{email}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property_template{email}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_template{email}')): ?>
    <?php echo form_error('property_template{email}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($property_template, 'getEmail', array (
  'size' => '80x5',
  'control_name' => 'property_template[email]',
)); echo $value ? $value : '&nbsp;' ?>
  <div class="sf_admin_edit_help"><?php echo __('Use ~ to separate multiple email addresses. Example joe@amcllc.net~jack@amcllc.net') ?></div>  </div>
</div>

<div class="form-row">
  <?php echo label_for('property_template[style_color]', __($labels['property_template{style_color}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property_template{style_color}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_template{style_color}')): ?>
    <?php echo form_error('property_template{style_color}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property_template, 'getStyleColor', array (
  'size' => 20,
  'control_name' => 'property_template[style_color]',
  'onclick' => 'startColorPicker(this)',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_template[background_color]', __($labels['property_template{background_color}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property_template{background_color}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_template{background_color}')): ?>
    <?php echo form_error('property_template{background_color}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property_template, 'getBackgroundColor', array (
  'size' => 20,
  'control_name' => 'property_template[background_color]',
  'onclick' => 'startColorPicker(this)',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_template[rentalapp_file]', __($labels['property_template{rentalapp_file}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property_template{rentalapp_file}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_template{rentalapp_file}')): ?>
    <?php echo form_error('property_template{rentalapp_file}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_admin_input_file_tag($property_template, 'getRentalappFile', array (
  'control_name' => 'property_template[rentalapp_file]',
  'include_link' => 'properties',
  'include_remove' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_template[community_image]', __($labels['property_template{community_image}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property_template{community_image}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_template{community_image}')): ?>
    <?php echo form_error('property_template{community_image}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_admin_input_file_tag($property_template, 'getCommunityImage', array (
  'control_name' => 'property_template[community_image]',
  'include_link' => 'properties',
  'include_remove' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_template[community_description]', __($labels['property_template{community_description}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property_template{community_description}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_template{community_description}')): ?>
    <?php echo form_error('property_template{community_description}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($property_template, 'getCommunityDescription', array (
  'size' => '80x10',
  'control_name' => 'property_template[community_description]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_template[show_walkscore]', __($labels['property_template{show_walkscore}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property_template{show_walkscore}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_template{show_walkscore}')): ?>
    <?php echo form_error('property_template{show_walkscore}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($property_template, 'getShowWalkscore', array (
  'control_name' => 'property_template[show_walkscore]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_template[community_attractions_list]', __($labels['property_template{community_attractions_list}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property_template{community_attractions_list}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_template{community_attractions_list}')): ?>
    <?php echo form_error('property_template{community_attractions_list}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($property_template, 'getCommunityAttractionsList', array (
  'size' => '80x10',
  'control_name' => 'property_template[community_attractions_list]',
)); echo $value ? $value : '&nbsp;' ?>
  <div class="sf_admin_edit_help"><?php echo __('Use ~ to separate attraction from milage. Put each attraction on a separate line. Example:<br />Crossroads Shopping Plaza~1.5 miles<br />Walmart Super Center~1.5 miles<br />Marshalls~1.5 miles') ?></div>  </div>
</div>

<div class="form-row">
  <?php echo label_for('property_template[custom_page_name]', __($labels['property_template{custom_page_name}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property_template{custom_page_name}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_template{custom_page_name}')): ?>
    <?php echo form_error('property_template{custom_page_name}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property_template, 'getCustomPageName', array (
  'size' => 80,
  'control_name' => 'property_template[custom_page_name]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_template[custom_page_content]', __($labels['property_template{custom_page_content}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property_template{custom_page_content}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_template{custom_page_content}')): ?>
    <?php echo form_error('property_template{custom_page_content}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($property_template, 'getCustomPageContent', array (
  'size' => '80x10',
  'control_name' => 'property_template[custom_page_content]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_template[contact_email_text]', __($labels['property_template{contact_email_text}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property_template{contact_email_text}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_template{contact_email_text}')): ?>
    <?php echo form_error('property_template{contact_email_text}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($property_template, 'getContactEmailText', array (
  'size' => '80x10',
  'control_name' => 'property_template[contact_email_text]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_template[facebook_url]', __($labels['property_template{facebook_url}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property_template{facebook_url}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_template{facebook_url}')): ?>
    <?php echo form_error('property_template{facebook_url}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($property_template, 'getFacebookUrl', array (
  'size' => '80x10',
  'control_name' => 'property_template[facebook_url]',
)); echo $value ? $value : '&nbsp;' ?>
  <div class="sf_admin_edit_help"><?php echo __('Social Media Tags: facebook, google, twitter, yelp, instagram, linkedin, pinterest. Example:<br /><-multi-><br />facebook~http://facebook.com/willowcoveapartments<br />google~https://plus.google.com/+WillowCoveApartmentsWestJordan') ?></div>  </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('property_template' => $property_template)) ?>

</form>

<ul class="sf_admin_actions">
  </ul>
