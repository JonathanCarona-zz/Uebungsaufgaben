<?php
include ("Searchresult.php");
include("Record.php");
include("Factory.php");
include("Tool.php");

$factory = new Factory();
$tool = new Tool($factory);


$searchArray = array($_POST);
$newSearch = $factory->createSearchResult($searchArray, $tool);
$newSearch->showResult();
?>
