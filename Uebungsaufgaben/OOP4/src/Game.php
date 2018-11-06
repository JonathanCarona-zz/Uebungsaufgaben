<?php


class Game
{
    /** @var int */
    private $numberOfCards;
    /** @var array */
    private $players;
    /** @var Configuration */
    private $configuration;
    /**
     * @var LoggerInterface
     */
    private $logger;
    /** @var Dice */
    private $dice;
    /**
     * @var GameDelayerInterface
     */
    private $gameDelayer;
    /** @var Factory */
    private $factory;


    public function __construct(
        Configuration $configuration,
        Dice $dice,
        GameDelayerInterface $gameDelayer,
        array $playerArray,
        Factory $factory)
    {
        $this->factory = $factory;
        $this->players = $playerArray;
        $this->configuration = $configuration;
        $this->applyConfiguration();
        $this->dice = $dice;
        $this->gameDelayer = $gameDelayer;
    }

    private function applyConfiguration(): void
    {
        $this->numberOfCards = $this->configuration->getConfNumberOfCards();
        $this->logger = $this->configuration->getLogger();
    }

    public function playGame(): void
    {
        /** @var Player $player */
        foreach ($this->players as $player) {
            $this->giveRandomCardsToPlayer2($player);
        }

        $gameOver = false;
        while (!$gameOver) {
            /** @var Player $player */
            foreach ($this->players as $player) {
                $player->makeTurn($this->dice);
                $this->logger->log($player->getName() . '`s turn has finished');
                $this->gameDelayer->delay(2);
                $gameOver = $player->hasWon();
                if ($gameOver) {
                    break;
                }
            }
        }
    }


    private function giveRandomCardsToPlayer(Player $player): void
    {
        $possibleColors = $this->configuration->getColors();
        for ($i = 0; $i < $this->numberOfCards; $i++) {
            $color = array_rand($possibleColors);
            unset($possibleColors[$color]);
            $shuffleCard = $this->factory->createCard($color);
            $player->addToCards($shuffleCard);
            $this->logger->log($player->getName() . ' gets a ' . $shuffleCard);
            $this->gameDelayer->delay(1);
        }
    }

    private function giveRandomCardsToPlayer2(Player $player): void
    {
        // Anzahl Farben - Anzahl Karten pro Spieler = Anzahl zu entfernde Farben $countOfCardsToBeRemoved
        // => Array von Farben -> zufällig $countOfCards... entfernen
        // => Karten an Spieler geben mit den übrig gebliebenen Farben
        $possibleColors = $this->configuration->getColors();

        $countOfCardsToBeRemoved = count($this->configuration->getColors()) - $this->numberOfCards;
        for($i = 0; $i < $countOfCardsToBeRemoved; $i++) {
            unset($possibleColors[rand(0, count($possibleColors))]);
        }

        foreach ($possibleColors as $possibleColor) {
            $card = $this->factory->createCard($possibleColor);
            $player->addToCards($card);
            $this->logger->log($player->getName() . ' gets a ' . $card);
        }

//
//        for ($i = 0; $i < $this->numberOfCards; $i++) {
//            $color = array_rand($possibleColors);
//            unset($possibleColors[$color]);
//            $shuffleCard = $this->factory->createCard($color);
//            $player->addToCards($shuffleCard);
//            $this->logger->log($player->getName() . ' gets a ' . $shuffleCard);
//            $this->gameDelayer->delay(1);
//        }
    }
}
