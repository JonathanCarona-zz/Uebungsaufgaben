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
            throw new Exception(sprintf('The radius "%s" cannot be lower or be zero long.', $radius));
        }
        $this->radius = $radius;

    }


    public function getPerimeter(): float
    {
        $this->perimeter = $this->radius * 2 * pi();
        return $this->perimeter;
    }


    public function getDiagonal(): float
    {
        $this->diagonal = $this->radius * 2;
        return $this->diagonal;
    }


    public function getArea(): float
    {
        $this->area = pow($this->radius, 2) * pi();
        return $this->area;
    }




}
