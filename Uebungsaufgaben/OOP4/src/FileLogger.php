<?php


class FileLogger implements LoggerInterface
{

    /**
     * @var string
     */
    private $pathToLogfile;

    public function __construct(string $pathToLogfile)
    {
        $this->pathToLogfile = $pathToLogfile;
    }

    public function log(string $message): void
    {
        //TODO: Pfad als Dependency
        file_put_contents($this->pathToLogfile, $message, FILE_APPEND);
    }
}
