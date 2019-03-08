<?php

// -- loading autoload


require('model/Character.php');
require('model/CharactersManager.php');

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

$manager = new CharactersManager($db);

if (isset($_POST['create']) && isset($_POST['name'])) // Si on a voulu créer un personnage.
{
  $character = new Character(['name' => $_POST['name']]); // On crée un nouveau personnage.
  
  if (!$character->validName())
  {
    $message = 'The name chosen is invalid.';
    unset($character);
  }
  elseif ($manager->exists($character->getName()))
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

if (isset($character))
{
    $_SESSION['character'] = $character;
}