<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Word Adventure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="web/css/main.css" />
    <script src="main.js"></script>
</head>
<body>


<h1> WORD ADVENTURE </h1>

<?php
if (isset($message)) // On a un message à afficher ?
{
  echo '<p>', $message, '</p>'; // Si oui, on l'affiche.
}

if (isset($character)) // Si on utilise un personnage (nouveau ou pas).
{
?>

    <p><a href="?deconnection=1">Log Out</a></p>


    <div class="layout"> 
        <div class="stats"> 
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
    <div class="UI">
      <p> 
        <?php  
                while ($data = $messages->fetch())
                { 
                    echo '<p>' . nl2br(htmlspecialchars($data['text'])) . '</p>';
                }
                $messages->closeCursor();  
                ?>
                <br/>
                <form method="post" action="view/insert.php"><input type="text" name="message"></form>
      </p>
    </div>
    </div>
<?php
}
else
{
?>
    <form action="" method="post">
      <p>
        Name : <input type="text" name="name" maxlength="30" />
        <input type="submit" value="create this character" name="create" />
        <input type="submit" value="use this character" name="use" />
    </form>
<?php
}
?>
  </body>
</html>


