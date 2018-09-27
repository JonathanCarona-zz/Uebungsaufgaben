<?php

require 'autoload.php';


$logger = new StandardOutLogger();
$fileLogger = new FileLogger();

$Alice = new Player('Alice');
$Bob = new Player('Bob');
$Carol = new Player('Carol');

$red = new Color('Red');
$green = new Color('Green');
$yellow = new Color('Yellow');
$blue = new Color('Blue');

$playerArray = array($Alice, $Bob, $Carol);
$colorArray = array($red, $green, $yellow, $blue);

$configuration = new Configuration(2, $playerArray, $colorArray);
$dice = new Dice($configuration);

$game = new Game($configuration, $logger, $dice);

$game->playGame();
