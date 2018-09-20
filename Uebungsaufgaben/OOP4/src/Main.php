<?php

require 'autoload.php';

$Alice = new Player('Alice');
$Bob = new Player('Bob');
$Carol = new Player('Carol');

$red = new Color('Red');
$green = new Color('Green');
$yellow = new Color('Yellow');
$blue = new Color('Blue');

$playerArray = array($Alice, $Bob, $Carol);
$colorArray = array($red, $green, $yellow, $blue);

$configuration = new Configuration(5, $playerArray, $colorArray);

$game = new Game($configuration);

$game->playGame();
