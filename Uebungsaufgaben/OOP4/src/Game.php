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
    /** @var Dice */
    private $dice;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(Configuration $configuration, LoggerInterface $logger)
    {
        $this->configuration = $configuration;
        $this->applyConfiguration();
        $this->dice = new Dice($configuration);
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
        for ($i = 0; $i < count($this->players); $i++) {
            $player = $this->players[$i];
            $this->shuffleCards($player);
            sleep(1);
        }


        for ($i = 0; $i < count($this->players); $i++) {
            /** @var Player $player */
            $player = $this->players[$i];
            $colorDice = $this->dice->roll();
            echo 'The dice color is ' . $colorDice . PHP_EOL;
            /** @var array | Card $playerCards */
            $playerCards = $player->getCards();
            for ($ii = 0; $ii < count($playerCards); $ii++) {
                /** @var Card $playerCard */
                $playerCard = $playerCards[$ii];
                $player->flipEqualColorCard($playerCard, $colorDice);
                if ($playerCard->getIsCovered()) {
                    echo $player->getName() . '`s ' . $playerCard . ' is covered' . PHP_EOL;
                } else {
                    echo $player->getName() . '`s ' . $playerCard . ' is still active' . PHP_EOL;
                }
                sleep(1);
            }

            if ($player->checkIfAllCardsAreFlipped()) {
                echo $player->getName() . ' has won the game';
                exit();
            }

            echo PHP_EOL;


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
        }
        echo PHP_EOL;
    }

}