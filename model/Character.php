<?php
class Character
{
    private $_id;
    private $_name;
    private $_health;
    private $_experience;
    private $_level;
    private $_strength;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    public function validName()
    {
        return !empty($this->_name);
    }

    public function hit(Character $something)
    {
        $something->_health -= ($this->_strength * 5);
    }

    public function kill(Character $something)
    {
        if ($something->_health <= 0)
        {
            echo $this->_name . ' killed ' . $something->_name;
            delete($something);
            return;
        }
    }

    public function die()
    {
        if ($this->_health <= 0)
        {
            echo $this->_name . ' is dead.';
            delete($this);
            return;
        }
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
        $name = (string) $name;

        if (is_string($name) && strlen($name) <= 30)
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

        if ($level > 0)
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

        if ($strength > 0)
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

    public function getExperience()
    {
        return $this->_experience;
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