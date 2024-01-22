<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" href="/Actions/CSS/submit.css" /> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultat</title>
</head>
<body>
    <h1>Resultat</h1>

<?php
session_start(); // Démarre une nouvelle session ou reprend une session existante
require_once '../Classes/Autoloader.php';
Autoloader::register();

use Form\Type\Radio;
use Form\Type\Input;
use Form\GenericFormElement;
use Form\InputRenderInterface;


$dico_answer = $_SESSION['dico_answer'];
$score = 0;
echo"<h2> Vous avez repondu </h2>";
foreach ($_POST as $key => $value) {

    echo "Pour la question $key a la valeur $value   ";
    if ($dico_answer[$key]["answer"] == $value) {
        $score += $dico_answer[$key]["score"];
        echo "<span class='vrai'>Bonne réponse !</span><br>";
    } else {
        echo "<span class='faux'>Mauvaise réponse !</span><br>";
    }
}
echo "Votre score est de $score points.<br>";

echo "<form action='../bd.php' method='post'>";
echo "<input type='hidden' name='score' value='$score'>";
echo "<input type='text' required name='username' placeholder='Entrez votre nom'>";
echo "<input type='submit' value='Envoyer'>";
echo "</form>";

?>
</body>
</html>