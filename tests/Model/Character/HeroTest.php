<?php

namespace Tests\Model\Character;


use App\Model\Character\Hero;
use App\Model\Skill\MagicShield;
use App\Model\Skill\RapidStrike;
use App\Model\Skill\Skill;
use PHPUnit\Framework\TestCase;

class HeroTest extends TestCase
{
    /**
     * @var Hero
     */
    private $hero;

    protected function setUp()
    {
        $this->hero = new Hero();
    }

    public function testHeroInstance()
    {
        $this->assertInstanceOf(Hero::class, $this->hero);
    }

    public function testGetName()
    {
        $this->assertEquals('Orderus', $this->hero->getName());
    }

    public function testRangeOfHealth()
    {
        $this->assertGreaterThanOrEqual(70, $this->hero->getHealth());
        $this->assertLessThanOrEqual(100, $this->hero->getHealth());
    }

    public function testRangeOfStrength()
    {
        $this->assertGreaterThanOrEqual(70, $this->hero->getStrength());
        $this->assertLessThanOrEqual(80, $this->hero->getStrength());
    }

    public function testRangeOfDefence()
    {
        $this->assertGreaterThanOrEqual(45, $this->hero->getDefence());
        $this->assertLessThanOrEqual(55, $this->hero->getDefence());
    }

    public function testRangeOfSpeed()
    {
        $this->assertGreaterThanOrEqual(40, $this->hero->getSpeed());
        $this->assertLessThanOrEqual(50, $this->hero->getSpeed());
    }

    public function testRangeOfLuck()
    {
        $this->assertGreaterThanOrEqual(10, $this->hero->getLuck());
        $this->assertLessThanOrEqual(30, $this->hero->getLuck());
    }

    public function testSetSkill()
    {
        $this->hero->setSkill(new MagicShield());
        $this->hero->setSkill(new MagicShield());
        $this->hero->setSkill(new RapidStrike());

        $this->assertContainsOnly(Skill::class, $this->hero->getSkills());
        $this->assertCount(2, $this->hero->getSkills());
    }

    public function testSetSkills()
    {
        $this->hero->setSkills([new MagicShield()]);
        $this->hero->setSkills([new MagicShield()]);
        $this->hero->setSkills([new RapidStrike()]);

        $this->assertContainsOnly(Skill::class, $this->hero->getSkills());
        $this->assertCount(2, $this->hero->getSkills());
    }

    public function testGetOffenseSkills()
    {
        $this->assertCount(1, $this->hero->getOffenseSkills());
    }

    public function testGetDefenseSkills()
    {
        $this->assertCount(1, $this->hero->getDefenseSkills());
    }

    public function testInitiatingObjectWithData()
    {
        $hero = new Hero([
            'name' => 'Test',
            'health' => 80,
            'strength' => 90,
            'defence' => 50,
            'speed' => 50,
            'luck' => 30,
        ]);

        $this->assertInstanceOf(Hero::class, $hero);
        $this->assertEquals('Test', $hero->getName());
        $this->assertEquals(80, $hero->getHealth());
        $this->assertEquals(90, $hero->getStrength());
        $this->assertEquals(50, $hero->getDefence());
        $this->assertEquals(50, $hero->getSpeed());
        $this->assertEquals(30, $hero->getLuck());

    }

    public function testInitiatingObjectWithEmptyData()
    {
        $hero = new Hero([
            'name' => '',
            'health' => '',
        ]);

        $this->assertInstanceOf(Hero::class, $hero);
        $this->assertEquals('Orderus', $hero->getName());
        $this->assertGreaterThanOrEqual(70, $hero->getHealth());
        $this->assertLessThanOrEqual(100, $hero->getHealth());
        $this->assertGreaterThanOrEqual(70, $hero->getStrength());
        $this->assertLessThanOrEqual(80, $hero->getStrength());
        $this->assertGreaterThanOrEqual(45, $hero->getDefence());
        $this->assertLessThanOrEqual(55, $hero->getDefence());
        $this->assertGreaterThanOrEqual(40, $hero->getSpeed());
        $this->assertLessThanOrEqual(50, $hero->getSpeed());
        $this->assertGreaterThanOrEqual(10, $hero->getLuck());
        $this->assertLessThanOrEqual(30, $hero->getLuck());
    }
}