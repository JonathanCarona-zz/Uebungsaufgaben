<?php


class Rectangle implements Figure
{
    /** @var float */
    private $sideA;
    /** @var float */
    private $sideB;
    /** @var float */
    private $perimeter;
    /** @var float */
    private $diagonal;
    /** @var float */
    private $area;


    public function __construct(float $sideA, float $sideB)
    {
        if ($sideA <= 0) {
            throw new Exception(sprintf('The side A "%s" cannot be lower or be zero long.', $sideA));
        } elseif ($sideB <= 0) {
            throw new Exception(sprintf('The side B "%s" cannot be lower or be zero long.', $sideB));
        }
        $this->sideA = $sideA;
        $this->sideB = $sideB;
    }

    public function getPerimeter(): float
    {
        $this->perimeter = ($this->sideA + $this->sideB) * 2;
        return $this->perimeter;
    }

    public function getDiagonal(): float
    {
        $this->diagonal = sqrt(pow($this->sideA, 2) + pow($this->sideB, 2));
        return $this->diagonal;
    }

    public function getArea(): float
    {
        $this->area = $this->sideA * $this->sideB;
        return $this->area;
    }


    public function getSideA(): float
    {
        return $this->sideA;
    }

    public function getSideB(): float
    {
        return $this->sideB;
    }


}
