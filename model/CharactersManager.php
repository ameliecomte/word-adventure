<?php

require_once('model/DbManager.php');
require_once('model/Character.php');

class CharactersManager extends DbManager
{
    public function getCharacters()
    {
        $db = $this->dbConnect();
        $characters = $db->query('SELECT id, name, health, level DATE_FORMAT(creation_date, \'%m/%d/%Y at %H:%i:%s\') AS creation_date FROM characters ORDER BY id');

        return $characters;
    }

    public function getCharacter($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, name, health, experience, level, strength FROM characters WHERE id = ?');
        $req->execute(array($id));
        $character = $req->fetch();

        return $character;
    }

    public function addCharacter(Character $character) // probably needs to have name in argument
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO characters(name) VALUES(:name)');

        $req->bindValue(':name', $character->getName());
        $req->execute();

        $character->hydrate([
            'id' => $db->lastInsertId(),
            'health' => 100,
            'experience' => 0,
            'level' => 1,
            'strength' => 1
        ]);
    }

    public function deleteCharacter(Character $character)
    {
        $db = $this->dbConnect();
        $db->exec('DELETE FROM characters WHERE id = ' . $character->getId());
    }

    public function updateCharacter(Character $character)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE characters SET health = :health, experience = :experience, level = :level, strength = :strength WHERE id = :id');

        $req->bindValue(':health', $character->getHealth(), PDO::PARAM_INT);
        $req->bindValue(':experience', $character->getExperience(), PDO::PARAM_INT);
        $req->bindValue(':level', $character->getLevel(), PDO::PARAM_INT);
        $req->bindValue(':strength', $character->getStrength(), PDO::PARAM_INT);
        $req->bindValue(':id', $character->getId(), PDO::PARAM_INT);
    
        $req->execute();
    }
}
