<?php

require 'Autor.php';
require 'Email.php';
require 'Buch.php';

$stephenKingMail = new Email('StephenKing@example.com');
$stephenKing = new Autor('King', 'Stephen', $stephenKingMail);
$book = new Buch("Irgendein Buch", $stephenKing, 1990, 300, 'Sci-Fi');

echo $book->getAutor()->getEmail();