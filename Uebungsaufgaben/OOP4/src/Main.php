<?php

require 'autoload.php';


$logger = new StandardOutLogger();
$fileLogger = new FileLogger();

$Alice = new Player('Alice', $logger);
$Bob = new Player('Bob', $logger);
$Carol = new Player('Carol', $logger);

$red = new Color('Red');
$green = new Color('Green');
$yellow = new Color('Yellow');
$blue = new Color('Blue');

$playerArray = array($Alice, $Bob, $Carol);
$colorArray = array($red, $green, $yellow, $blue);

$configuration = new Configuration(2, $playerArray, $colorArray);

$game = new Game($configuration, $logger);

$game->playGame();
