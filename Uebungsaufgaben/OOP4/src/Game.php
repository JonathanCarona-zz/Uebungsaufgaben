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
    /** @var bool  */
    private $gameOver = false;
    /** @var Dice */
    private $dice;
    /**
     * @var GameDelayerInterface
     */
    private $gameDelayer;

    public function __construct(
        Configuration $configuration,
        Dice $dice,
        GameDelayerInterface $gameDelayer)
    {
        $this->configuration = $configuration;
        $this->applyConfiguration();
        $this->dice = $dice;
        $this->gameDelayer = $gameDelayer;
    }

    private function applyConfiguration(): void
    {
        $this->numberOfCards = $this->configuration->getConfNumberOfCards();
        $this->numberOfPlayers = $this->configuration->getConfNumberOfPlayers();
        $this->players = $this->configuration->getConfPlayers();
        $this->logger = $this->configuration->getLogger();
    }

    public function playGame(): void
    {
        foreach ($this->players as $this->player) {
            $this->giveRandomCardsToPlayer($this->player);
        }
        while(!$this->gameOver) {
            foreach ($this->players as $this->player) {
                $this->player->makeTurn($this->dice);
                $this->gameDelayer->delay(1);
                if ($this->player->hasWon()) {
                    $this->gameOver = true;
                    break;
                }
            }
        }
    }


    private function giveRandomCardsToPlayer(Player $player): void
    {
        $possibleColors = $this->configuration->getConfPossibleColors();
        for ($playerCardCount = count($player->getCards());
             $playerCardCount < $this->numberOfCards;
             ) {
            $intCardColor = rand(0, count($possibleColors) - 1);
            $cardColor = $possibleColors[$intCardColor];
            $playerCards = $player->getCards();
            $playerCardsColor = array();
            /** @var Card $playerCard */
            foreach ($playerCards as $playerCard) {
                $playerCardsColor[] = $playerCard->getColor();
            }
            if (!
            in_array($cardColor, $playerCardsColor)) {
                $shuffleCard = new Card($cardColor);
                $player->addToCards($shuffleCard);
                $this->logger->log($player->getName() . ' gets a ' . $shuffleCard . PHP_EOL);
                $playerCardCount++;
                $this->gameDelayer->delay(1);
            }
        }
        $this->logger->log(PHP_EOL);
    }
}
