<?php


class Dice
{
    /** @var Color */
    private $color;
    /** @var Configuration  */
    private $configuration;

    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getColor(): Color
    {
        return $this->color;
    }

    public function setColor(Color $color): void
    {
        $this->color = $color;
    }

    public function roll(): Color
    {
        $possibleColors = $this->configuration->getConfPossibleColors();
        $intDiceColor = rand(0, count($possibleColors) - 1);
        $this->setColor($possibleColors[$intDiceColor]);
        return $this->getColor();
    }




}
