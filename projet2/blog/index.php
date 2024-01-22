<?php 

session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Mon Blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1 id="branding">Mon Blog</h1>
            <nav>
                <ul>
                    <li><a href="ajouter.php">Ajouter un article</a></li>
                    <?php if (!isset($_SESSION['username'])): ?>
                        <li><a href=connexion.php>Connexion</a></li>
                    <?php else: ?>
                        <li><a href="deconnexion.php">Déconnexion</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <?php
        include 'Database.php';

        $db = new Database();

        $articles = $db->getAllArticles();
        foreach ($articles as $article) {
            echo "<article>";
            echo "<h2><a href='article.php?id=" . $article['id'] . "'>" . htmlspecialchars($article['titre']) . "</a></h2>";
            echo "<p>Écrit par " . htmlspecialchars($article['auteur']) . " le " . $article['date'] . "</p>";
            echo "<p>" . htmlspecialchars($article['contenu']) . "</p>";
            echo "</article>";
            echo "<hr>";
        }
        ?>
    </div>
</body>
</html>
