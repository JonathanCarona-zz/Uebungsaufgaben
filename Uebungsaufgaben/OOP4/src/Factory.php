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

    private function createFileLogger(): FileLogger
    {
        return new FileLogger($this->configuration->getPathToLogfile());
    }

    private function createStandardOutLogger(): StandardOutLogger
    {
        return new StandardOutLogger();
    }

    private function createDice(): Dice
    {
        return new Dice($this->configuration);
    }

    public function createGame(): Game
    {
        return new Game($this->configuration, $this->createDice(), $this->createSleepGameDelayer());
    }

    public function createSleepGameDelayer(): SleepGameDelayer
    {
        return new SleepGameDelayer();
    }
}
