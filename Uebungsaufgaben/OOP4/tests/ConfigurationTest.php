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
    /** @var LoggerInterface | PHPUnit_Framework_MockObject_MockObject */
    private $logger;
    /** @var Factory | PHPUnit_Framework_MockObject_MockObject */
    private $factory;
    /** @var IniFileParser | PHPUnit_Framework_MockObject_MockObject */
    private $inifileParser;
    /** @var array */
    private $iniFileSettings;

    protected function setUp()
    {
        $this->player = $this->createMock(Player::class);
        $this->playerArray = array(
            'alice' => 'Alice'
        );
        $this->color = $this->createMock(Color::class);
        $this->colorArray = array(
            'red' => 'Red'
        );
        $cardsArray = array(
            'numberOfCards' => 1
        );
        $this->logger = $this->createMock(StandardOutLogger::class);
        $this->factory = $this->createMock(Factory::class);
        $this->inifileParser = $this->createMock(IniFileParser::class);
        $this->iniFileSettings = array(
            'players' => $this->playerArray,
            'colors' => $this->colorArray,
            'cards' => $cardsArray
        );
    }

    public function testPlayersCanBeAsked()
    {
        $this->inifileParser->method('parse')->willReturn($this->iniFileSettings);
        $this->configuration = new Configuration($this->logger, $this->inifileParser);
        $this->assertEquals($this->playerArray, $this->configuration->getPlayers());
    }

    public function testIniFileSettingsCanBeAsked()
    {


        $this->inifileParser->method('parse')->willReturn($this->iniFileSettings);
        $this->configuration = new Configuration($this->logger, $this->inifileParser);
        $this->assertEquals($this->iniFileSettings, $this->configuration->getIniFileSettings());
    }

    public function testConfNumberOfCardsCanBeAsked()
    {


        $this->inifileParser->method('parse')->willReturn($this->iniFileSettings);
        $this->configuration = new Configuration($this->logger, $this->inifileParser);
        $this->assertSame(1, $this->configuration->getConfNumberOfCards());
    }

    public function testLoggerCanBeAsked()
    {
        $this->inifileParser->method('parse')->willReturn($this->iniFileSettings);
        $this->configuration = new Configuration($this->logger, $this->inifileParser);
        $this->assertEquals($this->logger, $this->configuration->getLogger());
    }

    public function testPossibleColorsCanBeAsked()
    {
        $this->inifileParser->method('parse')->willReturn($this->iniFileSettings);
        $this->configuration = new Configuration($this->logger, $this->inifileParser);
        $this->assertEquals($this->iniFileSettings['colors'], $this->configuration->getPossibleColors());
    }


    public function testExceptionIfNumberOfCardsIsLowerThanNumberOfColors()
    {
        $playerArray = array(
            'alice' => 'Alice'
        );
        $colorArray = array(
            'Red' => 'Red',
            'Blue' => 'Blue'
        );
        $cardsArray = array(
            'numberOfCards' => 3
        );
        $iniFileSettings = array(
            'colors' => $colorArray,
            'cards' => $cardsArray,
            'players' => $playerArray
        );

        $this->inifileParser->expects($this->once())->method('parse')->willReturn($iniFileSettings);
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The number of colors must be equal or greater than the number of cards.');
        $configuration = new Configuration($this->logger, $this->inifileParser);
    }
}
