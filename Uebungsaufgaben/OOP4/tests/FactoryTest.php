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
    private $colorArray;


    protected function setUp()
    {
        $this->color = $this->createMock(Color::class);
        $playerArray = array('Alice');


        $this->colorArray = array('Red');


        $this->configuration = $this->createMock(Configuration::class);
        $logger = $this->createMock(StandardOutLogger::class);
        $this->configuration->method('getLogger')->willReturn($logger);
        $this->configuration->method('getColors')->willReturn($this->colorArray);
        $this->configuration->method('getPlayers')->willReturn($playerArray);
        $this->factory = new Factory($this->configuration);
    }

    public function testGameCanBeCreated(): void
    {
        $this->assertInstanceOf(Game::class, $this->factory->createGame());
    }

    public function testColorCanBeCreated(): void
    {
        $this->assertInstanceOf(Color::class, $this->factory->createColor('Red'));
    }

    public function testCardCanBeCreated(): void
    {
        $this->assertInstanceOf(Card::class, $this->factory->createCard('Red'));
    }


}
