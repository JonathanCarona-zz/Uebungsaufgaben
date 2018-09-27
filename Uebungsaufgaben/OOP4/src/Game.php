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

    public function __construct(Configuration $configuration, LoggerInterface $logger)
    {
        $this->configuration = $configuration;
        $this->applyConfiguration();
        $this->logger = $logger;
    }

    private function applyConfiguration(): void
    {
        $this->numberOfCards = $this->configuration->getConfNumberOfCards();
        $this->numberOfPlayers = $this->configuration->getConfNumberOfPlayers();
        $this->players = $this->configuration->getConfPlayers();
    }

    public function playGame(): void
    {
        foreach ($this->players as $this->player) {
            $this->shuffleCards($this->player);
        }
        while(!$this->gameOver) {
            foreach ($this->players as $this->player) {
                $this->player->makeTurn($this->configuration);
                if ($this->player->hasWon()) {
                    $this->gameOver = true;
                    break;
                }
            }
        }
    }


    private function shuffleCards(Player $player): void
    {
        $possibleColors = $this->configuration->getConfPossibleColors();
        for ($i = 0; $i < $this->numberOfCards; $i++) {
            $intCardColor = rand(0, count($possibleColors) - 1);
            $cardColor = $possibleColors[$intCardColor];
            $shuffleCard = new Card($cardColor);
            $player->addToCards($shuffleCard);
            $this->logger->log($player->getName() . ' gets a ' . $shuffleCard . PHP_EOL);
            sleep(1);
        }
        echo PHP_EOL;
    }
}
