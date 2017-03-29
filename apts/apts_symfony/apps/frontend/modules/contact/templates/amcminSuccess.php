<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="/css/respmain.css" />
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1">
<script src="https://www.google.com/recaptcha/api.js"></script>
<script type='text/javascript'>
    function validateform(){
    var captcha_response = grecaptcha.getResponse();
    if(captcha_response.length == 0)

      {
          document.getElementById('captchaMessage').innerHTML="You can't leave Captcha Code empty";
          //document.getElementById("mySubmit").disabled = true;
          return false;
      }
      else
      {
          document.getElementById('captchaMessage').innerHTML="Captcha completed";
          this.form.submit();
          return true; 
      }
    }
    
</script>
</head><body>
<div id="schedulecontain" class="schedulecontain">
  <div id="popoverform">
    <h1>Schedule a Tour</h1>
    <form id="form" action="<?php echo url_for('contact/min'); ?>" method="post">
    <?php if($form->hasErrors()): ?>

        <ul class="formerrors">
          <?php foreach($form as $formField): ?>
          <?php if($formField->hasError()): ?>
          <li><?php echo $formField->renderError();?></li>
          <?php endif; ?>
          <?php endforeach;?>
        </ul>
      <?php endif; ?>
      <ul >
        <li>
          <label>*First Name </label>
          <div>
           <?php echo $form['fname']->render(array('size' => '20')) ?>
          </div>
        </li>
        <li>
          <label>*Last Name </label>
          <div>
            <?php echo $form['lname']->render(array('size' => '20')) ?>
          </div>
        </li>
        <li>
          <label>Phone </label>
          <div>
           <?php echo $form['phone']->render(array('size' => '20')) ?>
          </div>
        </li>
        <li>
          <label>*Email </label>
          <div>
             <?php echo $form['email']->render(array('size' => '20')) ?>
          </div>
        </li>
        <li>
        <label>Notes </label>
          <div>
            <?php echo $form['notes']->render(array('cols' => '82','rows' => '6','style' => 'font-size: 12px; text-align:left;')); ?>
          </div>
        </li>
        <!--li>
          <lable>SECURITY CODE*</lable>
          <div>
            <?php //echo $form['captcha']->render() ?>
          </div>
        </li-->

        <!-- An error occurred -->
        <?php if (captcha == 'False'):?>

            <font color="red">Sorry, there was a problem with the following:<br>
            CAPTCHA ANSWER WAS INCORRECT</font><br>

        <?php endif;?> 
        <li>
            <div>
              <span id="captchaMessage" style="color:#cc2424" /></span>
              <div class="g-recaptcha" data-sitekey="6LcqTRYUAAAAAHtSD4dB8z6hvKGd46EIFZCtS94-"></div>
            </div>
        </li>
        <li>
         <br>
         <input type="button" value="Submit" id="mySubmit" onClick="return validateform();">
        </li>
      </ul>
    </form>
  </div>
</div>
</body>
</html>