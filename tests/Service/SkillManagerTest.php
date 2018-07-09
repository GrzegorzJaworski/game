<?php

namespace Tests\Service;

use App\Model\Character\Beast;
use App\Model\Character\Hero;
use App\Model\Skill\MagicShield;
use App\Model\Skill\RapidStrike;
use App\Service\SkillManager;
use PHPUnit\Framework\TestCase;

class SkillManagerTest extends TestCase
{
    /**
     * @var SkillManager
     */
    private $skillManager;

    protected function setUp()
    {
        $this->skillManager = new SkillManager();
    }

    public function testUseSkillMagicShield()
    {
        $magicSheildUse = $this->skillManager->useSkill(new MagicShield(), new Hero(['strength' => 100]), new Beast(['defence' => 30]));

        $this->assertEquals(35.0, $magicSheildUse);
        $this->assertInternalType('float', $magicSheildUse);
    }

    public function testUseSkillRapidStrike()
    {
        $magicSheildUse = $this->skillManager->useSkill(new RapidStrike(), new Hero(['strength' => 100]), new Beast(['defence' => 30]));

        $this->assertEquals(140.0, $magicSheildUse);
        $this->assertInternalType('float', $magicSheildUse);
    }
}
