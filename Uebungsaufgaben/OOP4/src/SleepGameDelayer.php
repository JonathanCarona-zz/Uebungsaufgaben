<?php


class SleepGameDelayer implements GameDelayerInterface
{

    public function delay(int $seconds)
    {
        sleep($seconds);
    }
}
