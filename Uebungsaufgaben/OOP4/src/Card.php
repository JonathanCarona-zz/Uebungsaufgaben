<?php


class Card
{
    /** @var Color */
    private $color;
    /** @var bool */
    private $isCovered = false;

    public function __construct(Color $color)
    {
        $this->color = $color;

    }

    //TODO:

    /**
     * Spieler Fragt Karte nach Farbe
     * Wenn Farbe dieselbe => Umdrehen
     * -> 3 Methoden: getColor + turn() + isTurned()
     */



    public function turn(): void
    {
        $this->isCovered = true;
    }


    public function getColor(): Color
    {
        return $this->color;
    }


    public function getIsCovered(): bool
    {
        return $this->isCovered;
    }

    public function __toString(): string
    {
        return $this->color . ' Card';
    }

}
