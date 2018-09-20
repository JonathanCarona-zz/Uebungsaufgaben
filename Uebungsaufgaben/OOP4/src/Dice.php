<?php


class Dice
{
    /** @var Color */
    private $color;
    /** @var Configuration */
    private $configuration;


    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }


    public function roll(): void
    {
        $possibleColors = $this->configuration->getConfPossibleColors();
        $intDiceColor = rand(0, count($possibleColors));
        $diceColor = $possibleColors[$intDiceColor];
        $this->color = $diceColor;
    }


}
