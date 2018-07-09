<?php

namespace App\Service;


use App\Model\Character\Character;

class Attack
{
    /**
     * @param Character $attacker
     * @param Character $defender
     * @return int
     */
    public function strike(Character $attacker, Character $defender): int
    {
        return $attacker->getStrength() - $defender->getDefence();
    }
}