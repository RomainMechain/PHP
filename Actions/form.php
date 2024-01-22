<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- relier aux fichier CSS -->
    <link rel="stylesheet" href="/Actions/CSS/form.css" /> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionnaire</title>
</head>
<body>
    <h1>Questionnaire</h1>
<?php
session_start(); // Démarre une nouvelle session ou reprend une session existante
echo "<form action='./Actions/submit.php' method='post'>";
$factory = new Factory('./Data/quizz.json');
$lst_res = $factory->create();

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


echo "<input class='envoyer' type='submit' value='Envoyer'>";
echo "</form>";
?>
</body>
</html>