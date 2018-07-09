<?php

namespace Tests\Service;


use App\Model\Character\Beast;
use App\Model\Character\Hero;
use App\Service\Attack;
use PHPUnit\Framework\TestCase;

class AttackTest extends TestCase
{
    /**
     * @var Attack
     */
    private $attack;

    protected function setUp()
    {
        $this->attack = new Attack();
    }

    public function testStrike()
    {
        $hero = new Hero([
            'strength' => 90,
            'defence' => 50
        ]);

        $beast = new Beast([
            'strength' => 90,
            'defence' => 50
        ]);

        $strike = $this->attack->strike($hero, $beast);

        $this->assertInternalType("int", $strike);
        $this->assertEquals(40, $strike);
    }
}