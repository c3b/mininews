<?php
/**
 * page pour la deconnexion
 */
session_start();
require_once 'class.gestion.php';
$deconnect = new Gestion();
$deconnect->deconnect();

//renvoi directement sur la page d'accueil
header('Location: http://localhost/mininews/index.php');
