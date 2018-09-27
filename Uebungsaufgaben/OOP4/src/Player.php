<?php


class Player
{
    /** @var string */
    private $name;
    /** @var array */
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
        array_push($this->cards, $card);
    }

    public function makeTurn(Configuration $configuration): void
    {
        // Nimm Würfel
        // Würfle
        // Prüfe in meinem Kartendeck, ob Karte gedreht werden kann
        // Beende Spiel, wenn alle Karten aufgedeckt
        $diceColor = $this->roll($configuration);
        $this->logger->log($this->name . ' has rolled the color ' . $diceColor . PHP_EOL);
        $this->flipEqualColorCard($diceColor);
        $this->printIfAllCardsIfTheyAreCovered();
        $this->hasWon = $this->hasWon();
        if ($this->hasWon) {
            $this->logger->log($this->name . ' has won the game' . PHP_EOL);
        }
        $this->logger->log(PHP_EOL);
    }

    private function printIfAllCardsIfTheyAreCovered()
    {
        /** @var Card $card */
        foreach ($this->cards as $card) {
            if ($card->getIsCovered()) {
                $this->logger->log($this->name . ': My ' . $card . ' is covered' . PHP_EOL);
            } else {
                $this->logger->log($this->name . ': My ' . $card . ' is still active' . PHP_EOL);
            }
            sleep(1);
        }
    }

    private function isTheSameColor(Color $color, Card $card): bool
    {
        $cardIsEqual = false;
        if ($card->getColor() === $color) {
            $cardIsEqual = true;
        }
        return $cardIsEqual;
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

    private function roll(Configuration $configuration): Color
    {
        $possibleColors = $configuration->getConfPossibleColors();
        $intDiceColor = rand(0, count($possibleColors) - 1);
        return $possibleColors[$intDiceColor];
    }


    public function hasWon(): bool
    {
        $allCardsAreFlipped = false;
        $countAllFlippedCards = 0;
        foreach ($this->cards as $card) {
            if ($card->getIsCovered()) {
                $countAllFlippedCards++;
            }
        }
        if ($countAllFlippedCards == count($this->cards)) {
            $allCardsAreFlipped = true;
        }
        return $allCardsAreFlipped;
    }


    public function isHasWon(): bool
    {
        return $this->hasWon;
    }


}
