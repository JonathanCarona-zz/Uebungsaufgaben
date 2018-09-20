<?php


class Square extends Rectangle implements Figure
{
    public function __construct(float $side)
    {
        parent::__construct($side, $side);
    }
}
