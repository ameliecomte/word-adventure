<?php
class CharactersManager
{
    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function add(Character $character)
    {
        $req = $this->_db->prepare('INSERT INTO characters(name) VALUES(:name)');

        $req->bindValue(':name', $character->getName());
        $req->execute();

        $character->hydrate([
            'id' => $this->_db->lastInsertId(),
            'health' => 100,
            'experience' => 0,
            'level' => 1,
            'strength' => 1
        ]);


    }

    public function delete(Character $character)
    {
        $this->_db->exec('DELETE FROM characters WHERE id = ' . $character->getId());
    }

    public function exists($id)
    {
        if (is_int($id))
        {
            return (bool) $this->_db->query('SELECT COUNT(*) FROM characters WHERE id = ' . $id)->fetchColumn;
        }

        $req = $this->_db->prepare('SELECT COUNT(*) FROM characters WHERE name = :name');
        $req->execute([':name' => $id]);

        return (bool) $req->fetchColumn();
    }

    public function get($id)
    {
        $id = (int) $id;

        $req = $this->_db->query('SELECT id, name, health, experience, level, strength FROM characters WHERE id =' . $id);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        return new Character($data);
    }

    public function update(Character $character)
    {
        $req = $this->db->prepare('UPDATE characters SET health = :health, experience = :experience, level = :level, strength = :strength WHERE id = :id');

        $req->bindValue(':health', $character->getHealth(), PDO::PARAM_INT);
        $req->bindValue(':experience', $character->getExperience(), PDO::PARAM_INT);
        $req->bindValue(':level', $character->getLevel(), PDO::PARAM_INT);
        $req->bindValue(':strength', $character->getStrength(), PDO::PARAM_INT);
        $req->bindValue(':id', $character->getId(), PDO::PARAM_INT);
    
        $req->execute();
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}