<?php
/**
 * Back office pour l'envoi de messages
 */
session_start();
require_once '../controleur/class.gestion.php';
require_once '../controleur/class.securite.php';
?>

<!DOCTYPE HTML>
<html lang="fr-FR">
    <head>
        <meta charset="UTF-8">
        <title>admin</title>
        <link rel="stylesheet" href="../css/style.css" />
    </head>

    <body>
        <div class="containerMessage">

            <?php
            //validation de l'identification pour affichage de la page
            if (empty($_SESSION)) {
                $_SESSION['pseudo'] = Securite::bdd($_POST['pseudo']);
                $_SESSION['passwd'] = Securite::bdd($_POST['passwd']);
            }
            if (($_SESSION['pseudo'] == 'seb') && ($_SESSION['passwd'] == 'nuage')):?>

                <h1 class="chatTitle">Administration</h1>

                <div class="bonjour">
                    <?php
                    //affiche le pseudo si l'utlisateur est dentifié
                    if (!empty($_SESSION)) {
                        echo 'Bonjour ' . Securite::html($_SESSION['pseudo']);
                    }
                    ?>
                </div>    

                <div> 
                    <!-- Bascule entre un lien de connecxion ou de deconnexion -->
                    <?php if (!empty($_SESSION)): ?>
                        <a class="action" href="../controleur/deco.php"> Se deconnecter</a>
                    <?php else: ?>
                        <a  class="action" href="vue/login.php"> Se connecter </a>
                    <?php endif; ?>
                </div> 

                <!-- formulaire de saisie et envoi de news -->
                <form action = "admin.php" method = "POST">
                    <textarea style="resize: none" name="new" rows="10" cols="54"  placeholder="Votre message" /></textarea>
                    <br />
                    <input type="submit" value="Envoyer"/>
                    <br />
                    <br />
                </form >

                <?php
                //Insertion de message seulement si on a bien envoyé un message a la page
                $actualite = new Gestion();
                if (!empty($_POST['new'])) {
                    $actualite->insert(Securite::bdd($_POST['new']), date('Y-m-d H:i:s'), $_SESSION['pseudo']);
                }
                ?>

                <a id='retourMessage' href="http://localhost/mininews/index.php">Retour aux messages</a>

            <!-- Si pas de login/passs entré ou mmauvais login/pass -->    
            <?php else: ?>
                <h1 class="chatTitle">Mauvais login ou mot de passe </h1>
                <a href="http://localhost/mininews/vue/login.php"> Retour </a>
            </div>
            <?php
            //On vide la session pour pouvoir se re-identifier
            session_destroy();
            ?>
        
            <?php endif; ?>
    </body>
</html>