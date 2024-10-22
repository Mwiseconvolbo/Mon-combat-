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

$role = $_POST['role'];
$nom = $_POST['nom'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO utilisateurs (role, nom, email, password) VALUES ('$role', '$nom', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Inscription réussie";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
