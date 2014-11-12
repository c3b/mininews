<?php
/**
 * Page d'identification
 */
session_start();
?>

<!DOCTYPE HTML>
<html lang="fr-FR">
    <head>
        <meta charset="UTF-8">
        <title>Identification</title>
        <link rel="stylesheet" href="../css/style.css" />
    </head>
    <body>
        <div class="containerMessage">
            <?php if (empty($_SESSION)): ?>
                <!-- Formulaire de login pour acceder a la page d'administraion : admin.php -->
                <form action="admin.php" method="POST">
                    <input type="text" name="pseudo" value="" placeholder="Votre pseudo"/>
                    <input type="password" name="passwd" value="" placeholder="mot de passe" />
                    <input type="submit" value="Validation" />
                </form>
            <?php else: ?>
                <?php header('Location:admin.php') ?>
            <?php endif; ?>
        </div>
    </body>
</html>


