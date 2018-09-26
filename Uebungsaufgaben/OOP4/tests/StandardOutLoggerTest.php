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

    public function testLog() {
        ob_start();
        $this->standardOutLogger->log('Hallo');
        $content = ob_get_contents();
        ob_end_clean();
        $this->assertSame('Hallo', $content);
    }

}
