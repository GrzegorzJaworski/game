<?php

namespace App\Model\Character;



class Hero extends Character
{
    /**
     * Hero constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->health = rand(70, 100);
        $this->strength = rand(70, 80);
        $this->defence = rand(45, 55);
        $this->speed = rand(40, 50);
        $this->luck = rand(10, 30);
    }
}