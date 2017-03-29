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

			<!-- form start -->

        <div class="workorder">
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
        <form action="<?php echo url_for('residents/maintenance'); ?>" method="post">
        <table class="workorder_table">
          <tbody>
            <tr>
              <td><label for="aptnum">Unit Number:</label></td>

              <td><?php echo $form['unit']->render(array('size' => '5')); ?></td>
            </tr>
            
            <tr>
              <td><label for="phone">Contact Phone:</label></td>
              <td><?php echo $form['phone']->render(array('size' => '20')); ?></td>
            </tr>

            <tr>
              <td><label for="name">Permission To Enter Given By:</label></td>
              <td><?php echo $form['name']->render(array('size' => '40')); ?></td>
            </tr>
            
            <tr>
              <td><label for="PermissionToEnterDate">Permission To Enter Date (mm/dd/yy):</label></td>
              <td><?php echo $form['date']->render(array('size' => '40')); ?></td>
            </tr>

            <tr>
              <td><label for="mtype">Work Order Category:</label></td>
              <td><?php echo $form['mtype']->render(array('size' => '5')); ?></td>
            </tr>
            

            <tr>
              <td><label for="mrequest">Describe the Problem:</label></td>
              <td><?php echo $form['mrequest']->render(array('cols' => '40','rows' => '10')); ?></td>
            </tr>


            <tr>
              <td>
                  <input name="Submit" value="Submit" type="submit"  />
              </td>
              <td>
              </td>
            </tr>

          </tbody>
        </table>
        </form>
      </div>
		<!-- form end -->
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