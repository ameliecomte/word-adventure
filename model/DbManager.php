<?php

class DbManager
{
    public function dbConnect() // needs to be changed to protected and everything encapsulated
    {
        $db = new PDO('mysql:host=localhost;dbname=word-adventure;charset=utf8', 'root', '');
        return $db;
    }
}





