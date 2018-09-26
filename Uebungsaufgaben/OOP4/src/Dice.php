<?php


class Dice
{

    /** @var Configuration */
    private $configuration;


    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }


    public function roll(): Color
    {
        $possibleColors = $this->configuration->getConfPossibleColors();
        $intDiceColor = rand(0, count($possibleColors) - 1);
        return $possibleColors[$intDiceColor];
    }


}
