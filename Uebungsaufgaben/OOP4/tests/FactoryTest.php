<?php


use PHPUnit\Framework\TestCase;

/** @covers Factory */
class FactoryTest extends TestCase
{
    /** @var Factory */
    private $factory;
    /** @var PHPUnit_Framework_MockObject_MockObject|Configuration */
    private $configuration;
    /** @var Color | PHPUnit_Framework_MockObject_MockObject */
    private $color;
    /** @var array */
    private $playerArray;
    /** @var array */
    private $colorArray;
    /** @var array */
    private $iniFileSettings;


    protected function setUp()
    {
        $this->color = $this->createMock(Color::class);
        $player = 'Alice';
        $this->playerArray = array($player);
        $this->colorArray = array(
            'red' => 'Red'
        );
        $cardsArray = array(
            'numberOfCards' => 1
        );
        $this->iniFileSettings = array(
            'players' => $this->playerArray,
            'colors' => $this->colorArray,
            'cards' => $cardsArray
        );

        $this->configuration = $this->createMock(Configuration::class);
        $this->configuration->method('getIniFileSettings')->willReturn($this->iniFileSettings);
        $logger = $this->createMock(StandardOutLogger::class);
        $this->configuration->method('getLogger')->willReturn($logger);
        $this->configuration->method('getStringPossibleColors')->willReturn($this->iniFileSettings['colors']);
        $this->factory = new Factory($this->configuration);
    }

    public function testCreateGame()
    {

        $this->assertInstanceOf(Game::class, $this->factory->createGame());
    }

    public function testCreateColor()
    {
        $this->configuration->method('getIniFileSettings')->willReturn($this->iniFileSettings);
        $this->assertInstanceOf(Color::class, $this->factory->createColor('Red', $this->configuration));
    }

    public function testCreateCard()
    {
        $this->assertInstanceOf(Card::class, $this->factory->createCard($this->color));
    }


}
