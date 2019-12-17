<?php
require_once("Model/Manager.php");

class CommentsManager extends Manager
{
    public function getComments($articleId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, author, comment, DATE_FORMAT(dateComment, \'%d/%m/%Y à %Hh%imin%ss\') AS dateComment_fr FROM comments WHERE articleId = ? ORDER BY dateComment DESC');
        $req->execute(array($articleId));
        
        return $req->fetchAll();
    }

    public function postComment($articleId, $author, $comment)
    {
        $bdd = $this->dbConnect();
        $comments = $bdd->prepare('INSERT INTO comments( author, articleId,  comment, dateComment) VALUES(?,? ,?, NOW())');
        try{
            $commentaire = $comments->execute(array( $author, $articleId, $comment));

        }
        catch(\Exception $e) {
            var_dump($e->getMessage());
        }     

        return $commentaire;
    }
}
