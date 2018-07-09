<?php

namespace App\Model\Character;

use App\Model\Skill\MagicShield;
use App\Model\Skill\RapidStrike;
use App\Model\Skill\Skill;

class Hero extends Character
{
    private $skills = [];

    /**
     * Hero constructor.
     * @param array $characterData
     */
    public function __construct(array $characterData = [])
    {
        if (count($characterData) > 0){
            parent::__construct($characterData);
        }else{
            $this->name = 'Orderus';
            $this->health = mt_rand(70, 100);
            $this->strength = mt_rand(70, 80);
            $this->defence = mt_rand(45, 55);
            $this->speed = mt_rand(40, 50);
            $this->luck = mt_rand(10, 30);
        }
        $this->skills = [new MagicShield(), new RapidStrike()];
    }

    /**
     * @param Skill $skill
     */
    public function setSkill(Skill $skill)
    {
        if (!in_array($skill, $this->skills)){
            $this->skills[] = $skill;
        }
    }

    /**
     * @param array $skills
     */
    public function setSkills(array $skills)
    {
        $this->skills = array_unique(array_merge($this->skills, $skills), SORT_REGULAR);
    }

    /**
     * @return array|Skill
     */
    public function getSkills(): array
    {
        return $this->skills;
    }

    public function getOffenseSkills(): array
    {
        return array_filter($this->skills, function (Skill $skill){
            return $skill->getIsOffenseSkill() == true;
        });
    }

    public function getDefenseSkills(): array
    {
        return array_filter($this->skills, function (Skill $skill){
            return $skill->getIsOffenseSkill() == false;
        });
    }
}