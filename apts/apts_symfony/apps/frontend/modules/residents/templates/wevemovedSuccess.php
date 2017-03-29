<div id="sec-content">
  <div id="sec-left">
    <span class="title">Resident's Center</span><br />
    <br />
    <!--<div id="res-moved">
      <div class="res-left10">
        <img src="images/weve-moved.jpg" alt="we've moved" align="left" class="padding20" />
        <div class="bold14f">We've Moved</div><br />
        Let everyone know that you've moved into a great new apartment!<br />
        <br />
        <a href="weve-moved.html"><img src="images/weve-moved-btn.gif" alt="send personalized notice" /></a>
      </div>
    </div>-->
    <div class="bold14f">Send a "We've Moved" Notice</div>
    <div class="res-left10">
      Let everyone know that you've moved into a great new apartment!<br />
Select a picture, write your message and add up to 10 Recipients. We take care of the rest.<br />
      <br />
      <?php if ($sf_user->hasFlash('movedmailsuccess')): ?>
      <span class="title"><?php echo $sf_user->getFlash('movedmailsuccess') ?></span>
      <?php if ($sf_user->hasFlash('movedmailsuccesslist')): ?>
      <?php echo $sf_user->getFlash('movedmailsuccesslist') ?>
      <?php endif ?>
   <?php else: ?>
   
   
     <form action="<?php echo url_for('residents/wevemoved'); ?>" method="post" enctype="multipart/form-data">
     <?php if($form->hasErrors()): ?>
     <div class="contact-form-row">
     <ul>
     <?php foreach($form as $formField): ?>
     <?php if($formField->hasError()): ?>
     <li><?php echo $formField->renderError();?></li>
     <?php endif; ?>
     <?php endforeach;?>
     </ul>
     </div>
     <?php endif; ?>
      <div class="res-form-row">
        <div class="res-form-txt"><span class="red">*</span>Image:</div>
        <div class="res-form-field"><?php echo $form['file']->render(array('size' => '20')) ?></div>
      </div>
      <div class="res-form-row">
        <div class="res-form-txt"><span class="red">*</span>Message:</div>
        <div class="res-form-field"><?php echo $form['notes'] ?></div>
      </div>
      <div class="res-form-row">
        <div class="res-form-txt">Recipients:</div>
        <div class="res-form-field"><?php echo $form['email1']->render(array('size' => '24')) ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $form['email2']->render(array('size' => '24')) ?></div>
      </div>
      <div class="res-form-row">
        <div class="res-form-txt">&nbsp;</div>
        <div class="res-form-field"><?php echo $form['email3']->render(array('size' => '24')) ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $form['email4']->render(array('size' => '24')) ?></div>
      </div>
      <div class="res-form-row">
        <div class="res-form-txt">&nbsp;</div>
        <div class="res-form-field"><?php echo $form['email5']->render(array('size' => '24')) ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $form['email6']->render(array('size' => '24')) ?></div>
      </div>
      <div class="res-form-row">
        <div class="res-form-txt">&nbsp;</div>
        <div class="res-form-field"><?php echo $form['email7']->render(array('size' => '24')) ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $form['email8']->render(array('size' => '24')) ?></div>
      </div>
      <div class="res-form-row">
        <div class="res-form-txt">&nbsp;</div>
        <div class="res-form-field"><?php echo $form['email9']->render(array('size' => '24')) ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $form['email10']->render(array('size' => '24')) ?></div>
      </div>
      <div class="res-form-txt">&nbsp;</div>
      <div class="res-form-field"><input name="submit" type="submit" value="Submit" /></div>
    </form>
    <?php endif;?>
    </div>
  </div>
  <div id="right">
    <div class="right-title">
      <div class="right-title-txt"></div>
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
    <div id="bold-chat-holder"><div id="bold-chat"><?php echo $propertyTemplate->getChat();?></div></div>
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