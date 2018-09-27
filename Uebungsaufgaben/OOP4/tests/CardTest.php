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

    public function testFlipEqualColorCard() {
        $this->card->flipEqualColorCard($this->card, $this->color);
        $this->assertSame(true, $this->card->getIsCovered());
    }

    public function testGetColor() {
        $expectedColor = $this->createMock(Color::class);
        $this->assertEquals($expectedColor, $this->card->getColor());
    }

    public function testGetIsCovered() {
        $this->assertSame(false, $this->card->GetIsCovered());
    }

    public function testToString() {
        /** @var Color $expectedOutput */
        $expectedOutput = $this->createMock(Color::class);
        $this->assertEquals($expectedOutput . ' Card', (string) $this->card);
    }

    public function testSetIsCovered() {
        $this->assertSame(false, $this->card->getIsCovered());
        $this->card->setIsCovered(true);
        $this->assertSame(true, $this->card->getIsCovered());
    }
}
