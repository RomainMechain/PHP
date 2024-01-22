<?php
session_start(); // Démarre une nouvelle session ou reprend une session existante

echo "<h1> Questionnaire </h1>";
echo "<form action='./Actions/submit.php' method='post'>";
$factory = new Factory('./Data/quizz.json');
$lst_res = $factory->create();
echo "<input type='submit' value='Envoyer'>";
echo "</form>";

$dico = array();
foreach ($lst_res as $instance) {
    $dico2 = array();
    $dico2["answer"] = $instance->getAnswer();
    $dico2["score"] = $instance->getScore();
    $dico[$instance->getName()] = $dico2;
}
$_SESSION['dico_answer'] = $dico;

foreach ($lst_res as $instance) {
    echo $instance.PHP_EOL;
}
?>
