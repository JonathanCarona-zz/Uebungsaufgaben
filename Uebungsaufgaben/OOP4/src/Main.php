<?php

require 'autoload.php';


$logger = new StandardOutLogger();
$iniFileParser = new IniFileParser('configuration.ini');
$configuration = new Configuration($logger, $iniFileParser);
$factory = new Factory($configuration);
$game = $factory->createGame();


$game->playGame();
