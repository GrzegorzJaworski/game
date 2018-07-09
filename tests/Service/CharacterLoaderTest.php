<?php

namespace Tests\Service;


use App\Model\Character\Beast;
use App\Model\Character\Hero;
use App\Service\CharacterLoader;
use PHPUnit\Framework\TestCase;

class CharacterLoaderTest extends TestCase
{
    /**
     * @var CharacterLoader
     */
    private $characterLoader;

    protected function setUp()
    {
        $this->characterLoader = new CharacterLoader();
    }

    public function testCreateHero()
    {
        $this->assertInstanceOf(Hero::class, $this->characterLoader->createHero());
    }

    public function testCreateBeast()
    {
        $this->assertInstanceOf(Beast::class, $this->characterLoader->createBeast());
    }

    public function testLoadHeroEmptyArray()
    {
        $hero = $this->characterLoader->loadHero([
        ]);

        $this->assertInstanceOf(Hero::class, $hero);
    }

    public function testLoadHero()
    {
        $hero = $this->characterLoader->loadHero([
            'name' => 'Test',
            'health' => 90,
            'strength' => 90,
            'defence' => 90,
            'speed' => 90,
            'luck' => 90,
        ]);

        $this->assertInstanceOf(Hero::class, $hero);
    }

    public function testLoadBeastEmptyArray()
    {
        $beast = $this->characterLoader->loadBeast([
        ]);

        $this->assertInstanceOf(Beast::class, $beast);
    }

    public function testLoadBeast()
    {
        $beast = $this->characterLoader->loadBeast([
            'name' => 'Best',
            'health' => 90,
            'strength' => 90,
            'defence' => 90,
            'speed' => 90,
            'luck' => 90,
        ]);

        $this->assertInstanceOf(Beast::class, $beast);
    }
}