<?php


use PHPUnit\Framework\TestCase;


/**
 * @covers Game
 */
class GameTest extends TestCase
{
    /** @var Game */
    private $game;
    /** @var Configuration */
    private $configuration;
    /** @var StandardOutLogger */
    private $logger;
    /** @var Dice */
    private $dice;

    protected function setUp()
    {
        $this->configuration = $this->createMock(Configuration::class);
        $this->logger = $this->createMock(StandardOutLogger::class);
        $this->dice = $this->createMock(Dice::class);
        $this->game = new Game($this->configuration, $this->logger, $this->dice);
    }




}
