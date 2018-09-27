<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers StandardOutLogger
 */
class StandardOutLoggerTest extends TestCase
{
    /** @var StandardOutLogger */
    private $standardOutLogger;

    protected function setUp()
    {
        $this->standardOutLogger = new StandardOutLogger();
    }

    public function testLog()
    {
        $this->expectOutputString('Hallo');
        $this->standardOutLogger->log('Hallo');
    }

}
