<?php

namespace App\Service;


use App\Model\Character\Character;
use App\Model\Skill\MagicShield;
use App\Model\Skill\RapidStrike;
use App\Model\Skill\Skill;

class SkillManager
{

    /**
     * @var Attack
     */
    private $attack;

    public function __construct()
    {
        $this->attack = new Attack();
    }

    /**
     * @param Skill $skill
     * @param Character $attacker
     * @param Character $defender
     * @return float
     */
    public function useSkill(Skill $skill, Character $attacker, Character $defender): float
    {
        switch (true) {
            case $skill instanceof MagicShield:
                return $this->useMagicShield($attacker, $defender);
            case $skill instanceof RapidStrike:
                return $this->useRapidStrike($attacker, $defender);
        }
    }

    /**
     * @param Character $attacker
     * @param Character $defender
     * @return float
     */
    private function useMagicShield(Character $attacker, Character $defender): float
    {
        return ($this->attack->strike($attacker, $defender)) / 2;
    }

    /**
     * @param Character $attacker
     * @param Character $defender
     * @return float
     */
    private function useRapidStrike(Character $attacker, Character $defender): float
    {
        return ($this->attack->strike($attacker, $defender)) * 2;
    }
}