<?php
require_once("Model/Manager.php");

class ArticleManager extends Manager
{
    public function getArticles()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->query('SELECT id, title, content, DATE_FORMAT(dateArticle, \'%d/%m/%Y à %Hh%imin%ss\') AS dateArticle_fr FROM article ORDER BY dateArticle DESC LIMIT 0, 5');
        $req->execute();
        
        return $req->fetchAll();
        
        
    }

    public function getArticle($postId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, title, content, DATE_FORMAT(dateArticle, \'%d/%m/%Y à %Hh%imin%ss\') AS dateArticle_fr FROM article WHERE id = ?');
        $req->execute(array($postId));
        $article = $req->fetch();

        return $article;
    }
}
