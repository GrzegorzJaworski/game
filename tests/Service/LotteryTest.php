<?php

namespace Tests\Service;

use App\Model\Character\Hero;
use App\Service\Lottery;
use PHPUnit\Framework\TestCase;

class LotteryTest extends TestCase
{

    /**
     * @var Lottery
     */
    private $lottery;

    protected function setUp()
    {
        $this->lottery = new Lottery();
    }

    public function testDoesHaveLuck()
    {
        $hero = new Hero(['luck' => 100]);
        $this->assertTrue($this->lottery->doesHaveLuck($hero));
    }

    public function testDoesNotHaveLuck()
    {
        $hero = new Hero(['luck' => 0]);
        $this->assertFalse($this->lottery->doesHaveLuck($hero));
    }
}
