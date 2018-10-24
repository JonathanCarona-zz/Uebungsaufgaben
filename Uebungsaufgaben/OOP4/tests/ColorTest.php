<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers Color
 */
class ColorTest extends TestCase
{
    /** @var Color */
    private $color;
    /** @var Configuration | PHPUnit_Framework_MockObject_MockObject */
    private $configuration;
    /** @var array | PHPUnit_Framework_MockObject_MockObject */
    private $colorArray;

    protected function setUp()
    {
        $this->configuration = $this->createMock(Configuration::class);
        $this->colorArray = array(
            'colors' => array(
                'red' => 'Red'
            )
        );
        $this->configuration->method('getIniFileSettings')->willReturn($this->colorArray);
        $this->color = new Color('Red', $this->configuration);
    }

    /**
     * @dataProvider provideInvalidColorNames
     */
    public function testExceptionIfNameOfColorIsNotValid(string $input): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The color is not valid');
        $color = new Color($input, $this->configuration);
        $this->assertEquals(true, true);
    }



    public function provideInvalidColorNames(): array
    {
        return [
            ['Blue'],
            ['Yellow'],
            ['Green']
        ];
    }

    public function testToString()
    {
        $this->assertSame('Red', (string)$this->color);
    }
}
