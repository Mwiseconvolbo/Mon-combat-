<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "plateforme_educative";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

$description = $_POST['description'];
$fichier = $_FILES['fichier']['name'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($fichier);

if (move_uploaded_file($_FILES['fichier']['tmp_name'], $target_file)) {
    $sql = "INSERT INTO fichiers_supplementaires (description, fichier) VALUES ('$description', '$fichier')";
    if ($conn->query($sql) === TRUE) {
        echo "Le fichier a été déposé avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
}

$conn->close();
?>
