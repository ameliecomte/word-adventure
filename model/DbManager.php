<?php

class DbManager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=word-adventure;charset=utf8', 'root', '');
        return $db;
    }
}





