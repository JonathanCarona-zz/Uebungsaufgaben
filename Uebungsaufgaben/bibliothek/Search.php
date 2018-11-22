<?php
$dom = new DOMDocument();
$dom->load('books.xml');
$xsl = new DOMDocument();
$xsl->load('booksXSL.xsl');

$proc = new XSLTProcessor();
$proc->importStylesheet($xsl);
$xpath = new DOMXPath($dom);


    $search = 'Maeve Ascendant';
$elements = $xpath->query("/catalog/book[title=" . "'$search'" . "]");
var_dump($elements);
print $dom->saveXML();





