<?php

namespace App\Model\Character;

class Beast extends Character
{
    public function __construct(array $characterData = [])
    {
        if (count($characterData) > 0) {
            parent::__construct($characterData);
        }

        // if characterData doesn't have some property put default values
        $this->name = empty($this->name) ? 'Beast' : $this->name;
        $this->health = empty($this->health) ? mt_rand(60, 90) : $this->health;
        $this->strength = empty($this->strength) ? mt_rand(60, 90) : $this->strength;
        $this->defence = empty($this->defence) ? mt_rand(40, 60) : $this->defence;
        $this->speed = empty($this->speed) ? mt_rand(40, 60) : $this->speed;
        $this->luck = empty($this->luck) ? mt_rand(25, 40) : $this->luck;
    }
}