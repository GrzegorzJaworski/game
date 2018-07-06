<?php
/**
 * Created by PhpStorm.
 * User: Grzesiek
 * Date: 06.07.2018
 * Time: 11:19
 */

namespace App\Model\Skill;


abstract class Skill
{
    protected $name;
    protected $offenseSkill;
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
    public function getOffenseSkill(): bool
    {
        return $this->offenseSkill;
    }

    /**
     * @return int
     */
    public function getChanceOfUse(): int
    {
        return $this->chanceOfUse;
    }


}