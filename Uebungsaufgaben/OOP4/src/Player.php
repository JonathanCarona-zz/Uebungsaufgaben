<?php


class Player
{
    /** @var string */
    private $name;
    /** @var array */
    private $cards;


    public function __construct(string $name)
    {
        $this->name = $name;
        $this->cards = array();

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



    public function getAllFlippedCards(): array
    {
        $flippedCardsArray = array();
        for ($i = 0; $i < count($this->cards); $i++) {
            /** @var Card $card */
            $card = $this->cards[$i];
            if ($card->getIsCovered()) {
                array_push($flippedCardsArray, $card);
            }
        }
        return $flippedCardsArray;
    }
    public function checkIfAllCardsAreFlipped(): bool
    {
        $allCardsAreFlipped = false;
        $countAllFlippedCards = 0;
        for ($i = 0; $i < count($this->cards); $i++) {
            /** @var Card $card */
            $card = $this->cards[$i];
            if ($card->getIsCovered()) {
                $countAllFlippedCards++;
            }
        }
        if ($countAllFlippedCards == count($this->cards)) {
            $allCardsAreFlipped = true;
        }
        return $allCardsAreFlipped;
    }
}
