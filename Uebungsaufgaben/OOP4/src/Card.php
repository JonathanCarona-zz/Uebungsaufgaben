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

    public function flipCard(): void
    {
        $this->isCovered = true;
    }

    public function getColor(): Color
    {
        return $this->color;
    }


    public function isCovered(): bool
    {
        return $this->isCovered;
    }

    public function __toString()
    {
        return $this->color->getColor() . ' Card';
    }

}
