<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers FileLogger
 */
class FileLoggerTest extends TestCase
{
    /** @var FileLogger */
    private $fileLogger;

    private $pathToLogfile;

    protected function setUp()
    {
        $this->pathToLogfile = '/tmp/unittest-filelogger.txt';

        $this->fileLogger = new FileLogger($this->pathToLogfile);

        file_put_contents($this->pathToLogfile, '');
    }

    public function testLog() {

        $this->fileLogger->log('Hallo');
        $this->assertSame('Hallo', file_get_contents($this->pathToLogfile));
    }

    public function tearDown()
    {
        unlink($this->pathToLogfile);
    }
}
