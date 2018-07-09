<?php

namespace App\Model\Skill;

class RapidStrike extends Skill
{
    public function __construct()
    {
        $this->name = 'Rapid strike';
        $this->isOffenseSkill = true;
        $this->chanceOfUse = 10;
    }
}