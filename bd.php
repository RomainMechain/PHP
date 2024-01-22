<?php
// On recupère les informations des inputs de submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $score = $_POST["score"];
}

try {
    //création de la base de données si elle n'existe pas 
    $file_db = new PDO('sqlite:bd.sqlite3');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $file_db->exec("CREATE TABLE IF NOT EXISTS RESULTAT (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT NOT NULL,
        score INTEGER)");

    //Insertion du résultat du quiz dans la BD 
    $insert = "INSERT INTO RESULTAT (username, score) VALUES (:username, :score)";
    $stmt = $file_db->prepare($insert);

    // Attribution des variables 
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':score', $score);
    $stmt->execute();

    echo "<h1>Tableau des scores :</h1>";

    // Récupération des résultats
    $result = $file_db->query('SELECT * FROM RESULTAT ORDER BY score DESC');
    
    // Affiche les résultats dans un tableau HTML
    echo "<table border='1'>
            <tr>
                <th>Nom d'utilisateur</th>
                <th>Score</th>
            </tr>";
    foreach ($result as $ligne) {
        echo "<tr>
                <td>" . $ligne['username'] . "</td>
                <td>" . $ligne['score'] . "</td>
              </tr>";
    }
    echo "</table>";

    // fermeture de la connexion
    $file_db = null;

} catch (PDOException $ex) {
    echo "Erreur : " . $ex->getMessage();
}
?>