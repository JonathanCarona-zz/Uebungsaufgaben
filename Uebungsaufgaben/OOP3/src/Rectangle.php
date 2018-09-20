<?php


class Rectangle implements Figure
{
    /** @var float */
    private $side_A;
    /** @var float */
    private $side_B;
    /** @var float */
    private $perimeter;
    /** @var float */
    private $diagonal;
    /** @var float */
    private $area;


    public function __construct(float $side_A, float $side_B)
    {
        if ($side_A <= 0 || $side_B <= 0) {
            throw new Exception('The sides cannot be lower or be zero long.');
        }
        $this->side_A = $side_A;
        $this->side_B = $side_B;
        $this->perimeter = ($side_A + $side_B) * 2;
        $this->diagonal = sqrt(pow($side_A, 2) + pow($side_B, 2));
        $this->area = $side_A * $side_B;
    }

    public function getPerimeter(): float
    {
        return $this->perimeter;
    }

    public function getDiagonal(): float
    {
        return $this->diagonal;
    }

    public function getArea(): float
    {
        return $this->area;
    }
}
