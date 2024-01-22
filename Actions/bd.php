<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" href="/Actions/CSS/bd.css" /> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau des scores :</title>
</head>
<body>
    <h1>Tableau des scores :</h1>

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
    $file_db->exec("CREATE TABLE IF NOT EXISTS PARTICIPANT (
        idParticipant INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT NOT NULL
    )");
    
    $file_db->exec("CREATE TABLE IF NOT EXISTS RESULTAT (
        idResultat INTEGER PRIMARY KEY AUTOINCREMENT,
        idParticipant INTEGER,
        score INTEGER,
        FOREIGN KEY(idParticipant) REFERENCES PARTICIPANT(idParticipant)
    )");

    // Préparation de la requête pour vérifier si le participant existe déjà
    $check = "SELECT idParticipant FROM PARTICIPANT WHERE username = :username";
    $stmt = $file_db->prepare($check);
    if ($stmt === false) {
        var_dump($file_db->errorInfo());
        exit;
    }
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    // Récupération de l'id du participant s'il existe
    $participant_id = $stmt->fetchColumn();

    // Si le participant n'existe pas, insertion dans la table PARTICIPANT
    if (!$participant_id) {
        $insert = "INSERT INTO PARTICIPANT (username) VALUES (:username)";
        $stmt = $file_db->prepare($insert);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Récupération de l'id du participant qui vient d'être inséré
        $participant_id = $file_db->lastInsertId();
    }

    // Insertion du résultat dans la table RESULTAT
    $insert = "INSERT INTO RESULTAT (idParticipant, score) VALUES (:participant_id, :score)";
    $stmt = $file_db->prepare($insert);
    $stmt->bindParam(':participant_id', $participant_id);
    $stmt->bindParam(':score', $score);
    $stmt->execute();


    // Récupération des résultats
    $result = $file_db->query('SELECT * FROM RESULTAT ORDER BY score DESC');
    
    // Affiche les résultats dans un tableau HTML
    echo "<div class='container'>";
    echo "<table border='1'>
            <tr>
                <th>Nom d'utilisateur</th>
                <th>Score</th>
            </tr>";
    foreach ($result as $ligne) {
        $stmt = $file_db->prepare("SELECT * FROM PARTICIPANT WHERE idParticipant = :idParticipant");
        $stmt->bindParam(':idParticipant', $ligne['idParticipant']);
        $stmt->execute();
        $participant = $stmt->fetch();
        echo "<tr>
                <td>" . $participant['username'] . "</td>
                <td>" . $ligne['score'] . "</td>
              </tr>";
    }
    echo "</table>";
    echo "</div>";

    // fermeture de la connexion
    $file_db = null;

} catch (PDOException $ex) {
    echo "Erreur : " . $ex->getMessage();
}
?>
</body>
</html>