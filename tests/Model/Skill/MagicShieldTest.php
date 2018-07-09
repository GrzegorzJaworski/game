<?php

namespace Tests\Model\Skill;

use App\Model\Skill\MagicShield;
use App\Model\Skill\Skill;
use PHPUnit\Framework\TestCase;

class MagicShieldTest extends TestCase
{
    /**
     * @var MagicShield
     */
    private $magicShield;

    protected function setUp()
    {
        $this->magicShield = new MagicShield();
    }

    public function testInstance()
    {
        $this->assertInstanceOf(Skill::class, $this->magicShield);
    }

    public function testGetName()
    {
        $this->assertInternalType('string', $this->magicShield->getName());
        $this->assertEquals('Magic shield', $this->magicShield->getName());
    }

    public function testIsNotOffenseSkill()
    {
        $this->assertFalse($this->magicShield->getIsOffenseSkill());
    }

    public function testChanceToUse()
    {
        $this->assertEquals(20, $this->magicShield->getChanceOfUse());
    }
}