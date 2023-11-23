<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSID - Inscription</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px;
            max-width: 100%;
            text-align: center;
        }

        .header {
            background-color: #d9534f;
            color: #fff;
            padding: 15px;
            font-size: 24px;
            font-weight: bold;
        }

        .form-group {
            padding: 20px;
            box-sizing: border-box;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            outline: none;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #001f3f;
        }

        .form-group button {
            background-color: #d9534f;
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            outline: none;
            transition: background-color 0.3s;
        }

        .form-group button:hover {
            background-color: #c9302c;
        }

        .form-group a {
            color: #337ab7;
            text-decoration: none;
            font-size: 14px;
        }

        .form-group a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            SSID - Inscription
        </div>
        <div class="form-group">
            <?php
            $error_message = ''; // Initialisez la variable du message d'erreur

            // Vérifie si le formulaire a été soumis
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                include 'inscription_process.php';
            }
            ?>
            <!-- Inscription Form -->
            <form method="post" action="inscription.php">
                <input type="text" name="login" placeholder="Nom d'utilisateur" required>
                <input type="password" name="mdp" placeholder="Mot de passe" required>
                <select name="role" required>
                    <option value="" disabled selected>Choisir un rôle</option>
                    <option value="1">Admin</option>
                    <option value="2">Pompier</option>
                    <option value="3">Pompier d'urgence</option>
                </select>
                <button type="submit">S'inscrire</button>
            </form>
            <p>Vous avez déjà un compte? <a href="login.php">Se connecter ici</a></p>
            
            <!-- Afficher le message d'erreur -->
         <!-- Afficher le message d'erreur -->
<?php if (!empty($error_message)) : ?>
    <p class="error-message"><?= $error_message ?></p>
<?php endif; ?>

<!-- Afficher le message de succès -->
<?php if (!empty($success_message)) : ?>
    <p style="color: green;"><?= $success_message ?></p>
<?php endif; ?>

        </div>
    </div>

</body>
</html>
