<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>


<?php
foreach ($articles as $data)
{
?>
    <div>
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['dateArticle_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
//$articles->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

