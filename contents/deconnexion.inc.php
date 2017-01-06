<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 05/01/2017
 * Time: 16:30
 */

if (isset($_POST['deco'])) {
    Users::deconnexion();
} else {
    $e='Unable to complete the inscription :(';
    Log::writeCSV($e);
}

?>
<?php if (isset($_SESSION['user'])) { ?>
<form method="post" action="index.php">
    <input type="submit" name="deco" value="Déconnexion">
</form>
<?php } ?>
