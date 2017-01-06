<?php

require ('./class/Autoload.php');
spl_autoload_register('Autoload::classAutoloader');
session_start();

// try {
//    throw new Exception("Fausse alerte !");
// } catch(Exception $e){
//     //C'est ainsi qu'on appelle une classe en peuheushp
//     Log::writeCSV($e);
// }

include('./contents/inscription.inc.php');
include('./contents/connexion.inc.php');
include('./contents/deconnexion.inc.php');

// test session fonctionne
if (isset($_SESSION['user'])) {
    echo 'Bonjour ' . $_SESSION['user']['pseudo'];
}

if (isset($_POST['generateArticle'])) {
  Articles::poster();
}

?>

<form action="index.php" method="post">
  <input type="submit" name="generateArticle" value="Poster article">
</form>

<?php Articles::afficher(); ?>


<?php
if (isset($_POST['modifArticle'])){
  Articles::modifier();
}
?>
