<?php

namespace Tests\Model\Battle;

use App\Model\Battle\Round;
use App\Model\Character\Beast;
use App\Model\Character\Hero;
use App\Model\Skill\MagicShield;
use App\Model\Skill\RapidStrike;
use PHPUnit\Framework\TestCase;

class RoundTest extends TestCase
{

    public function testGetHistoryWithDefenderLuckyTrue()
    {
        $round = new Round();

        $round->setAttacker(new Hero());
        $round->setDefender(new Beast());
        $round->doesDefenderGetLucky(true);
        $round->setDamage(20);
        $round->setUsedSkills([new RapidStrike()]);
        $round->setDefenderHealth(new Hero(['health' => 10]));

        $string = 'Orderus attacked. Beast was lucky and avoided the attack. Defender has 10 health.';

        $this->assertEquals($string, $round->getHistory());
    }

    public function testGetHistoryWithDefenderLuckyFalseAndHeroNoUsedSkills()
    {
        $round = new Round();

        $round->setAttacker(new Hero());
        $round->setDefender(new Beast());
        $round->doesDefenderGetLucky(false);
        $round->setDamage(20);
        $round->setUsedSkills([]);
        $round->setDefenderHealth(new Hero(['health' => 10]));

        $string = 'Orderus attacked. Hero doesn\'t use skills. Damage dealt: 20. Defender has 10 health.';

        $this->assertEquals($string, $round->getHistory());
    }

    public function testGetHistoryWithDefenderLuckyFalseAndHeroUsedOneSkill()
    {
        $round = new Round();

        $round->setAttacker(new Hero());
        $round->setDefender(new Beast());
        $round->doesDefenderGetLucky(false);
        $round->setDamage(20);
        $round->setUsedSkills([new RapidStrike()]);
        $round->setDefenderHealth(new Hero(['health' => 10]));

        $string = 'Orderus attacked. Hero use skill: Rapid strike. Damage dealt: 20. Defender has 10 health.';

        $this->assertEquals($string, $round->getHistory());
    }

    public function testGetHistoryWithDefenderLuckyFalseAndHeroUsedSkills()
    {
        $round = new Round();

        $round->setAttacker(new Hero());
        $round->setDefender(new Beast());
        $round->doesDefenderGetLucky(false);
        $round->setDamage(20);
        $round->setUsedSkills([new RapidStrike(), new MagicShield()]);
        $round->setDefenderHealth(new Hero(['health' => 10]));

        $string = 'Orderus attacked. Hero use skill: Rapid strike, Magic shield. Damage dealt: 20. Defender has 10 health.';

        $this->assertEquals($string, $round->getHistory());
    }
}
