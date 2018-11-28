<?php


class StandardOutLogger implements LoggerInterface
{
    public function log(string $message): void
    {
        echo $message . PHP_EOL;
    }
}
