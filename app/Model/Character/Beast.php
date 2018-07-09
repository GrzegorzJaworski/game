<?php

namespace App\Model\Character;

class Beast extends Character
{
    public function __construct(array $characterData = [])
    {
        if (count($characterData) > 0) {
            parent::__construct($characterData);
        } else {
            $this->name = ('Beast');
            $this->health = mt_rand(60, 90);
            $this->strength = mt_rand(60, 90);
            $this->defence = mt_rand(40, 60);
            $this->speed = mt_rand(40, 60);
            $this->luck = mt_rand(25, 40);
        }
    }
}