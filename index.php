<?php
require('controller/controller.php');

session_start();

if (isset($_SESSION['character']))
{
    $character = $_SESSION['character'];
}

if (isset($_GET['logOut']))
{
    session_destroy();
    header('Location: .');
    exit();
}

if (isset($_POST['$character'])) // gameplayView
{  
    loadGameplay();
}
else 
{
    loadGameplay();
    // listCharacters();
}

if (isset($character))
{
    $_SESSION['character'] = $character;
}


