<?php
include "autoload.php";

$factory = new Factory();


$tmpArray = array(
    array(
        'searchAuthor' => 'Another One'
    )
);


$searchArray = array($_POST);
$newSearch = $factory->createSearchResult($searchArray, $factory->createTool());
$newSearch->showResult();

