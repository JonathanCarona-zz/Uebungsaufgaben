<?php


class Square extends Rectangle
{
    public function __construct(float $side)
    {
        parent::__construct($side, $side);
    }

    public function getDiagonal(): float
    {
        return $this->getSideA() * sqrt(2);
    }


}
