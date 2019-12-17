<?php
 
require_once('Model\ArticleManager.php');
require_once('Model\CommentsManager.php');


 class Controller1{
    
    function listArticles()
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->getArticles();

        require('View/listeArticles.php'); 
    }

    function article()
    {
        $articleManager = new ArticleManager();
        $commentsManager = new CommentsManager();

     $article = $articleManager->getArticle($_GET['id']);
     $comments = $commentsManager->getComments($_GET['id']);
    
        require('View/Articles.php');  
    }

    function addComment($id, $author, $comment)
    {
        $commentManager = new CommentsManager();
    
        $commentaire = $commentManager->postComment($id, $author, $comment);
    
       if ($commentaire === false) {
           throw new Exception('Impossible d\'ajouter le commentaire !');
       }
        else {
        header('Location: index.php?action=post&id=' . $id);
       }
    }
}
