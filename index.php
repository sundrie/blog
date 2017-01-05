<?php

require ('./class/Autoload.php');
spl_autoload_register('Autoload::classAutoloader');

// try {
//    throw new Exception("Fausse alerte !");
// } catch(Exception $e){
//     //C'est ainsi qu'on appelle une classe en peuheushp
//     Log::writeCSV($e);
// }

include('./contents/inscription.inc.php');

?>
