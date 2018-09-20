<?php


class Circle implements Figure
{
    /** @var float */
    private $radius;
    /** @var float */
    private $perimeter;
    /** @var float */
    private $diagonal;
    /** @var float */
    private $area;

    public function __construct(float $radius)
    {
        if ($radius <= 0) {
            throw new Exception('The radius cannot be lower or be zero long.');
        }
        $this->radius = $radius;
        $this->perimeter = $radius * 2 * pi();
        $this->diagonal = $radius * 2;
        $this->area = pow($radius, 2) * pi();
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
