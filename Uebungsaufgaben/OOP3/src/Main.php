<?php

require 'autoload.php';

$mySquare = new Square(5);
$mySquare->getPerimeter();

echo $mySquare->getArea() . PHP_EOL;
echo $mySquare->getDiagonal() . PHP_EOL;
echo $mySquare->getPerimeter() . PHP_EOL;


