<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers Player
 */
class PlayerTest extends TestCase
{
    /** @var Player */
    private $player;
    /** @var StandardOutLogger| PHPUnit_Framework_MockObject_MockObject */
    private $logger;
    /** @var Card | PHPUnit_Framework_MockObject_MockObject $card */
    private $card;
    /** @var Color | PHPUnit_Framework_MockObject_MockObject $color */
    private $color;

    protected function setUp()
    {
        $this->logger = $this->createMock(StandardOutLogger::class);
        $this->color = $this->createMock(Color::class);
        $this->player = new Player('Jonathan', $this->logger);
        $this->card = $this->createMock(Card::class);
    }

    public function testGetName()
    {
        $this->assertSame('Jonathan', $this->player->getName());
    }

    public function testAddToCards()
    {
        $this->player->addToCards($this->card);
        $givenCard = $this->player->getCards();
        $this->assertEquals($this->card, $givenCard[0]);
    }

    public function testGetCards()
    {
        $cardArray = array($this->card);
        $this->player->addToCards($this->card);
        $this->assertEquals($cardArray, $this->player->getCards());
    }

    public function testFlipEqualColorCard() {
        $this->player->addToCards($this->card);
        $this->card->method('getColor')->willReturn($this->color);
        $this->card->expects($this->once())->method('setIsCovered')->with(true);
        $this->player->flipEqualColorCard($this->card, $this->color);
        $this->assertSame(true, $this->card->getIsCovered());
    }
}
