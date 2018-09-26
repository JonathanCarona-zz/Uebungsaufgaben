<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers Dice
 */
class DiceTest extends TestCase
{
    /** @var Dice */
    private $dice;
    /** @var PHPUnit_Framework_MockObject_MockObject|Configuration */
    private $configuration;

    protected function setUp()
    {
        $this->configuration = $this->createMock(Configuration::class);
        $this->dice = new Dice($this->configuration);
    }

    public function testRoll()
    {
        $expectedColor = $this->createMock(Color::class);
        $expectedColors = array($expectedColor);
        $this->configuration->expects($this->once())->method('getConfPossibleColors')->willReturn($expectedColors);
        $this->assertSame($expectedColor, $this->dice->roll());
    }
}
