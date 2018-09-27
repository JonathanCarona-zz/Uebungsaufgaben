<?php


use PHPUnit\Framework\TestCase;


/**
 * @covers Game
 */
class GameTest extends TestCase
{
    /** @var Game */
    private $game;
    /** @var Configuration | PHPUnit_Framework_MockObject_MockObject */
    private $configuration;
    /** @var StandardOutLogger | PHPUnit_Framework_MockObject_MockObject*/
    private $logger;
    /** @var Dice | PHPUnit_Framework_MockObject_MockObject*/
    private $dice;
    /** @var Player | PHPUnit_Framework_MockObject_MockObject */
    private $player;
    /** @var Color | PHPUnit_Framework_MockObject_MockObject */
    private $color;



    protected function setUp()
    {
        $this->player = $this->createMock(Player::class);
        $arrayPlayer = array($this->player);
        $this->color = $this->createMock(Color::class);
        $arrayColor = array($this->color);
        $this->configuration = $this->createMock(Configuration::class);
        $this->configuration->method('getConfNumberOfCards')->willReturn(1);
        $this->configuration->method('getConfPlayers')->willReturn($arrayPlayer);
        $this->configuration->method('getConfNumberOfPlayers')->willReturn(1);
        $this->configuration->method('getConfPossibleColors')->willReturn($arrayColor);
        $this->logger = $this->createMock(StandardOutLogger::class);
        $this->dice = $this->createMock(Dice::class);
        $this->game = new Game($this->configuration, $this->logger, $this->dice);
    }


    public function testPlayGame()
    {
        $card = $this->createMock(Card::class);
        $this->game->playGame();

    }


}
