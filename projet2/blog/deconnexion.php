<?php
session_start(); // Démarrer la session pour accéder aux variables de session

// Vider toutes les variables de session
$_SESSION = array();

// Détruire la session
session_destroy();

// Rediriger vers la page de connexion ou la page d'accueil
header("Location: connexion.php"); // ou "index.php" selon votre préférence
exit;
?>
