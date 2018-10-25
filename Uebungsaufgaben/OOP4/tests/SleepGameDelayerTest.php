<?php


use PHPUnit\Framework\TestCase;

class SleepGameDelayerTest extends TestCase
{
    /** @var SleepGameDelayer */
    private $sleepGameDelayer;

    protected function setUp()
    {
        $this->sleepGameDelayer = new SleepGameDelayer();
    }

    public function testDelay()
    {
        $time_pre = microtime(true);
        $this->sleepGameDelayer->delay(3);
        $time_post = microtime(true);
        $exec_time = $time_post - $time_pre;
        $isOver3Seconds = ($exec_time >= 3) ? true : false;

        $this->assertEquals(true, $isOver3Seconds);
    }
}
