<?php


use PHPUnit\Framework\TestCase;


/**
 * @covers Game
 */
class GameTest extends TestCase
{
    /** @var Game */
    private $game;
    /** @var array */
    private $playerArray;
    /** @var array */
    private $iniColorArray;
    /** @var array */
    private $iniFileSettings;
    /** @var Configuration | PHPUnit_Framework_MockObject_MockObject */
    private $configuration;
    /** @var Dice | PHPUnit_Framework_MockObject_MockObject */
    private $dice;
    /** @var SleepGameDelayer | PHPUnit_Framework_MockObject_MockObject */
    private $gameDelayer;
    /** @var Factory | PHPUnit_Framework_MockObject_MockObject */
    private $factory;
    /** @var LoggerInterface | PHPUnit_Framework_MockObject_MockObject*/
    private $logger;
    /** @var array */
    private $colorArray;
    /** @var Player | PHPUnit_Framework_MockObject_MockObject*/
    private $player;


    protected function setUp()
    {
        $this->player = $this->createMock(Player::class);
        $color = $this->createMock(Color::class);
        $this->colorArray = array($color);
        $this->playerArray = array($this->player);
        $this->iniColorArray = array(
            'red' => 'Red'
        );
        $cardsArray = array(
            'numberOfCards' => 1
        );
        $this->iniFileSettings = array(
            'players' => $this->playerArray,
            'colors' => $this->iniColorArray,
            'cards' => $cardsArray
        );

        $this->configuration = $this->createMock(Configuration::class);
        $this->dice = $this->createMock(Dice::class);
        $this->gameDelayer = $this->createMock(SleepGameDelayer::class);
        $this->factory = $this->createMock(Factory::class);
        $this->logger = $this->createMock(StandardOutLogger::class);

        $this->configuration->method('getConfNumberOfCards')->willReturn(1);
        $this->configuration->method('getLogger')->willReturn($this->logger);
        $this->configuration->method('getColors')->willReturn($this->iniColorArray);


        $this->factory->method('createColor')->willReturn($color);

        $this->game = new Game($this->configuration, $this->dice, $this->gameDelayer, $this->playerArray, $this->factory);


    }


    public function testGameCanBePlayed(): void
    {
        $this->configuration->method('getColors')->willReturn($this->colorArray);
        /** @var Card | PHPUnit_Framework_MockObject_MockObject $card */
        $card = $this->createMock(Card::class);
        $cardPlayerArray = array();
        $this->player->method('getCards')->willReturn($cardPlayerArray);
        $this->factory->method('createCard')->willReturn($card);
        $this->player->method('hasWon')->willReturn(true);
        $card->method('__toString')->willReturn('Red');
        $this->player->method('getName')->willReturn('Alice');
        $this->logger->expects($this->exactly(2))->method('log')->withConsecutive(
            ['Alice gets a ' . $card],
            ['Alice`s turn has finished']
        );
        $this->game->playGame();
    }



}
