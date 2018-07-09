<?php

namespace Tests\Model\Battle;


use App\Exceptions\RoundsException;
use App\Model\Battle\BattleResult;
use App\Model\Character\Beast;
use App\Model\Character\Hero;
use App\Model\Battle\Round;
use PHPUnit\Framework\TestCase;

class BattleResultTest extends TestCase
{
    function testInstance()
    {
        $battleRsult = new BattleResult(new Hero(), new Beast(), [new Round()]);
        $this->assertInstanceOf(BattleResult::class, $battleRsult);
    }

    function testNoWinnerInstance()
    {
        $battleRsult = new BattleResult(null, null, [new Round()]);
        $this->assertInstanceOf(BattleResult::class, $battleRsult);
    }

    function testGetWinner()
    {
        $battleRsult = new BattleResult(new Hero(), new Beast(), [new Round()]);
        $this->assertInstanceOf(Hero::class, $battleRsult->getWinner());
    }

    function testGetWinnerWhenDraw()
    {
        $battleRsult = new BattleResult(null, null, [new Round()]);
        $this->assertNull($battleRsult->getWinner());
    }

    function testGetLoser()
    {
        $battleRsult = new BattleResult(new Hero(), new Beast(), [new Round()]);
        $this->assertInstanceOf(Beast::class, $battleRsult->getLoser());
    }

    function testGetLoserWhenDraw()
    {
        $battleRsult = new BattleResult(null, null, [new Round()]);
        $this->assertNull($battleRsult->getLoser());
    }

    function testRoundsOfRoundClass()
    {
        $this->expectException(RoundsException::class);

        new BattleResult(null, null, [new Round(), 'Round']);

    }

    function testGetRounds()
    {
        $battleRsult = new BattleResult(new Hero(), new Beast(), [new Round(), new Round()]);
        $this->assertInternalType("array", $battleRsult->getRounds());
        $this->assertCount(2, $battleRsult->getRounds());
        $first = $battleRsult->getRounds()[0];    //Previous assert tells us this is safe
        $this->assertInstanceOf(Round::class, $first);
    }
}