<?php


class Game
{
    /** @var int */
    private $numberOfCards;
    /** @var int */
    private $numberOfPlayers;
    /** @var array */
    private $players;
    /** @var bool */
    private $gameOver = false;
    /** @var Configuration */
    private $configuration;
    /** @var Dice */
    private $dice;

    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
        $this->applyConfiguration();
        $this->dice = new Dice($configuration);
    }

    private function applyConfiguration(): void
    {
        $this->numberOfCards = $this->configuration->getConfNumberOfCards();
        $this->numberOfPlayers = $this->configuration->getConfNumberOfPlayers();
        $this->players = $this->configuration->getConfPlayers();
    }

    public function playGame(): void
    {
        $player1 = $this->players[0];
        $this->shuffleCards($player1);
    }

    private function shuffleCards(Player $player)
    {
        $possibleColors = $this->configuration->getConfPossibleColors();
        for ($i = 0; $i < $this->numberOfCards; $i++) {
            $intCardColor = rand(0, count($possibleColors));
            $cardColor = $possibleColors[$intCardColor];
            $shuffleCard = new Card($cardColor);
            $player->addToCards($shuffleCard);
            echo $shuffleCard;
        }


    }

}
