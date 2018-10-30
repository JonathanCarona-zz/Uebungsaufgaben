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

    public function testCanBeLogged()
    {
        $this->expectOutputString('Hallo'. PHP_EOL);
        $this->standardOutLogger->log('Hallo');
    }
}
