<?php

namespace Tests\Service;


use App\Service\BattleManager;
use App\Service\CharacterLoader;
use App\Service\Container;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    /**
     * @var Container
     */
    private $container;

    protected function setUp()
    {
        $this->container = new Container();
    }

    public function testGetCharacterLoader()
    {
        $this->assertInstanceOf(CharacterLoader::class, $this->container->getCharacterLoader());
    }

    public function testGetBattleManager()
    {
        $this->assertInstanceOf(BattleManager::class, $this->container->getBattleManager());
    }
}