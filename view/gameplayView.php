<?php $title = 'playing...'; ?>

<?php ob_start(); ?>

<p><a class="button is-dark" href="?logOut=1">Log Out</a></p>

<div class="box"> 
    <fieldset>
      <legend>STATS</legend>
      <p>
        <p> Name : <?= htmlspecialchars($character['name']) ?></p>
        <p> Health : <?= $character['health'] ?></p> 
        <p> Experience : <?= $character['experience'] ?></p> 
        <p> Level : <?= $character['level'] ?></p>
        <p> Strength : <?= $character['strength'] ?></p>
      </p>
    </fieldset>
</div>

<div class="columns">    
    <div class="column">
        <p> 
        <?php
        while ($data = $messages->fetch())
        { 
            echo '<p>' . nl2br(htmlspecialchars($data['text'])) . '</p>';
        }
        ?>
        <br/>
        <?php /* to rewrite
        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
        */ ?>
         <form method="post" action=" "><input class="input" type="text" name="message"></form>
        </p>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>