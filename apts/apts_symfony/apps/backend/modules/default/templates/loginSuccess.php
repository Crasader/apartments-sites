<h2>Login</h2>

<?php if (isset($error)): ?>
  <p class='error_list'><?php echo $error ?></p>
<?php endif ?>

<form method='post' action='<?php echo url_for('default/login') ?>'>
  <table border='1' class='widget_form'>
    <?php echo $form ?>
    <tr>
      <td colspan='2'><input type='submit' value='Login' /></td>
    </tr>
  </table>
</form>