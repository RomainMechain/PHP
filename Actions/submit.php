<?php
session_start(); // Démarre une nouvelle session ou reprend une session existante
require_once '../Classes/Autoloader.php';
Autoloader::register();

use Form\Type\Radio;
use Form\Type\Input;
use Form\GenericFormElement;
use Form\InputRenderInterface;

// Récupère $lst_instance de la session
$lst_instance = unserialize($_SESSION['lst_instance']);

echo "<h1> Resultat </h1>";
foreach ($_POST as $key => $value) {
    echo "Le champ $key a la valeur $value.<br>";
    $instanceRep = null;
    foreach ($lst_instance as $instance) {
        if ($instance->getName() == $key) {
            $instanceRep = $instance;
        }
    }
    if ($instanceRep != null) {
        if ($instanceRep->getAnswer() == $value) {
            echo "Bonne réponse !<br>";
        } else {
            echo "Mauvaise réponse !<br>";
        }
    }
}

?>