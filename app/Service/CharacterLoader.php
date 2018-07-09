<?php

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

    /**
     * @param array $heroData
     * @return Hero
     */
    public function loadHero(array $heroData): Hero
    {
        return new Hero($heroData);
    }

    /**
     * @param $heroData
     * @return Beast
     */
    public function loadBeast($heroData): Beast
    {
        return new Beast($heroData);
    }
}