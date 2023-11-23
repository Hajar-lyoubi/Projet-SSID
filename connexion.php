<?php
// Informations de connexion à la base de données
$host = "localhost";
$username = "root";
$password = "";
$dbname = "bdd_pompier";

// Créer une connexion à la base de données
$conn = new mysqli($host, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}
?>
