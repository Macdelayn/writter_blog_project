<?php
 
require_once('Model/ArticleManager.php');
require_once('Model/CommentsManager.php');

function listArticles()
{
    $articleManager = new ArticleManager();
    $articles = $articleManager->getArticles();

    require('View/listeArticles.php'); 
}

function article()
{
    $articleManager = new ArticleManager();
    $commentManager = new CommentsManager();

    $article = $articleManager->getArticle($_GET['id']);
    $comments = $commentsManager->getComments($_GET['id']);

    require('View/Articles.php'); 
}

function addComment($articleId, $userId, $comment)
{
    $commentManager = new CommentsManager();

    $commentaire = $commentsManager->postComment($articleId, $userId, $comment);

    if ($commentaire === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $articleId);
    }
}