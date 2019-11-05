<?php
require_once("Model/Manager.php");

class ArticleManager extends Manager
{
    public function getArticles()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->query('SELECT id, title, content, DATE_FORMAT(dateArticle, \'%d/%m/%Y à %Hh%imin%ss\') AS dateArticle_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getArticle($articleId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, title, content, DATE_FORMAT(dateArticle, \'%d/%m/%Y à %Hh%imin%ss\') AS dateArticle_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $article = $req->fetch();

        return $article;
    }
}