<?php


class Configuration
{

    /** @var int */
    private $confNumberOfCards;
    /** @var array */
    private $confPossibleColors = array();
    /** @var LoggerInterface */
    private $logger;
    /** @var array */
    private $iniFileSettings = array();
    /**
     * @var IniFileParser
     */
    private $iniFileParser;
    /** @var array */
    private $possibleColors;

    public function __construct(LoggerInterface $logger, IniFileParser $iniFileParser)
    {
        $this->logger = $logger;
        $this->iniFileParser = $iniFileParser;
        $this->iniFileSettings = $this->iniFileParser->parse();
        $this->applyIniSettings();
    }

    private function applyIniSettings(): void
    {
        if (count($this->iniFileSettings['colors']) >= $this->iniFileSettings['cards']['numberOfCards'])  {
            $this->confNumberOfCards = $this->iniFileSettings['cards']['numberOfCards'];
        } else {
            throw new Exception('The number of colors must be equal or greater than the number of cards.');
        }
        $this->confPossibleColors = $this->iniFileSettings['colors'];
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


    public function getStringPossibleColors(): array
    {
        return $this->confPossibleColors;
    }

    public function getPathToLogfile(): string
    {
        return '/tmp/logfile.txt';
    }


    public function addToPossibleColors(array $colors): void {
        $this->possibleColors = $colors;
    }


    public function getPossibleColors(): array
    {
        return $this->possibleColors;
    }
}
