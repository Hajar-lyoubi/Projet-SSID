<?php
// Informations de connexion à la base de données
$host = "localhost";
$username = "root";
$password = "";
$dbname = "bdd_pompier";

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Créer une connexion à la base de données
    $conn = new mysqli($host, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Récupérer les données du formulaire
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];

    // Éviter les attaques par injection SQL 
    $login = mysqli_real_escape_string($conn, $login);
    $mdp = mysqli_real_escape_string($conn, $mdp);

    // Requête pour vérifier l'authentification et récupérer le rôle
    $sql = "SELECT * FROM utilisateur WHERE login = '$login' AND mdp = '$mdp'";
    $result = $conn->query($sql);

    // Vérifier si des résultats ont été trouvés
    if ($result->num_rows > 0) {
        // Récupérer les données de l'utilisateur
        $userData = $result->fetch_assoc();

        // Récupérer le rôle de l'utilisateur
        $role = $userData['id_role_utilisateur'];

        // Vérifier si l'utilisateur est déjà connecté
        if (!isset($_SESSION)) {
            session_start();
        }

        // Enregistrez les informations de l'utilisateur dans la session
        $_SESSION['user_id'] = $userData['id_utilisateur'];
        $_SESSION['user_role'] = $role;

        // Redirection en fonction du rôle
        switch ($role) {
            case 1:
                header("Location: accueil.html");
                exit();
            case 2:
                header("Location: page_role_2.php");
                exit();
            case 3:
                header("Location: page_role_3.php");
                exit();
            default:
                $error_message = "Rôle non reconnu";
                break;
        }
    } else {
        // Authentification échouée
        $error_message = "Login ou Mdp incorrecte, Réessayer !!! ";
    }

    // Fermer la connexion à la base de données
    $conn->close();
}
?>
