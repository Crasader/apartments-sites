<td colspan="6">
    <?php echo $user->getUsername() ?>
     - 
    <?php echo $user->getName() ?>
     - 
    <?php echo $user->getUserRolesList() ?>
     - 
    <?php echo $user->getEmail() ?>
     - 
    <?php echo ($user->getCreatedAt() !== null && $user->getCreatedAt() !== '') ? format_date($user->getCreatedAt(), "f") : '' ?>
     - 
    <?php echo $user->getUserPropertysList() ?>
     - 
</td>