<?php
require_once '../Classes/Factory.php';
require_once '../Classes/Autoloader.php';
require_once '../Classes/Provider.php';
Autoloader::register();

$factory = new Factory('../Data/quizz.json');
$lst_res = $factory->create();

foreach ($lst_res as $instance) {
    
}

echo "<h1> Resultat </h1>";
foreach ($_POST as $key => $value) {
    $instancecor=null;
    foreach ($lst_res as $instance) {
        if ($instance->getName() == $key) {
            $instancecor = $instance;
        }
    }
    if ($instancecor->getAnswer() == $value) {
        echo "Bonne réponse pour la question ".$instancecor->getQuestion()."<br>";
    } else {
        echo "Mauvaise réponse pour la question ".$instancecor->getQuestion()."<br>";
    }
}

?>