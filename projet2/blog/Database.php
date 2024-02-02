<?php

class Database {
    private $host = '127.0.0.1';
    private $db = 'blog';
    private $user = 'root';
    private $pass = 'root';
    private $charset = 'utf8mb4';

    public $pdo = null;

    public function __construct() {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getAllArticles() {
        $stmt = $this->pdo->query("SELECT * FROM articles");
        return $stmt->fetchAll();
    }

    public function getArticleById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM articles WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function getUserByUsername($username) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        return $stmt->fetch();
    }

    public function updateArticle($id, $titre, $contenu) {
        $stmt = $this->pdo->prepare("UPDATE articles SET titre = :titre, contenu = :contenu WHERE id = :id");
        $stmt->execute([
            'titre' => $titre,
            'contenu' => $contenu,
            'id' => $id
        ]);
    }
    
    public function deleteArticle($id) {
        $stmt = $this->pdo->prepare("DELETE FROM articles WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    public function addArticle($titre, $auteur, $contenu) {
        $stmt = $this->pdo->prepare("INSERT INTO articles (titre, auteur, contenu, date) VALUES (:titre, :auteur, :contenu, NOW())");
        $stmt->execute([
            'titre' => $titre,
            'auteur' => $auteur,
            'contenu' => $contenu
        ]);
    }
    
    

}
    

?>
