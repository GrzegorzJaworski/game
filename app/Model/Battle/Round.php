<?php

namespace App\Model\Battle;


use App\Model\Character\Character;
use App\Model\Skill\Skill;

class Round
{

    private $attackerName;
    private $defenderName;
    private $doesDefenderGetLucky;
    private $damage;
    private $usedSkills = [];
    private $defenderHealth;

    public function setAttacker(Character $attacker)
    {
        $this->attackerName = $attacker->getName();
    }

    public function setDefender(Character $defender)
    {
        $this->defenderName = $defender->getName();
    }

    public function doesDefenderGetLucky(bool $bool)
    {
        $this->doesDefenderGetLucky = $bool;
    }

    public function setDamage(float $damage)
    {
        $this->damage = $damage;
    }

    public function setUsedSkills(array $usedSkills)
    {
        $this->usedSkills = $usedSkills;
    }

    public function setDefenderHealth(Character $defender)
    {
        $this->defenderHealth = $defender->getHealth();
    }

    public function getHistory(): string
    {
        $string = strtr(":name attacked. ", [':name' => $this->attackerName]);
        if ($this->doesDefenderGetLucky) {
            $string .= strtr(":name was lucky and avoided the attack. ", [':name' => $this->defenderName]);
        } else {
            if (count($this->usedSkills) > 0) {
                $string .= 'Hero use skill: ';
                /** @var Skill $skill */
                foreach ($this->usedSkills as $skill) {
                    $string .= $skill->getName();
                    if (!next($this->usedSkills)) {
                        $string .= '. ';
                    } else {
                        $string .= ', ';
                    }
                }
            } else {
                $string .= 'Hero doesn\'t use skills. ';
            }

            $string .= strtr('Damage dealt: :damage. ', [':damage' => $this->damage]);
        }

        $health = $this->defenderHealth > 0 ? $this->defenderHealth : '0';
        $string .= strtr("Defender has :defenderHealth health.", [":defenderHealth" => $health]);

        return $string;
    }
}