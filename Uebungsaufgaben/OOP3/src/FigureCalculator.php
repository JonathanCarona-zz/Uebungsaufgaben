<?php


class FigureCalculator
{
    public function addAreas(Figure $figureA, Figure $figureB): float
    {
        return $figureA->getArea() + $figureB->getArea();
    }

    public function addAreaForRectangleAndSquare(Rectangle $rectangle, Square $square): float
    {
        return $rectangle->getArea() + $square->getArea();
    }
}
