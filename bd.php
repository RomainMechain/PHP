<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $score = $_POST["score"];
}

try {
    // le fichier de BD s'appellera contacts.sqlite3
    $file_db = new PDO('sqlite:bd.sqlite3');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $file_db->exec("CREATE TABLE IF NOT EXISTS RESULTAT (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT NOT NULL,
        score INTEGER)");

    

    // Utilisez REPLACE INTO au lieu de INSERT INTO pour éviter l'erreur de contrainte UNIQUE
    $insert = "INSERT INTO RESULTAT (username, score) VALUES (:username, :score)";
    $stmt = $file_db->prepare($insert);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':score', $score);
    $stmt->execute();

    echo "Votre Score a bien été enregistré";
    echo "<br>";

    // Récupère les résultats de la base de données triés par score
    $result = $file_db->query('SELECT * FROM RESULTAT ORDER BY score DESC');
    
    // Affiche les résultats dans un tableau HTML
    echo "<h1> Classement </h1>";
    echo "<br>";

    echo "<table border='1'>
            <tr>
                <th>Username</th>
                <th>Score</th>
            </tr>";

    foreach ($result as $m) {
        echo "<tr>
                <td>" . $m['username'] . "</td>
                <td>" . $m['score'] . "</td>
              </tr>";
    }

    echo "</table>";

    // on ferme la connexion
    $file_db = null;
} catch (PDOException $ex) {
    echo "Erreur : " . $ex->getMessage();
}
?>