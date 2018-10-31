<?php


class Configuration
{

    /** @var int */
    private $confNumberOfCards;
    /** @var array */
    private $possibleColors = array();
    /** @var LoggerInterface */
    private $logger;
    /** @var array */
    private $iniFileSettings = array();
    /** @var IniFileParser  */
    private $IniFileParser;
    /** @var array */
    private $players;

    public function __construct(LoggerInterface $logger, IniFileParser $iniFileParser)
    {
        $this->logger = $logger;
        $this->IniFileParser = $iniFileParser;
        $this->iniFileSettings = $iniFileParser->parse();
        $this->applyIniSettings();
    }

    private function applyIniSettings(): void
    {
        $numberOfColors = count($this->iniFileSettings['colors']);
        $numberOfCards = $this->iniFileSettings['cards']['numberOfCards'];
        if (($numberOfColors < $numberOfCards) || ($numberOfCards <= 0))  {
            throw new Exception('The number of colors must be equal or greater than the number of cards.');
        }

        $this->players = $this->iniFileSettings['players'];
        $this->confNumberOfCards = $this->iniFileSettings['cards']['numberOfCards'];
        $this->possibleColors = $this->iniFileSettings['colors'];
    }

    public function getIniFileSettings(): array
    {
        return $this->iniFileSettings;
    }

    public function getConfNumberOfCards(): int
    {
        return $this->confNumberOfCards;
    }

    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    public function getPlayers(): array
    {
        return $this->players;
    }


    public function getPossibleColors(): array
    {
        return $this->possibleColors;
    }
}
