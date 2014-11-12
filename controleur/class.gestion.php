
<?php
require_once 'class.securite.php';
/**
 * Classe de connexion, deconnexion et gestion des messages
 * @author sebastien
 * 
 */

class Gestion {

    private $server = 'localhost';
    private $dbname = 'mininews';
    private $user = 'root';
    private $pass = '';
    private $db = null;
    
    /**
     * Constructeur qui connect la base de données
     */
    function __construct() {
        $this->db = new PDO('mysql:host=' . $this->server . ';' . 'dbname=' . $this->dbname, $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Vide les parametres de session
     * 
     * @return function session_destroy
     */
    function deconnect() {
        return session_destroy();
    }
    
    /**
     * Affiche les messages du plus récent au plus ancien
     * 
     * 
     */
    function affiche() {
        $rep = $this->db->query('SELECT * FROM messages ORDER BY ID DESC LIMIT 0,10');
        while ($req = $rep->fetch()) {
            echo '<div class="messages">' . Securite::html(($req['message'])) . '</div>';
            echo '<div class="pseudo">' . 'Posté par ' . Securite::html(($req['pseudo'])) . ' le ' . '</div>';
            $dateBdd = Securite::html(($req['date_message']));
            echo '<div class="datesMessages">' . date("d-m-Y ", strtotime($dateBdd)) .'</div>'.'<div class="pseudo"> &nbsp&nbspa </div>'.'<div class="datesMessages">'.date("H:i:s", strtotime($dateBdd)).'</div>';
        }
    }

    /**
     * Insert les nouveaux messages
     * 
     * @param string $mess
     * @param date $dateMessage
     * @param string $pseudo
     */
    Function insert($mess, $dateMessage, $pseudo) {
        $this->db->exec("INSERT INTO messages VALUES('','$mess', '$dateMessage', '$pseudo')");
        echo '<div id="messagePoste">Message posté !</div>';
    }

}
