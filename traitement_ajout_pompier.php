<?php
include 'connexion.php';

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$date_naissance = $_POST['date_naissance'];
$id_caserne = $_POST['id_caserne'];


// Vérifier si l'id_connexion existe déjà dans la table
$checkQuery = "SELECT COUNT(*) as count FROM pompier WHERE id_connexion = '$id_connexion'";
$checkResult = $conn->query($checkQuery);
$checkRow = $checkResult->fetch_assoc();

if ($checkRow['count'] > 0) {
    echo "Erreur : Un pompier avec cet ID Connexion existe déjà.";
} else {
    // Insérer le nouveau pompier
    $insertQuery = "INSERT INTO pompier (nom_pompier, prenom_pompier, date_de_naissance, id_caserne, id_connexion) VALUES ('$nom', '$prenom', '$date_naissance', '$id_caserne', '$id_connexion')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "Le pompier a été ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du pompier : " . $conn->error;
    }
}

$conn->close();
?>
