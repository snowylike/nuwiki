<form action="index.php?controller=User&action=mod" method="post">
    <input type="hidden" name="id" value="<?php echo $user->getId(); ?>">
    <input type="text" name="name" value="<?php echo $user->getName(); ?>">
    <input type="text" name="surname" value="<?php echo $user->getSurname(); ?>">
    <input type="text" name="nick" value="<?php echo $user->getNick(); ?>">
    <input type="submit" name="modUser" value="ändern">
</form>
