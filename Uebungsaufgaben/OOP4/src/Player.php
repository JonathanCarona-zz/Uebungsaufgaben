<?php


class Player
{
    /** @var string */
    private $name;
    /** @var Card[] */
    private $cards;
    /**
     * @var LoggerInterface
     */
    private $logger;
    /** @var bool */
    private $hasWon = false;


    public function __construct(string $name, LoggerInterface $logger)
    {
        $this->name = $name;
        $this->cards = array();
        $this->logger = $logger;
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function getCards(): array
    {
        return $this->cards;
    }

    public function addToCards(Card $card): void
    {
        $this->cards[] = $card;
    }

    public function makeTurn(Dice $dice): void
    {
        // Nimm Würfel
        // Würfle
        // Prüfe in meinem Kartendeck, ob Karte gedreht werden kann
        // Beende Spiel, wenn alle Karten aufgedeckt
        $diceColor = $dice->roll();
        $this->logger->log($this->name . ' has rolled the color ' . $diceColor);
        $this->flipEqualColorCard($diceColor);
        $this->printAllStateOfCards();
        $this->hasWon = $this->hasWon();
        if ($this->hasWon) {
            $this->logger->log($this->name . ' has won the game');
        }
    }

    private function printAllStateOfCards(): void
    {
        /** @var Card $card */
        foreach ($this->cards as $card) {
            $this->logger->log(($card->isTurned() ?
                $this->name . ': My ' . $card . ' is covered' :
                $this->name . ': My ' . $card . ' is still active'));
        }
    }


    private function isTheSameColor(Color $color, Card $card): bool
    {
        return ($card->getColor() === $color ? true : false);
    }

    private function flipEqualColorCard(Color $color): void
    {
        $cardArray = $this->getCards();
        foreach ($cardArray as $card) {
            if ($this->isTheSameColor($color, $card)) {
                $card->turn();
            }
        }
    }

    public function hasWon(): bool
    {
        foreach ($this->cards as $card) {
            if (!$card->isTurned()) {
                return false;
            }
        }
        return true;
    }
}
