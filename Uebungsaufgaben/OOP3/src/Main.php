<?php

require 'autoload.php';

$mySquare = new Square(5);
$mySquare->getPerimeter();

echo $mySquare->getArea() . PHP_EOL;
echo $mySquare->getDiagonal() . PHP_EOL;
echo $mySquare->getPerimeter() . PHP_EOL;


$circle = new Circle(1337);

$rectangle = new Rectangle(32, 42);

$calculator = new FigureCalculator();

echo $calculator->addAreas($circle, $mySquare);

$square2 = new Square(42);

echo $calculator->addAreaForRectangleAndSquare($square2, $mySquare);



$camelCaseIsFun = 'foo';
$snake_case_is_fun = 'bar';
$UPPERCASE_FOO = 'bar';
