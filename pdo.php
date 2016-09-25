<?php

require_once 'includes/db.php';

use pdoo\Models\User;
use Carbon\Carbon;

$users = $db->prepare("
    SELECT *
    FROM demouser
");
/**
 * Fetch the return Data back as Class Object!,
 * second Arguement is the Model Class we want to work with
 * Bascially User:class, the return object has already been instantiated!!!
 * That's why we can use this directly
 * $user->getFirstName;
 */
$users->setFetchMode(PDO::FETCH_CLASS, User::class);
$users->execute();
$users = $users->fetchAll();
//
// foreach ($users as $user) {
//   echo $user->username ,' ', $user->created , '<br>';
//   echo $user->username ,' ', $user->created->format('Y M D H:i:s') , '<br>';
//   echo $user->username ,' ', $user->created->diffForHumans() , '<br>';
//
//   echo '<br>';
//   echo '<br>';
//   echo '<br>';
// }
//
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <?php foreach($users as $user): ?>
          <div class="user">
              <?php echo $user->getUserName(); ?>
              <br>
              <?php if($user->last_active): ?>
                  Last Active : <?php echo $user->last_active; ?>
              <?php else: ?>
                  Never Actived
              <?php endif; ?>
          </div>
      <?php endforeach; ?>


  </body>
</html>
