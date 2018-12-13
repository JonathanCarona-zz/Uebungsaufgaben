<?php


$test = 'Jonathan';

$query = 'SELECT * FROM users WHERE username =' .$test;

$query->bind('username', $test);

//$db->execute($query);

echo $query.'<br />';

echo "My name is $test";
