<?php


class Game
{
    /** @var int */
    private $numberOfCards;
    /** @var int */
    private $numberOfPlayers;
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
        $this->numberOfPlayers = count($this->players);
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
            $this->giveRandomCardsToPlayer($player);
        }
        $gameover = false;
        while (!$gameover) {
            /** @var Player $player */
            foreach ($this->players as $player) {
                $player->makeTurn($this->dice);
                $this->logger->log($player->getName() . '`s turn has finished');
                $this->gameDelayer->delay(2);
                $gameover = $player->hasWon();
                if ($gameover) {
                    break;
                }

            }
        }
    }


    private function giveRandomCardsToPlayer(Player $player): void
    {
        $possibleColors = $this->configuration->getPossibleColors();
        for ($i = 0; $i < $this->numberOfCards; $i++) {
            $color = array_rand($possibleColors);
            unset($possibleColors[$color]);
            $shuffleCard = $this->factory->createCard($color);
            $player->addToCards($shuffleCard);
            $this->logger->log($player->getName() . ' gets a ' . $shuffleCard);
            $this->gameDelayer->delay(1);
        }
    }
}
