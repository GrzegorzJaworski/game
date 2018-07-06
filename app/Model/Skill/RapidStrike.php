<?php
/**
 * Created by PhpStorm.
 * User: Grzesiek
 * Date: 06.07.2018
 * Time: 11:34
 */

namespace App\Model\Skill;


class RapidStrike extends Skill
{
    public function __construct()
    {
        $this->name = 'Rapid strike';
        $this->offenseSkill = true;
        $this->chanceOfUse = 10;
    }
}