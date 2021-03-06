<?php $title = htmlspecialchars($article['title']); ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div >
    <h3>
        <?= htmlspecialchars($article['title']) ?>
        <em>le <?= $article['dateArticle_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($article['content'])) ?>
    </p>
</div>

<h2>Commentaires</h2>

<form action="index.php?action=addComment&id=<?= $article['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php
foreach ($comments as $comment)
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['dateComment_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
