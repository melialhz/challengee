<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();
include 'Database.php';

if (!isset($_SESSION['username']) || $_SESSION['username'] != 'admin' && $_SESSION['username'] != 'melia' ) {
    exit('Accès refusé');
}

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id = $_POST['id'];

    if ($_POST['action'] == 'Modifier' && isset($_POST['contenu'])) {
        $db->updateArticle($id, $_POST['titre'], $_POST['contenu']);
        header("Location: article.php?id=$id");
    } elseif ($_POST['action'] == 'Supprimer') {
        $db->deleteArticle($id);
        header("Location: index.php");
    }
}

?>
