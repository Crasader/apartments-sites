      <div id="sec-content">
       <div id="sec-title">Contact Us</div>
    <?php if ($sf_user->hasFlash('mailsuccess')): ?>
    <div id="contact-form-title"> <span class="color14b"><?php echo $sf_user->getFlash('mailsuccess') ?></span></div>
    <?php else: ?>
    <form action="<?php echo url_for('contactus/index'); ?>" method="post">
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
      <div class="contact-form-row">
        <div class="contact-form-txt"><span class="red">*</span>First Name:</div>
        <div class="contact-form-field1"><?php echo $form['fname']->render(array('size' => '18')) ?></div>
        <div class="contact-form-txt"><span class="red">*</span>Last Name:</div>
        <div class="contact-form-field2"><?php echo $form['lname']->render(array('size' => '18')) ?></div>
      </div>
      <div class="contact-form-row">
        <div class="contact-form-txt">Phone Number:</div>
        <div class="contact-form-field1"><?php echo $form['phone']->render(array('size' => '18')) ?></div>
        <div class="contact-form-txt">Fax Number:</div>
        <div class="contact-form-field2"><?php echo $form['fax']->render(array('size' => '18')) ?></div>
      </div>
      <div class="contact-form-row">
        <div class="contact-form-txt"><span class="red">*</span>Email Address:</div>
        <div class="contact-form-field1"><?php echo $form['email']->render(array('size' => '18')) ?></div>
        <div class="contact-form-txt">Employer:</div>
        <div class="contact-form-field2"><?php echo $form['employer']->render(array('size' => '18')) ?></div>
      </div>
      <div class="contact-form-row">
        <div class="contact-form-txt">Number of Occupants:</div>
        <div class="contact-form-field1"><?php echo $form['occupants']->render(array('size' => '18')) ?></div>
        <div class="contact-form-txt">Pets:(What kind and size?)</div>
        <div class="contact-form-field2"><?php echo $form['pets']->render(array('size' => '18')) ?></div>
      </div>
      <div class="contact-form-row">
        <div class="contact-form-txt">When are you needing an apartment?</div>
        <div class="contact-form-field1"><?php echo $form['when']->render(array('size' => '18')) ?></div>
        <div class="contact-form-txt">Number of Bedrooms:</div>
        <div class="contact-form-field2"><?php echo $form['bedrooms']->render(array('size' => '18')) ?></div>
      </div>
      <div class="contact-form-row">
        <div class="contact-form-txt3"><span class="red">*</span>How did you hear about us?</div>
        <div class="contact-form-field1"><?php echo $form['howhear']; ?></div>
      </div>
      <div class="contact-form-row">
        <div class="contact-form-txt3"><span class="red">*</span>How would you prefer us to contact you?</div>
        <div class="contact-form-field1"><?php echo $form['howcontact']; ?></div>
      </div>
      <div class="contact-form-row">
        <div class="contact-form-txt">Notes:</div>
        <div class="contact-form-field2"><?php echo $form['notes']->render(array('cols' => '53', 'rows' => '8')) ?></div>
      </div>
      <div class="contact-form-row">
        <div class="contact-form-txt"><span class="red">*</span>Enter security code:</div>
        <div class="contact-form-field1"><?php echo $form['captcha']->render() ?></div>
      </div>
      <div class="contact-form-row">
        <div class="contact-form-txt">&nbsp;</div>
        <div class="contact-form-field1"><input name="submit" type="submit" value="Submit" /></div>
      </div>
    </form>
    <?php endif;?>
 </div>