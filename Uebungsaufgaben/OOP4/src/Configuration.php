<?php


class Configuration
{

    /** @var int */
    private $confNumberOfCards;
    /** @var int */
    private $confNumberOfPlayers;
    /** @var array */
    private $confPlayers;
    /** @var array */
    private $confPossibleColors;

    public function __construct(int $confNumberOfCards, array $confPlayers, array $confPossibleColors)
    {
        $this->confNumberOfCards = $confNumberOfCards;
        $this->confNumberOfPlayers = count($confPlayers);
        $this->confPlayers = $confPlayers;
        $this->confPossibleColors = $confPossibleColors;
    }


    public function getConfNumberOfCards(): int
    {
        return $this->confNumberOfCards;
    }


    public function getConfNumberOfPlayers(): int
    {
        return $this->confNumberOfPlayers;
    }


    public function getConfPlayers(): array
    {
        return $this->confPlayers;
    }


    public function getConfPossibleColors(): array
    {
        return $this->confPossibleColors;
    }


}
