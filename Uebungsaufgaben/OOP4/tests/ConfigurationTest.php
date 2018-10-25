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
        $this->playerArray = array($this->player);
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
        $this->inifileParser->method('parse')->willReturn($this->iniFileSettings);
        $this->configuration = new Configuration($this->logger, $this->inifileParser);
    }

    public function testGetIniFileSettings()
    {
        $this->assertEquals($this->iniFileSettings, $this->configuration->getIniFileSettings());
    }

    public function testGetConfNumberOfCards()
    {
        $this->assertSame(1, $this->configuration->getConfNumberOfCards());
    }

    public function testGetLogger()
    {
        $this->assertEquals($this->logger, $this->configuration->getLogger());
    }

    public function testGetStringPossibleColors()
    {
        $this->assertEquals($this->iniFileSettings['colors'], $this->configuration->getStringPossibleColors());
    }

    public function testGetPossibleColorsAndAddToPossibleColors()
    {
        $this->configuration->addToPossibleColors($this->colorArray);
        $this->assertEquals($this->colorArray, $this->configuration->getPossibleColors());
    }

    public function testExceptionIfNumberOfCardsIsLowerThanNumberOfColors()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The number of colors must be equal or greater than the number of cards.');

        $colorArray = array(
            'red' => 'Red',
            'blue' => 'Blue'
        );
        $cardsArray = array(
            'numberOfCards' => 3
        );
        $iniFileSettings = array(
            'colors' => $colorArray,
            'cards' => $cardsArray
        );
        /** @var IniFileParser | PHPUnit_Framework_MockObject_MockObject $inifileParser */
        $inifileParser = $this->createMock(IniFileParser::class);
        $inifileParser->method('parse')->willReturn($iniFileSettings);
        $configuration = new Configuration($this->logger, $inifileParser);
    }

    public function testGetPathToLogFile()
    {
        $this->assertEquals('/tmp/logfile.txt', $this->configuration->getPathToLogfile());
    }
}
