<?php
class Enemies extends Character
{
    public function hit(Character $something)
    {
        $something->_health -= $this->_strength;
    }


}