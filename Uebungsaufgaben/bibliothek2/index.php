<?php
include ("Searchresult.php");
include("Record.php");
include("Factory.php");

$factory = new Factory();

$dom = $factory->createDOMDocument();
$dom->load('books.xml');

$xsl = $factory->createDOMDocument();
$xsl->load('booksXSL.xsl');

$proc = $factory->createXSLProc();
$proc->importStylesheet($xsl);

$xpath = $factory->createXPATH($dom);

$searchArray = array($_POST);
$newSearch = new Searchresult($searchArray);
$newSearch->showResult();
?>
