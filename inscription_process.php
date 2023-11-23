<?php
$error_message = ''; // Initialisez la variable du message d'erreur
$success_message = ''; // Initialisez la variable du message de succès

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    // Récupérer les données du formulaire
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    $role = $_POST['role'];

    // Éviter les attaques par injection SQL 
    $login = mysqli_real_escape_string($conn, $login);
    $mdp = mysqli_real_escape_string($conn, $mdp);
    $role = mysqli_real_escape_string($conn, $role);

    // Vérifier si l'utilisateur existe déjà
    $checkUserQuery = "SELECT * FROM utilisateur WHERE login = '$login'";
    $checkUserResult = $conn->query($checkUserQuery);

    if ($checkUserResult->num_rows > 0) {
        // Utilisateur déjà enregistré
        $error_message = "Nom d'utilisateur déjà utilisé. Veuillez choisir un autre nom d'utilisateur.";
    } else {
        // Insérer l'utilisateur dans la base de données
        $insertUserQuery = "INSERT INTO utilisateur (login, mdp, id_role_utilisateur) VALUES ('$login', '$mdp', '$role')";
        if ($conn->query($insertUserQuery) === TRUE) {
            // Rediriger vers la page de connexion après l'inscription réussie
            $success_message = "Inscription réussie. Vous pouvez maintenant vous connecter.";
        } else {
            // Erreur lors de l'insertion de l'utilisateur
            $error_message = "Une erreur est survenue lors de l'inscription. Veuillez réessayer.";
        }
    }

    // Fermer la connexion à la base de données
    $conn->close();
}
?>
