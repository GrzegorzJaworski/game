<?php

namespace App\Service;


use App\Model\Character\Character;
use App\Model\Skill\Skill;

class Lottery
{
    /**
     * @param Character $character
     * @return bool
     */
    public function doesHaveLuck(Character $character): bool
    {
        return $this->probability($character->getLuck());
    }

    /**
     * @param Skill $skill
     * @return bool
     */
    public function doesUseSkill(Skill $skill): bool
    {
        return $this->probability($skill->getChanceOfUse());
    }


    /**
     * @param int $probability
     * @return bool
     */
    private function probability(int $probability): bool
    {
        return mt_rand(1, 100) <= $probability;
    }
}