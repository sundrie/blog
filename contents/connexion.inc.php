<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 05/01/2017
 * Time: 16:14
 */

if (isset($_POST['connect'])) {
    Users::connexion();
} else {
    $e='Unable to complete the inscription :(';
    Log::writeCSV($e);
}

?>

<h2>Connexion</h2>

<form method="post" action="index.php">
    <label for="pseudo">pseudo</label><input type="text" name="pseudo"><br>
    <label for="password">password</label><input type="password" name="password"><br>
    <input name="connect" type="submit">
</form>