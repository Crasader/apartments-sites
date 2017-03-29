    <td><?php echo $user->getUsername() ?></td>
      <td><?php echo $user->getName() ?></td>
      <td><?php echo $user->getUserRolesList() ?></td>
      <td><?php echo $user->getEmail() ?></td>
      <td><?php echo ($user->getCreatedAt() !== null && $user->getCreatedAt() !== '') ? format_date($user->getCreatedAt(), "f") : '' ?></td>
      <td><?php echo $user->getUserPropertysList() ?></td>
  