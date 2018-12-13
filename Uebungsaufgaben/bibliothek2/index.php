<?php

$dom = new DOMDocument();
$dom->load('books.xml');
$xsl = new DOMDocument();
$xsl->load('testXSL.xsl');
$proc = new XSLTProcessor();
$proc->importStylesheet($xsl);
$xpath = new DOMXPath($dom);

echo $proc->transformToXml($dom);


?>
