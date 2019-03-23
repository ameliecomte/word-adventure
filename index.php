<?php
require('controller/controller.php');

session_start();

if (isset($_SESSION['character']))
{
    $character = $_SESSION['character'];
}

if (isset($_GET['logOut']))
{
    logOut();
}

if (isset($_POST['$characterId']))
{  
    loadGameplay();
}
else 
{
    // loadGameplay();
    listCharacters();
}

if (isset($character))
{
    $_SESSION['character'] = $character;
}


