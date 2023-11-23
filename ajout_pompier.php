<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Pompier</title>
    <link rel="stylesheet" href="styles_ajout_pompier.css">

</head>
<body>

    <header class="menu">
        <div class="logo">
            SSID
        </div>
        <nav>
            <ul>
                <li><a href="accueil">Accueil</a></li>
                <li><a href="gestion_pompiers.php">Pompiers</a></li>
                <li><a href="#">Casernes</a></li>
                <li><a href="#">Interventions</a></li>
                <li><a href="#">Équipement</a></li>
                <li><a href="#">Véhicules</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h2>Ajouter Pompier</h2>
        <form method="post" action="traitement_ajout_pompier.php">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="date_naissance">Date de Naissance:</label>
                <input type="date" name="date_naissance" required>
            </div>
            <div class="form-group">
                <label for="id_caserne">Caserne:</label>
                <select name="id_caserne" required>
                    <?php
                    // Inclure le fichier de connexion à la base de données
                    include 'connexion.php';

                    // Récupérer les casernes depuis la base de données
                    $sqlCaserne = "SELECT * FROM caserne";
                    $resultCaserne = $conn->query($sqlCaserne);

                    // Afficher les options
                    while ($rowCaserne = $resultCaserne->fetch_assoc()) {
                        echo "<option value='" . $rowCaserne['id_caserne'] . "'>" . $rowCaserne['ville'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_connexion">ID Connexion:</label>
                <select name="id_connexion" required>
                    <?php
                    // Récupérer les utilisateurs depuis la base de données
                    $sqlUtilisateur = "SELECT * FROM utilisateur";
                    $resultUtilisateur = $conn->query($sqlUtilisateur);

                    // Afficher les options
                    while ($rowUtilisateur = $resultUtilisateur->fetch_assoc()) {
                        echo "<option value='" . $rowUtilisateur['id_connexion'] . "'>" . $rowUtilisateur['login'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Ajouter</button>
            </div>
        </form>
    </div>

</body>
</html>
