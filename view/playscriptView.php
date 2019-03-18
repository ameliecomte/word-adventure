<?php $title = 'playing...' ; ?>

<?php ob_start(); ?>
<p><a class="button is-dark" href="?logOut=1">Log Out</a></p> <--- log out

<?php /*
<div class="news">  <-- stats
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<h2>Messages</h2>

<?php
while ($comment = $comments->fetch()) // <--- messages
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php
}
?>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
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
</form> */ ?>

<div class="columns"> 
        <div class="box"> 
    <fieldset>
      <legend>STATS</legend>
      <p>
        <p> Name : <?= htmlspecialchars($character->getName()) ?></p>
        <p> Health : <?= $character->getHealth() ?></p> 
        <p> Experience : <?= $character->getExperience() ?></p> 
        <p> Level : <?= $character->getLevel() ?></p>
        <p> Strength : <?= $character->getStrength() ?></p>
      </p>
    </fieldset>
    </div>
    <div class="column">
      <p> 
        <?php  
                $messages = getMessagesDisplay();
                while ($data = $messages->fetch())
                { 
                    echo '<p>' . nl2br(htmlspecialchars($data['text'])) . '</p>';
                }
                ?>
                <br/>
                <form method="post" action="view/insert.php"><input class="input" type="text" name="message"></form>
      </p>
    </div>
    </div>

<?php $playingGame = ob_get_clean(); ?>

<?php require('layout.php'); ?>