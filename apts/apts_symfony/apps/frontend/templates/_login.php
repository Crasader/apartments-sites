<div style="float:right; width:500px;">
<?php if($sf_user->isAuthenticated()):?>
<div id="logout">
  <div id="logout-txt"><a href="<?php echo url_for('residents/index');?>">Resident's Center</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo url_for('residents/logout')?>">Logout</a></div>
</div>
<?php elseif($sf_request->getParameter('action') != 'login'):?>
<div id="login">
<form name="tmplogin" action="<?php echo url_for('residents/login')?>" method="post">
  <div id="login-title">Resident Login&nbsp;&nbsp;&nbsp;<a href="<?php echo url_for('residents/forgotpassword')?>">Forgot Password?</a></div>
  <div id="login-fields"><input name="login[email]" onclick="this.value='';" type="text" value="Email/Username" size="14" />&nbsp;&nbsp;&nbsp;<input name="login[password]" onclick="this.value=''; this.type='password';" type="text" value="Password" size="14" /></div>
  <div id="login-login"><a href="#" onclick="document.tmplogin.submit();">Login</a></div>
  </form>
</div>
<?php endif;?>
<div style="float:right;padding:10px 0 0 0;"><a href="http://translate.google.com/translate?hl=en&sl=en&tl=es&u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>"><img src="/images/espanol.png"></a></div>
</div>