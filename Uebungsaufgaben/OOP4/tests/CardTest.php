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

    public function testCardCanBeTurned(): void
    {
        $this->assertFalse(false, $this->card->isTurned());
        $this->card->turn();
        $this->assertTrue(true, $this->card->isTurned());
    }

    public function testColorCanBeAsked(): void
    {
        $expectedColor = $this->createMock(Color::class);
        $this->assertEquals($expectedColor, $this->card->getColor());
    }

    public function testCardWillBeCastedToString(): void
    {
        /** @var Color $expectedOutput */
        $expectedOutput = $this->createMock(Color::class);
        $this->assertEquals($expectedOutput . ' Card', (string)$this->card);
    }
}
