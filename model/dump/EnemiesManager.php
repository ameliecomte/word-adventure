<?php
class EnemiesManager
{
    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function add(Enemy $enemy)
    {
        $req = $this->_db->prepare('INSERT INTO enemies(name) VALUES(:name)');

        $req->bindValue(':name', $enemy->getName());
        $req->execute();

        $enemy->hydrate([
            'id' => $this->_db->lastInsertId(),
            'health' => 100,
            'strength' => 1
        ]);


    }

    public function delete(Enemy $enemy)
    {
        $this->_db->exec('DELETE FROM enemies WHERE id = ' . $enemy->getId());
    }

    public function exists($info)
    {
        if (is_int($info))
        {
            return (bool) $this->_db->query('SELECT COUNT(*) FROM characters WHERE id = ' . $info)->fetchColumn;
        }

        $req = $this->_db->prepare('SELECT COUNT(*) FROM characters WHERE name = :name');
        $req->execute([':name' => $info]);

        return (bool) $req->fetchColumn();
    }

    public function get($info)
    {
        if (is_int($info))
        {
            $req = $this->_db->query('SELECT id, name, health, experience, level, strength FROM characters WHERE id =' . $info);
            $data = $req->fetch(PDO::FETCH_ASSOC);
    
            return new Character($data);
        }
        else
        {
            $req = $this->_db->prepare('SELECT id, name, health, experience, level, strength FROM characters WHERE name = :name');
            $req->execute([':name' => $info]);

            return new Character($req->fetch(PDO::FETCH_ASSOC));
        }
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