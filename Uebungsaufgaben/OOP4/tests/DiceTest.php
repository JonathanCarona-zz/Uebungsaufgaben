<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers Dice
 */
class DiceTest extends TestCase
{
    /** @var Configuration | PHPUnit_Framework_MockObject_MockObject */
    private $configuration;
    /** @var Dice */
    private $dice;
    /** @var Factory|PHPUnit_Framework_MockObject_MockObject $factory */
    private $factory;

    protected function setUp()
    {
        $color = $this->createMock(Color::class);
        $this->configuration = $this->createMock(Configuration::class);
        $this->factory = $this->createMock(Factory::class);
        $this->dice = new Dice($this->configuration, $this->factory);
    }

    public function testDiceCanBeRolled(): void
    {
        $color = $this->createMock(Color::class);
        $colorArray[] = $color;
        $this->configuration->method('getColors')->willReturn($colorArray);
        $this->factory->method('createColor')->willReturn($color);
        $this->assertEquals($color, $this->dice->roll());
    }

}
