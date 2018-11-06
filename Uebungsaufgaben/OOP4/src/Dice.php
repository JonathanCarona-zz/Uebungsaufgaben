<?php


class Dice
{
    /** @var Configuration  */
    private $configuration;
    /** @var Factory */
    private $factory;

    public function __construct(Configuration $configuration, Factory $factory)
    {
        $this->factory = $factory;
        $this->configuration = $configuration;
    }


    public function roll(): Color
    {
        $possibleColors = $this->configuration->getColors();
        $color = array_rand($possibleColors);
        return $this->factory->createColor($color);
    }
}
