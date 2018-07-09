<?php

namespace App\Model\Skill;

class MagicShield extends Skill
{
    public function __construct()
    {
        $this->name = 'Magic shield';
        $this->isOffenseSkill = false;
        $this->chanceOfUse = 20;
    }
}