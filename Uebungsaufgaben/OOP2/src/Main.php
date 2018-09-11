<?php

require 'Autor.php';
require 'Email.php';

$stephenKingMail = new Email('StephenKing@example.com');
$stephenKing = new Autor('King', 'Stephen');

echo $stephenKing->getName() . PHP_EOL;
echo $stephenKing->getVorName() . PHP_EOL;
echo $stephenKing->getEmail() . PHP_EOL;

echo $stephenKing;