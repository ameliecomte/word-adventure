<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Word Adventure</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  </head>
  <body>
  <section class="section">
    <div class="container">
      <h1 class="title">
      -- WORD ADVENTURE -- 
      </h1>
      <p class="subtitle">
        text-based adventure <strong>in browser</strong>
      </p>
    </div>
  </section>

<div class="container">

<?php
if (isset($message)) // On a un message à afficher ?
{
  echo '<p>', $message, '</p>'; // Si oui, on l'affiche.
}

if (isset($character)) // Si on utilise un personnage (nouveau ou pas).
{
?>

    <p><a class="button is-dark" href="?logOut=1">Log Out</a></p>


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
<?php
}
else
{
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
<?php
}
?>

</div>
  </body>
</html>


