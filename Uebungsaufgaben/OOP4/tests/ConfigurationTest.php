<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers Configuration
 */
class ConfigurationTest extends TestCase
{
    /** @var Configuration */
    private $configuration;
    /** @var PHPUnit_Framework_MockObject_MockObject|Player */
    private $player;
    /** @var PHPUnit_Framework_MockObject_MockObject|Color */
    private $color;
    /** @var array */
    private $playerArray;
    /** @var array */
    private $colorArray;

    protected function setUp()
    {
        $this->player = $this->createMock(Player::class);
        $this->playerArray = array($this->player);
        $this->color = $this->createMock(Color::class);
        $this->colorArray = array($this->color);
        $this->configuration = new Configuration(5, $this->playerArray, $this->colorArray);
    }

    public function testGetConfNumberOfCards()
    {
        $this->assertSame(5, $this->configuration->getConfNumberOfCards());
    }

    public function testGetConfNumberOfPlayers()
    {
        $this->assertSame(1, $this->configuration->getConfNumberOfPlayers());
    }

    public function testGetConfPlayers()
    {
        $this->assertSame($this->playerArray, $this->configuration->getConfPlayers());
    }

    public function testGetConfPossibleColors() {
        $this->assertSame($this->colorArray, $this->configuration->getConfPossibleColors());
    }

}
