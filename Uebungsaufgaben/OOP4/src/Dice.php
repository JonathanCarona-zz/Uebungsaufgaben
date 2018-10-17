<?php


class Dice
{
    /** @var Color */
    private $color;

    public function __construct()
    {

    }

    public function getColor(): Color
    {
        return $this->color;
    }

    public function setColor(Color $color): void
    {
        $this->color = $color;
    }




}
