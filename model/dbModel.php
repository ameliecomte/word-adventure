<?php


function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=word-adventure;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}


function getMessagesDisplay()
{
    $db = dbConnect();
    $messages = $db->query('(SELECT id, text FROM textDisplay ORDER BY id DESC LIMIT 10) ORDER BY id');

    return $messages;
}


function getStats()
{
    $db = dbConnect();
    $stats = $db->query('SELECT name, health, experience, level, strength FROM characters_stats');

    return $stats;
}
