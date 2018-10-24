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
    /** @var Player */
    private $player;
    /** @var bool */
    private $gameOver = false;
    /** @var Dice */
    private $dice;
    /**
     * @var GameDelayerInterface
     */
    private $gameDelayer;
    /** @var Factory */
    private $factory;
    /** @var array */
    private $possibleColors;

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
        $possibleColors = $this->configuration->getStringPossibleColors();
        foreach ($possibleColors as $possibleColor) {
            $this->possibleColors[] = $this->factory->createColor($possibleColor, $this->configuration);
        }
        $this->configuration->addToPossibleColors($this->possibleColors);
    }

    public function playGame(): void
    {
        foreach ($this->players as $this->player) {
            $this->giveRandomCardsToPlayer($this->player);
        }
        while (!$this->gameOver) {
            foreach ($this->players as $this->player) {
                $this->player->makeTurn($this->dice);
                $this->logger->log('');
                $this->gameDelayer->delay(2);
                if ($this->player->hasWon()) {
                    $this->gameOver = true;
                    break;
                }
            }
        }
    }


    private function giveRandomCardsToPlayer(Player $player): void
    {
        $possibleColors = $this->configuration->getPossibleColors();
        for ($playerCardCount = count($player->getCards());
             $playerCardCount < $this->numberOfCards;) {
            $intShuffleCardColor = array_rand($possibleColors);
            $shuffleCardColor = $possibleColors[$intShuffleCardColor];
            unset($possibleColors[$intShuffleCardColor]);
            $possibleColors = array_values($possibleColors);
            $shuffleCard = $this->factory->createCard($shuffleCardColor);
            $player->addToCards($shuffleCard);
            $this->logger->log($player->getName() . ' gets a ' . $shuffleCard);
            $playerCardCount++;
            $this->gameDelayer->delay(1);
        }
    }
}
