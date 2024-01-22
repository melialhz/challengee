<?php 

session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Mon Blog - Article</title>
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
        <?php
        session_start();
        include 'Database.php';

        $db = new Database();

        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];
            $article = $db->getArticleById($id);

            if ($article) {
                echo "<article>";
                echo "<h2>" . htmlspecialchars($article['titre']) . "</h2>";
                echo "<p>Écrit par " . htmlspecialchars($article['auteur']) . " le " . $article['date'] . "</p>";
                echo "<p>" . htmlspecialchars($article['contenu']) . "</p>";
                echo "</article>";

                // Vérifiez si l'utilisateur connecté est l'admin ou l'auteur de l'article
                if (isset($_SESSION['username']) && ($_SESSION['username'] == 'admin' || $_SESSION['username'] == $article['auteur'])) {
                    echo "<form action='edit_article.php' method='post'>";
                    echo "<input type='hidden' name='id' value='$id'>";
                    echo "<textarea name='titre'>" . htmlspecialchars($article['titre']) . "</textarea><br>";
                    echo "<textarea name='contenu'>" . htmlspecialchars($article['contenu']) . "</textarea><br>";
                    echo "<input type='submit' name='action' value='Modifier'>";
                    echo "<input type='submit' name='action' value='Supprimer'>";
                    echo "</form>";
                }
            } else {
                echo "<p>Article non trouvé.</p>";
            }
        } else {
            echo "<p>ID d'article non spécifié ou invalide.</p>";
        }
        ?>
    </div>
</body>
</html>
