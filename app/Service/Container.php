<?php

namespace App\Service;

use App\Model\Character\Beast;
use App\Model\Character\Hero;

class Container
{

    /**
     * @var CharacterLoader
     */
    private $characterLoader;

    /**
     * @var BattleManager
     */
    private $battleManager;

    /**
     * @return CharacterLoader
     */
    public function getCharacterLoader(): CharacterLoader
    {
        if ($this->characterLoader === null) {
            $this->characterLoader = new CharacterLoader();
        }
        return $this->characterLoader;
    }

    /**
     * @return BattleManager
     */
    public function getBattleManager(): BattleManager
    {
        if ($this->battleManager === null) {
            $this->battleManager = new BattleManager();
        }
        return $this->battleManager;
    }
}