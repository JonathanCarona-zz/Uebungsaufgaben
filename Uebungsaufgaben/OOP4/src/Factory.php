<?php


class Factory
{
    /**
     * @var Configuration
     */
    private $configuration;

    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    private function createDice(): Dice
    {
        return new Dice($this->configuration);
    }

    public function createGame(): Game
    {
        return new Game($this->configuration, $this->createDice(), $this->createSleepGameDelayer(), $this->createPlayersFromIniFile($this->configuration->getLogger()), $this);
    }

    private function createSleepGameDelayer(): SleepGameDelayer
    {
        return new SleepGameDelayer();
    }


    private function createPlayersFromIniFile(LoggerInterface $logger): array
    {
        $playerArray = array();
        $playerNamesArray = $this->configuration->getIniFileSettings()['players'];
        foreach ($playerNamesArray as $playerName) {
            $playerArray[] = new Player($playerName, $logger);
        }
        return $playerArray;
    }

    public function createColor(String $color, Configuration $configuration): Color {
        return new Color($color, $configuration);
    }

    public function createCard(Color $color): Card {
        return new Card($color);
    }
}
