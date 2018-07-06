<?php
/**
 * Created by PhpStorm.
 * User: Grzesiek
 * Date: 06.07.2018
 * Time: 11:36
 */

namespace App\Model\Skill;



class MagicShield extends Skill
{
    public function __construct()
    {
        $this->name = 'Rapid shield';
        $this->offenseSkill = false;
        $this->chanceOfUse = 20;
    }
}