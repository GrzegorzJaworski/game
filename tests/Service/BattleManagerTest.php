<?php

namespace Tests\Service;


use App\Model\Battle\BattleResult;
use App\Model\Character\Beast;
use App\Model\Character\Hero;
use App\Service\BattleManager;
use PHPUnit\Framework\TestCase;

class BattleManagerTest extends TestCase
{
    public function testBattleManagerInstance()
    {
        $battleManager = new BattleManager();
        $this->assertInstanceOf(BattleResult::class, $battleManager->battle(new Hero(), new Beast()));
    }
}