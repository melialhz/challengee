<?php
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);
include 'Database.php';
$db = new Database();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $db->getUserByUsername($username);

    if ($user && $password == $user['password']) { // Ici, utilisez une meilleure vérification de mot de passe dans une application réelle
        $_SESSION['username'] = $user['username'];
        header("Location: index.php"); // Rediriger vers une page après connexion réussie
        exit();
    } else {
        $message = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>
    <form method="post" action="connexion.php">
        Nom d'utilisateur: <input type="text" name="username"><br>
        Mot de passe: <input type="password" name="password"><br>
        <input type="submit" value="Connexion">
    </form>
    <?php echo $message; ?>
</body>
</html>
