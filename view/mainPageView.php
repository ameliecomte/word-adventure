<?php // $title = 'Word Adventure'; ?>

<?php ob_start(); ?>

<?php 

/*
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
*/ 
if (isset($message)) // On a un message à afficher ?
{
  echo '<p>', $message, '</p>'; // Si oui, on l'affiche.
}
?>
  <div class>
    <form action="" method="post">
      <label class="label">Choose a character name</label>
      <div class="collumns">
        <div class="column"> <input class="input" type="text" name="name" maxlength="30" /> </div>
      </div>
      <div class="collumns">
        <div class="column"> <input class="button" type="submit" value="create this character" name="create" /></div>
        <div class="column"> <input class="button" type="submit" value="use this character" name="use" /> </div>
      </div> 
    </form>
  </div>


<?php $mainPage = ob_get_clean(); ?>

<?php require('layout.php'); ?>