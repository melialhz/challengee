<?php 
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);


if (!isset($_SESSION['username']) || ($_SESSION['username'] != 'admin' && $_SESSION['username'] != 'melia')) {
    header("Location: connexion.php");
    exit;
}

include 'Database.php';
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre = $_POST['titre'] ?? '';
    $contenu = $_POST['contenu'] ?? '';

    if ($titre && $contenu) {
        $db->addArticle($titre, $_SESSION['username'], $contenu);
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un Article</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1 id="branding">Mon Blog</h1>
            <nav>
                <ul>
                    <?php if (!isset($_SESSION['username'])): ?>
                        <li><a href="connexion.php">Connexion</a></li>
                    <?php else: ?>
                        <li><a href="deconnexion.php">Déconnexion</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <h2>Ajouter un Article</h2>
        <form action="ajouter.php" method="post">
            <label for="titre">Titre :</label><br>
            <input type="text" id="titre" name="titre" required><br>
            <label for="contenu">Contenu :</label><br>
            <textarea id="contenu" name="contenu" required></textarea><br>
            <input type="submit" value="Ajouter">
        </form>
    </div>
</body>
</html>
