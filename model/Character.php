<?php
class Character
{
    private $_id;
    private $_name;
    private $_health;
    private $_experience;
    private $_level;
    private $_strength;

    public function __construct($name, $health, $strength)
    {
        $this->setName($name);
        $this->setHealth($health);
        $this->setStrength($strength);
        $this->_experience = 1;
        $this->_level = 0;
    }

    public function hydrate(array $data)
    {
        if (isset($data['name']))
        {
            $this->setName($data['name']);
        }

        if (isset($data['health']))
        {
            $this->setName($data['health']);
        }

        if (isset($data['experience']))
        {
            $this->setName($data['experience']);
        }

        if (isset($data['level']))
        {
            $this->setName($data['level']);
        }

        if (isset($data['strength']))
        {
            $this->setName($data['strength']);
        }
    }

    public function hitSomething(Character $something)
    {
        $something->_health -= $this->_strength;
    }

    public function heal()
    {
        $this->_health = 100;
    }

    public function gainExperience()
    {
        $this->_experience++;

        if ($this->_experience > 100)
        {
            $this->_level++;
            $this->_strength += 2;
            $this->_experience = 0;
        }
    }

    public function setId($id)
    {
        $id = (int) $id;

        if ( $id > 0)
        {
            $this->_id = $id;
        }
    }

    public function setName($name)
    {
        if (is_string($name) && strlen($name) <= 20)
        {
            $this->_name = $name;
        }
        else
        {
            trigger_error('The character\'s name has to be a string.', E_USER_WARNING);
            return;
        }
    }

    public function setHealth($health)
    {
        $health = (int) $health;

        if (!is_int($health))
        {
            trigger_error('The character\'s health has to be an integer.', E_USER_WARNING);
            return;
        }

        if ($health > 0 && $health <= 100)
        {
            $this->_health = $health;
        }

        if ($health > 100)
        {
            trigger_error('The character\'s health can\'t be above 100.', E_USER_WARNING);
            return;
        }
    }

    public function setExperience($experience)
    {
        $experience = (int) $experience;

        if (!is_int($experience))
        {
            trigger_error('The character\'s experience has to be an integer.', E_USER_WARNING);
            return;
        }

        if ($experience >= 0)
        {
            $this->_experience = $experience;
        }
    }
        

    public function setLevel($level)
    {
        $level = (int) $level;

        if (!is_int($level))
        {
            trigger_error('The character\'s level has to be an integer.', E_USER_WARNING);
            return;
        }

        if ($level >= 0)
        {
            $this->_level = $level;
        }
    }

    public function setStrength($strength)
    {
        $strength = (int) $strength;

        if (!is_int($strength))
        {
            trigger_error('The character\'s strength has to be an integer.', E_USER_WARNING);
            return;
        }

        if ($strength >= 0)
        {
            $this->_strength = $strength;
        }    
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function getHealth()
    {
        return $this->_health;
    }

    public function getLevel()
    {
        return $this->_level;
    }

    public function getStrength()
    {
        return $this->_strength;
    }
}