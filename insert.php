<?php



try
{
    $db = new PDO('mysql:host=localhost;dbname=word-adventure;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$req = $db->prepare('INSERT INTO textDisplay(text) VALUES(?)');
$req->execute(array($_POST['message']));


header('Location: index.php');
?> 