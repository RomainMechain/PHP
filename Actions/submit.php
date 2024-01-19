<?php
echo "<h1> Resultat </h1>";
foreach ($_POST as $key => $value) {
    echo "Le champ $key a la valeur $value.<br>";
}

?>