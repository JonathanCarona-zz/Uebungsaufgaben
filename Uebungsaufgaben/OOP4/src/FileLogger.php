<?php


class FileLogger implements LoggerInterface
{

    public function log(string $message): void
    {
        file_put_contents('/tmp/logfile.txt', $message, FILE_APPEND);
    }
}
