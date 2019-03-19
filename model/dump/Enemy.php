<?php
class Enemy
{
    private $_id;
    private $_name;
    private $_health;
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

    public function hit(Character $something)
    {
        $something->_health -= $this->_strength;

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
    }

    public function setHealth($health)
    {
        $health = (int) $health;
    }

    public function setStrength($strength)
    {
        $strength = (int) $strength;

        if (!is_int($strength))
        {
            trigger_error('The enemy\'s strength has to be an integer.', E_USER_WARNING);
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

    public function getStrength()
    {
        return $this->_strength;
    }
}