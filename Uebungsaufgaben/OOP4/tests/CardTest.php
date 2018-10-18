<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers Card
 */
class CardTest extends TestCase
{
    /** @var Card */
    private $card;
    /** @var PHPUnit_Framework_MockObject_MockObject|Color */
    private $color;

    protected function setUp()
    {
        $this->color = $this->createMock(Color::class);
        $this->card = new Card($this->color);
    }

    public function testTurn() {
        $this->assertSame(false, $this->card->isTurned());
        $this->card->turn();
        $this->assertSame(true, $this->card->isTurned());
    }

    public function testGetColor() {
        $expectedColor = $this->createMock(Color::class);
        $this->assertEquals($expectedColor, $this->card->getColor());
    }

    public function testIsTurned() {
        $this->assertSame(false, $this->card->isTurned());
    }

    public function testToString() {
        /** @var Color $expectedOutput */
        $expectedOutput = $this->createMock(Color::class);
        $this->assertEquals($expectedOutput . ' Card', (string) $this->card);
    }
}
