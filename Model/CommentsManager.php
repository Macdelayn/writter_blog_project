<?php
require_once("Model/Manager.php");

class CommentsManager extends Manager
{
    public function getComments($articleId)
    {
        $bdd = $this->dbConnect();
        $comments = $bdd->prepare('SELECT id, comment, DATE_FORMAT(dateComment, \'%d/%m/%Y à %Hh%imin%ss\') AS dateComment_fr FROM comments WHERE post_id = ? ORDER BY dateComment DESC');
        $comments->execute(array($articleId));

        return $comments;
    }

    public function postComment($articleId, $userId, $comment)
    {
        $bdd = $this->dbConnect();
        $comments = $bdd->prepare('INSERT INTO comments(id, userId, comment, dateComment) VALUES(?, ?,?, NOW())');
        $commentaire = $comments->execute(array($articleId, $userId, $comment));

        return $commentaire;
    }
}