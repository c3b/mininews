<?php
/**
 * Programme basique de new / actualités
 * @author Sebastien Caumes
 * 
 */
session_start();
include 'controleur/class.gestion.php';
?>

<!DOCTYPE HTML>
<html lang="fr-FR">
    <head>
        <meta charset="UTF-8">
        <title>mininews</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>


        <div class="containerMessage">    
            <a class="pseudo" href="http://localhost/mininews/vue/login.php" class="action">Admin</a>



            <?php
            $actualite = new Gestion();
            ?>

            <h2 class='chatTitle'>Actualités</h2>
            <?php
            $actualite->affiche();
            ?> 
        </div>


    </body>
</html>