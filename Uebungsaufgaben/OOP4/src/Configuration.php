<?php


class Configuration
{

    /** @var int */
    private $confNumberOfCards;
    /** @var int */
    private $confNumberOfPlayers;
    /** @var array */
    private $confPlayers = array();
    /** @var array */
    private $confPossibleColors = array();
    /** @var LoggerInterface */
    private $logger;
    /** @var array */
    private $iniFileSettings;

    public function __construct($logger)
    {
        $this->logger = $logger;
        $this->iniFileSettings = parse_ini_file('configuration.ini', true);
        $this->applyIniSettings();
        $this->confNumberOfPlayers = count($this->confPlayers);
    }

    private function applyIniSettings()
    {
        $this->createPlayersFromIniFile();
        $this->createColorsFromIniFile();
        $this->confNumberOfCards = $this->iniFileSettings['cards']['numberOfCards'];
    }

    private function createPlayersFromIniFile(): void
    {
        $playerNamesArray = $this->iniFileSettings['players'];
        foreach ($playerNamesArray as $playerName) {
            $this->confPlayers[] = new Player($playerName, $this->logger);
        }
    }

    private function createColorsFromIniFile(): void
    {
        $colorArray = $this->iniFileSettings['colors'];
        foreach ($colorArray as $color) {
            $this->confPossibleColors[] = new Color($color);
        }
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

    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }


    public function getConfPossibleColors(): array
    {
        return $this->confPossibleColors;
    }

    public function getPathToLogfile(): string
    {
        return '/tmp/logfile.txt';
    }
}
