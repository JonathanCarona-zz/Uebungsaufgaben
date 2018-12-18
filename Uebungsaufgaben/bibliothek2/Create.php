<?php
include("Factory.php");
include("Record.php");

$factory = new Factory();

$dom = $factory->createDOMDocument();
$dom->load('books.xml');

$xsl = $factory->createDOMDocument();
$xsl->load('createXSL.xsl');

$proc = $factory->createXSLProc();
$proc->importStylesheet($xsl);
echo $proc->transformToXml($dom);


?>
