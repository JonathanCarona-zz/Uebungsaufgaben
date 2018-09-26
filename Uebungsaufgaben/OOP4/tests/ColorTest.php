<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers Color
 */
class ColorTest extends TestCase
{
    /** @var Color */
    private $color;

    protected function setUp()
    {
        $this->color = new Color('Red');
    }

    public function testToString() {
        $this->assertSame('Red', (string) $this->color);
    }
}
