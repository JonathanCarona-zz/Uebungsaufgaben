<?php


class Factory
{
    /**
     * @var Configuration
     */
    private $configuration;

    public function __construct (Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function createDice(): Dice
    {
        return new Dice($this->configuration);
    }

    public function createFileLogger(): FileLogger
    {
        return new FileLogger();
    }

    public function createStandardOutLogger(): StandardOutLogger
    {
        return new StandardOutLogger();
    }

    public function createGame(): Game
    {
        return new Game($this->configuration, $this->createStandardOutLogger(), $this->createDice());
    }
}
