<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers FileLogger
 */
class FileLoggerTest extends TestCase
{
    /** @var FileLogger */
    private $fileLogger;
    /** @var string */
    private $pathToLogfile;

    protected function setUp()
    {
        $this->pathToLogfile = '/tmp/unittest-filelogger.txt';
        $this->fileLogger = new FileLogger($this->pathToLogfile);
    }

    public function testCanBeLogged(): void
    {
        $this->fileLogger->log('Hallo');
        $this->assertSame('Hallo', file_get_contents($this->pathToLogfile));
    }

    public function tearDown()
    {
        unlink($this->pathToLogfile);
    }
}
