<?php

// -- loading autoload

/*
// Chargement des classes
require_once('model/PostManager.php'); -- Characters
require_once('model/CommentManager.php'); Enemies

function listPosts() --------- fetches a view - basically the first one with the choices
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function post() ------------- fetches a view - basically the second that display the stats and messages
{
    $postManager = new CharactersManager();
    $commentManager = new ScriptManager();

    $post = $postManager->getPost($_GET['id']); - the stats
    $comments = $commentManager->getComments($_GET['id']); - the messages... + form to submit commands?

    require('view/frontend/postView.php');
}

function addCharacter($postId, $author, $comment) --- or sendmessageCommand?
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

actions of the user:
use a character
add a character
send messages
log out


*/
require('model/DbManager.php');
function getMessagesDisplay()
{
    $db = DbManager::dbConnect();
    $messages = $db->query('(SELECT id, text FROM textDisplay ORDER BY id DESC LIMIT 10) ORDER BY id');

    return $messages;
}


require('model/Character.php');
require('model/CharactersManager.php');

session_start();

if (isset($_GET['logOut']))
{
    session_destroy();
    header('Location: .');
    exit();
}

if (isset($_SESSION['character']))
{
    $character = $_SESSION['character'];
}

$db = DbManager::dbConnect();
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué

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
        // ------- on creer aussi une nouvelle table vierge pour le script
    $intro = 'You\'re in the jails of the Emerald Empire\'s capital. One day the guards fetches you to fight in the battle arena. You\'re promised freedom if victorious. Armed with a sword and a health potion, you\'re ready to stay alive.';
    $req = $db->prepare('INSERT INTO textDisplay(text) VALUES(?)');
    $req->execute(array($intro));

    $manager->add($character);
  }
}

elseif (isset($_POST['use']) && isset($_POST['name'])) // Si on a voulu utiliser un personnage.
{
  if ($manager->exists($_POST['name'])) // Si celui-ci existe.
  {
    $character = $manager->get($_POST['name']);
    // ------- also get the right table for the script.
    
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