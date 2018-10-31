<?php


class Configuration
{

    /** @var int */
    private $confNumberOfCards;
    /** @var array */
    private $colors = array();
    /** @var LoggerInterface */
    private $logger;
    /** @var array */
    private $iniFileSettings = array();
    /** @var array */
    private $players;

    public function __construct(LoggerInterface $logger, IniFileParser $iniFileParser)
    {
        $this->logger = $logger;
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
        $this->colors = $this->iniFileSettings['colors'];
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


    public function getColors(): array
    {
        return $this->colors;
    }
}
