<?php

require_once('model/DbManager.php');

class CharactersManager extends DbManager
{
    public function getCharacters()
    {
        $db = $this->dbConnect();
        $characters = $db->query('SELECT id, name, health, level FROM characters ORDER BY id');

        return $characters;
    }

    public function getCharacter($characterId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, name, health, experience, level, strength DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date FROM characters WHERE id = ?');
        $req->execute(array($characterId));
        $character = $req->fetch();

        return $character;
    }

    // addCharacter
    // 
}
