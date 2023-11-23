<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Pompiers</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<body>

    <header class="menu">
        <div class="logo">
            SSID
        </div>
        <nav>
            <ul>
            <li><a href="accueil.html">Accueil</a></li>
                <li><a href="gestion_pompiers.php">Pompiers</a></li>
                <li><a href="#">Casernes</a></li>
                <li><a href="#">Interventions</a></li>
                <li><a href="#">Équipement</a></li>
                <li><a href="#">Véhicules</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h2>Liste des Pompiers</h2>
        <button onclick="addPompier()">+</button>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de Naissance</th>
                    <th>Caserne</th>
                    <th>Actions</th>
                
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connexion.php';

                $sql = "SELECT * FROM pompier";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id_pompier'] . "</td>";
                        echo "<td>" . $row['nom_pompier'] . "</td>";
                        echo "<td>" . $row['prenom_pompier'] . "</td>";
                        echo "<td>" . $row['date_de_naissance'] . "</td>";
                        echo "<td>" . $row['id_caserne'] . "</td>";
                        echo "<td><button onclick='editPompier(" . $row['id_pompier'] . ")'>Modifier</button> ";
                        echo "<button onclick='deletePompier(" . $row['id_pompier'] . ")'>Supprimer</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Aucun pompier trouvé</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function editPompier(id) {
            // Logique pour la modification du pompier avec l'ID spécifié
            console.log("Modifier le pompier avec l'ID: " + id);
        }

        function deletePompier(id) {
            // Logique pour la suppression du pompier avec l'ID spécifié
            console.log("Supprimer le pompier avec l'ID: " + id);
        }

        function addPompier() {
            // Rediriger vers la page d'ajout de pompier
            window.location.href = "ajout_pompier.php";
        }
    </script>

</body>
</html>
