<?php

function getMessagesDisplay()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=word-adventure;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $req = $db->query('(SELECT id, text FROM textDisplay ORDER BY id DESC LIMIT 10) ORDER BY id');

    return $req;

}

        $req = getMessagesDisplay();
        while ($data = $req->fetch())
        { 
            echo '<p>' . nl2br(htmlspecialchars($data['text'])) . '</p>';
        }
        $req->closeCursor(); 