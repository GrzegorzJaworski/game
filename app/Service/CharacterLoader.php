<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz Jaworski
 * Date: 08.07.2018
 * Time: 15:41
 */

namespace App\Service;


use App\Model\Character\Beast;
use App\Model\Character\Hero;

class CharacterLoader
{
    /**
     * @return Hero
     */
    public function createHero(): Hero
    {
        return new Hero();
    }

    /**
     * @return Beast
     */
    public function createBeast(): Beast
    {
        return new Beast();
    }

    public function loadHero(array $heroData): Hero
    {
        return new Hero($heroData);
    }

    public function loadBeast($heroData): Beast
    {
        return new Beast($heroData);
    }
}