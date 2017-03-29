<div id="sec-content">
  <div id="sec-left"> <span class="title">Resident's Center</span><br />
    <br />
    <div id="res-maintenance">
      <div class="bold14f">Request Maintenance</div><br />
      <?php if ($sf_user->hasFlash('mailsuccess')): ?>
      <div class="res-left1020">
        <div id="bold14f"> <span class="color14b"><?php echo $sf_user->getFlash('mailsuccess') ?></span> </div>
      </div>
      <?php else: ?>
      <form action="<?php echo url_for('residents/maintenance'); ?>" method="post">
        <?php if($form->hasErrors()): ?>
        <div class="res-left1020" style="color: red;">
        <strong>Form Error:</strong>
          <ul>
            <?php foreach($form as $formField): ?>
            <?php if($formField->hasError()): ?>
            <?php echo $formField->renderError();?>
            <?php endif; ?>
            <?php endforeach;?>
          </ul>
        </div>
        <?php endif; ?>
        <div class="res-left1020"> Fill in your name and request and we will contact you as promptly as possible to get your maintenance concern taken care of.<br />
          <br />
          <div class="res-form-txt"><span class="red">*</span>Resident Name:</div>
          <div class="res-form-field"><?php echo $form['name']->render(array('size' => '40')); ?></div>
          <br />
          <br />
          <div class="res-form-txt"><span class="red">*</span>Apartment Number:</div>
          <div class="res-form-field"><?php echo $form['aptnum']->render(array('size' => '10')); ?></div>
          <br />
          <br />
          <div class="res-form-txt"><span class="red">*</span>Phone Number:</div>
          <div class="res-form-field"><?php echo $form['phone']->render(array('size' => '20')); ?></div>
          <br />
          <br />
          <div class="res-form-txt">Email Address:</div>
          <div class="res-form-field"><?php echo $form['email']->render(array('size' => '40')); ?></div>
          <br />
          <br />
          <div class="res-form-txt"><span class="red">*</span>Maintenance Type:</div>
          <div class="res-form-field"><?php echo $form['mtype']->render(array('size' => '5')); ?><br />   
Hold the Ctrl key down to select more than one</div>
          <br />
          <br />
          <br />
          <br />
          <br />
          <div class="res-form-txt" style="clear: left"><span class="red">*</span>Describe in detail your maintenance request so we can serve you better:</div>
          <div class="res-form-field"><?php echo $form['mrequest']->render(array('cols' => '40','rows' => '10')); ?></div>
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <div class="res-form-txt">&nbsp;</div>
          <div class="res-form-field">
            <input name="submit" type="submit" value="Submit" />
          </div>
        </div>
      </form>
      <?php endif;?>
    </div>
    
  </div>
  <div id="right">
    <div class="right-title">
      <div class="right-title-txt">
  
      </div>
    </div>
    <div class="right-txt">
  
    </div>
  </div>
</div>
<?php slot('customstyles') ?>
<?php include_partial('global/customstyles', array('propertyTemplate' => $propertyTemplate)) ?>
<?php end_slot() ?>
<?php slot('chat') ?>
<?php if($propertyTemplate->getChat()):?>
<div id="bold-chat-holder">
  <div id="bold-chat"><?php echo $propertyTemplate->getChat();?></div>
</div>
<?php endif;?>
<?php end_slot() ?>
<?php slot('logo') ?>
  <?php if($propertyTemplate->getLogoImage()):?>
    <div id="logo"><a href="<?php echo url_for('default/index')?>"><img src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" alt="<?php echo $property->getName()?>" border="0" /></a></div>
  <?php else:?>
    <div id="logo-text"><a href="<?php echo url_for('default/index')?>"><?php echo $property->getName()?></a></div>
  <?php endif;?>
<?php end_slot() ?>
<?php slot('nav') ?>
<div id="nav">
  <div class="nav-item"><a href="<?php echo url_for('default/index')?>">Home</a></div>
  <div class="nav-item"><a href="<?php echo url_for('floorplans/index')?>">Floor Plans</a></div>
  <div class="nav-item"><a href="<?php echo url_for('photos/index')?>">Photos</a></div>
  <div class="nav-item"><a href="<?php echo url_for('features/index')?>">Features</a></div>
  <div class="nav-item"><a href="<?php echo url_for('community/index')?>">Our Community</a></div>
  <?php if($propertyTemplate->getCustomPageName() != ''):?>
    <div class="nav-item"><a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>"><?php echo $propertyTemplate->getCustomPageName()?></a></div>
  <?php endif;?> 
  <div class="nav-item"><a href="<?php echo url_for('contact/index')?>">Contact Us</a></div>
  <div class="nav-item"><a href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank">Rental Application</a></div>
  <!--<div id="nav-item-extra"><a href="extra.html">Extra</a></div>-->
</div>
<?php end_slot() ?>
<?php slot('tracking-code') ?>
    <?php if($propertyTemplate->getTrackingCode()):?>
    	<?php echo $propertyTemplate->getTrackingCode()?>
    <?php endif;?>
<?php end_slot() ?>