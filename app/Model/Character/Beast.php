<?php

namespace App\Model\Character;

class Beast extends Character
{
    public function __construct()
    {
        $this->health = rand(60, 90);
        $this->strength = rand(60, 90);
        $this->defence = rand(40, 60);
        $this->speed = rand(40, 60);
        $this->luck = rand(25, 40);
    }
}