<?php

require 'autoload.php';

$logger = new StandardOutLogger();

$configuration = new Configuration($logger);

$factory = new Factory($configuration);

$game = $factory->createGame();

$game->playGame();
