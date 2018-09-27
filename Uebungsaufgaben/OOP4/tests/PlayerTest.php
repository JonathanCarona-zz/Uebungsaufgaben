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
        $this->player = new Player('Jonathan');
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

    public function testGetAllFlippedCards()
    {
        $this->card->method('getIsCovered')->willReturn(true);
        $this->player->addToCards($this->card);
        $expectedCardArray = array($this->card);
        $this->assertSame($expectedCardArray, $this->player->getAllFlippedCards());
    }

    public function testCheckIfAllCardsAreFlipped()
    {
        $this->card->method('getIsCovered')->willReturn(false);
        $this->player->addToCards($this->card);
        $this->assertSame(false, $this->player->checkIfAllCardsAreFlipped());

        /** @var PHPUnit_Framework_MockObject_MockObject | Card $anotherCard */
        $anotherCard = $this->createMock(Card::class);
        $anotherCard->method('getIsCovered')->willReturn(true);
        $anotherPlayer = new Player('David');
        $anotherPlayer->addToCards($anotherCard);
        $this->assertSame(true, $anotherPlayer->checkIfAllCardsAreFlipped());

    }


}
