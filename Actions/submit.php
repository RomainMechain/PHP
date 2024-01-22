<?php
session_start(); // Démarre une nouvelle session ou reprend une session existante
require_once '../Classes/Autoloader.php';
Autoloader::register();

use Form\Type\Radio;
use Form\Type\Input;
use Form\GenericFormElement;
use Form\InputRenderInterface;


$dico_answer = $_SESSION['dico_answer'];

echo "<h1> Resultat </h1>";
$score = 0;
foreach ($_POST as $key => $value) {
    echo "Le champ $key a la valeur $value.<br>";
    if ($dico_answer[$key]["answer"] == $value) {
        $score += $dico_answer[$key]["score"];
        echo "Bonne réponse !<br>";
    } else {
        echo "Mauvaise réponse !<br>";
    }
}
echo "Votre score est de $score points.<br>";

echo "<form action='bd.php' method='post'>";
echo "<input type='hidden' name='score' value='$score'>";
echo "<input type='text' required name='username' placeholder='Entrez votre nom'>";
echo "<input type='submit' value='Envoyer'>";
echo "</form>";



?>