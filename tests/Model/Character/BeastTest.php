<?php

namespace Tests\Model\Character;


use App\Model\Character\Beast;
use PHPUnit\Framework\TestCase;

class BeastTest extends TestCase
{
    private $beast;

    protected function setUp()
    {
        $this->beast = new Beast();
    }

    public function testBeastInstance()
    {
        $this->assertInstanceOf(Beast::class, $this->beast);
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
}