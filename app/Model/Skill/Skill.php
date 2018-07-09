<?php

namespace App\Model\Skill;

abstract class Skill
{
    protected $name;
    protected $isOffenseSkill;
    protected $chanceOfUse;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function getIsOffenseSkill(): bool
    {
        return $this->isOffenseSkill;
    }

    /**
     * @return int
     */
    public function getChanceOfUse(): int
    {
        return $this->chanceOfUse;
    }
}