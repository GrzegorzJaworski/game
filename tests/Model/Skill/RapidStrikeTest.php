<?php
namespace Tests\Model\Skill;

use App\Model\Skill\RapidStrike;
use App\Model\Skill\Skill;
use PHPUnit\Framework\TestCase;

class RapidStrikeTest extends TestCase
{
    /**
     * @var RapidStrike
     */
    private $rapidStrike;

    protected function setUp()
    {
        $this->rapidStrike = new RapidStrike();
    }

    public function testInstance()
    {
        $this->assertInstanceOf(Skill::class, $this->rapidStrike);
    }
    public function testGetName()
    {
        $this->assertInternalType('string', $this->rapidStrike->getName());
        $this->assertEquals('Rapid strike', $this->rapidStrike->getName());
    }

    public function testIsNotOffenseSkill()
    {
        $this->assertTrue($this->rapidStrike->getIsOffenseSkill());
    }

    public function testChanceToUse()
    {
        $this->assertEquals(10, $this->rapidStrike->getChanceOfUse());
    }
}