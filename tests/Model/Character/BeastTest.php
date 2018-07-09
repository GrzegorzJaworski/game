<?php

namespace Tests\Model\Character;


use App\Model\Character\Beast;
use PHPUnit\Framework\TestCase;

class BeastTest extends TestCase
{
    /**
     * @var Beast
     */
    private $beast;

    protected function setUp()
    {
        $this->beast = new Beast();
    }

    public function testBeastInstance()
    {
        $this->assertInstanceOf(Beast::class, $this->beast);
    }

    public function testGetName()
    {
        $this->assertEquals('Beast', $this->beast->getName());
    }

    public function testRangeOfHealth()
    {
        $this->assertGreaterThanOrEqual(60, $this->beast->getHealth());
        $this->assertLessThanOrEqual(90, $this->beast->getHealth());
    }

    public function testRangeOfStrength()
    {
        $this->assertGreaterThanOrEqual(60, $this->beast->getStrength());
        $this->assertLessThanOrEqual(90, $this->beast->getStrength());
    }

    public function testRangeOfDefence()
    {
        $this->assertGreaterThanOrEqual(40, $this->beast->getDefence());
        $this->assertLessThanOrEqual(60, $this->beast->getDefence());
    }

    public function testRangeOfSpeed()
    {
        $this->assertGreaterThanOrEqual(40, $this->beast->getSpeed());
        $this->assertLessThanOrEqual(60, $this->beast->getSpeed());
    }

    public function testRangeOfLuck()
    {
        $this->assertGreaterThanOrEqual(25, $this->beast->getLuck());
        $this->assertLessThanOrEqual(40, $this->beast->getLuck());
    }

    public function testInitiatingObjectWithData()
    {
        $beast = new Beast([
            'name' => 'Beast',
            'health' => 80,
            'strength' => 90,
            'defence' => 50,
            'speed' => 50,
            'luck' => 30,
        ]);

        $this->assertInstanceOf(Beast::class, $beast);
        $this->assertEquals('Beast', $beast->getName());
        $this->assertEquals(80, $beast->getHealth());
        $this->assertEquals(90, $beast->getStrength());
        $this->assertEquals(50, $beast->getDefence());
        $this->assertEquals(50, $beast->getSpeed());
        $this->assertEquals(30, $beast->getLuck());
    }

    public function testInitiatingObjectWithEmptyData()
    {
        $beast = new Beast([
            'name' => '',
            'health' => '',
        ]);

        $this->assertInstanceOf(Beast::class, $beast);
        $this->assertEquals('Beast', $beast->getName());
        $this->assertGreaterThanOrEqual(60, $beast->getHealth());
        $this->assertLessThanOrEqual(90, $beast->getHealth());
        $this->assertGreaterThanOrEqual(60, $beast->getStrength());
        $this->assertLessThanOrEqual(90, $beast->getStrength());
        $this->assertGreaterThanOrEqual(40, $beast->getDefence());
        $this->assertLessThanOrEqual(60, $beast->getDefence());
        $this->assertGreaterThanOrEqual(40, $beast->getSpeed());
        $this->assertLessThanOrEqual(60, $beast->getSpeed());
        $this->assertGreaterThanOrEqual(25, $beast->getLuck());
        $this->assertLessThanOrEqual(40, $beast->getLuck());
    }
}