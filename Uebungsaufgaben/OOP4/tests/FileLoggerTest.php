<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers FileLogger
 */
class FileLoggerTest extends TestCase
{
    /** @var FileLogger */
    private $fileLogger;

    protected function setUp()
    {
        $this->fileLogger = new FileLogger();
    }

    public function testLog() {
        file_put_contents('/tmp/logfile.txt', '');
        $this->fileLogger->log('Hallo');
        $this->assertSame('Hallo', file_get_contents('/tmp/logfile.txt'));
    }
}
