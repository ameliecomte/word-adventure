<?php
require('model/dbModel.php');

$stats = getStats();
$messages = getMessagesDisplay();

require('view/layout.php');

// ----------------------------
/*

// loading autoload
function loadClass($classname)
{
  require $classname.'.php';
}

spl_autoload_register('loadClass');

session_start();

if (isset($_GET['deconnection']))
{
    session_destroy();
    header('Location: .');
    exit();
}

if (isset($_SESSION['character']))
{
    $character = $_SESSION['character'];
}

$db = dbConnect();
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.

$manager = new CharacterManager($db);

if (isset($_POST['create']) && isset($_POST['name'])) // Si on a voulu créer un personnage.
{
  $character = new Character(['name' => $_POST['name']]); // On crée un nouveau personnage.
  
  if (!$character->validName())
  {
    $message = 'The name chosen is invalid.';
    unset($character);
  }
  elseif ($manager->exists($character->name()))
  {
    $message = 'This name is already taken.';
    unset($character);
  }
  else
  {
    $manager->add($character);
  }
}

elseif (isset($_POST['use']) && isset($_POST['name'])) // Si on a voulu utiliser un personnage.
{
  if ($manager->exists($_POST['name'])) // Si celui-ci existe.
  {
    $character = $manager->get($_POST['name']);
  }
  else
  {
    $message = 'This character doesn\'t exists !'; // S'il n'existe pas, on affichera ce message.
  }
}

elseif (isset($_POST['hit'])) // Si on a cliqué sur un personnage pour le frapper.
{
  if (!isset($character))
  {
    $message = 'Create a character or log in.';
  }
  
  else
  {
    if (!$manager->exists((int) $_POST['hit']))
    {
      $message = 'Le personnage que vous voulez frapper n\'existe pas !';
    }
    
    else
    {
      $toHit = $manager->get((int) $_POST['hit']);
      
      $return = $character->hit($toHit); // On stocke dans $retour les éventuelles erreurs ou messages que renvoie la méthode frapper.
      
      switch ($return)
      {
        case Character::CEST_MOI :
          $message = 'Mais... pourquoi voulez-vous vous frapper ???';
          break;
        
        case Character::PERSONNAGE_FRAPPE :
          $message = 'Le personnage a bien été frappé !';
          
          $manager->update($character);
          $manager->update($toHit);
          
          break;
        
        case Character::PERSONNAGE_TUE :
          $message = 'Vous avez tué ce personnage !';
          
          $manager->update($character);
          $manager->delete($toHit);
          
          break;
      }
    }
  }
}


?>
<!DOCTYPE html>
<html>
  <head>
    <title>Word Adventure</title>
    
    <meta charset="utf-8" />
  </head>
  <body>

<?php
if (isset($message)) // On a un message à afficher ?
{
  echo '<p>', $message, '</p>'; // Si oui, on l'affiche.
}

if (isset($character)) // Si on utilise un personnage (nouveau ou pas).
{
?>

    <p><a href="?deconnection=1">Log Out</a></p>

    <fieldset>
      <legend>STATS</legend>
      <p>
        <p> Name : <?= htmlspecialchars($character->getName()) ?></p>
        <p> Health : <?= $character->getHealth() ?></p> 
        <p> Experience : <?= $character->getExperience() ?></p> 
        <p> Level : <?= $character->getLevel() ?></p>
        <p> STR : <?= $character->getStrength() ?></p>
      </p>
    </fieldset>

<?php
}
else
{
?>
    <form action="" method="post">
      <p>
        Name : <input type="text" name="name" maxlength="20" />
        <input type="submit" value="create this character" name="create" />
        <input type="submit" value="use this character" name="use" />
    </form>
<?php
}
?>
  </body>
</html>
<?php
if (isset($character))
{
    $_SESSION['character'] = $character;
}
*/

