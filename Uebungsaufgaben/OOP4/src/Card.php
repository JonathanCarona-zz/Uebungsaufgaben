<?php


class Card
{
    /** @var Color */
    private $color;
    /** @var bool */
    private $isTurned = false;

    public function __construct(Color $color)
    {
        $this->color = $color;

    }


    public function turn(): void
    {
        $this->isTurned = true;
    }


    public function getColor(): Color
    {
        return $this->color;
    }


    public function isTurned(): bool
    {
        return $this->isTurned;
    }

    public function __toString(): string
    {
        return $this->color . ' Card';
    }

}
