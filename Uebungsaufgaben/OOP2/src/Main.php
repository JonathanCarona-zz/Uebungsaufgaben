<?php

require 'Author.php';
require 'Email.php';
require 'Book.php';

$stephenKingMail = new Email('StephenKing@example.com');
$stephenKing = new Author('King', 'Stephen', $stephenKingMail);
$book = new Book("Irgendein Book", $stephenKing, 2019, 300, 'Sci-Fi');

echo $book->getReleaseYear();
