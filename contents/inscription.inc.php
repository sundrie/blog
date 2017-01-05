<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 05/01/2017
 * Time: 09:54
 */

if (isset($_POST['send'])) {
  Users::inscription();
} else {
  $e='Unable to complete the inscription :(';
  Log::writeCSV($e);
}

?>

<form method="post" action="index.php">
    <label for="pseudo">pseudo</label><input type="text" name="pseudo"><br>
    <label for="email">email</label><input type="email" name="email"><br>
    <label for="password">password</label><input type="password" name="password"><br>
    <label for="lastname">lastname</label><input type="text" name="lastname"><br>
    <label for="firstname">firstname</label><input type="text" name="firstname"><br>
    <input name="send" type="submit">
</form>
