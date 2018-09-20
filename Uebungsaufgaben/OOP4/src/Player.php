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


}
