<?php

    echo "<h1> Questionnaire </h1>";
    echo "<form action='./Actions/submit.php' method='post'>";
    $factory = new Factory('./Data/quizz.json');
    $lst_res = $factory->create();
    foreach ($lst_res as $instance) {
        echo $instance.PHP_EOL;
    }
    echo "<input type='submit' value='Envoyer'>";
    echo "</form>";
?>
