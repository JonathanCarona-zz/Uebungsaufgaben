<?php

// Aufgabe 1
$dom = new DOMDocument();
$dom->load('productNS.xml');

$xpath = new DOMXPath($dom);

$xpath->registerNamespace('a', 'http://competec.ch/product');

$elements = $xpath->query('/a:product/a:description');

//foreach ($elements as $element) {
//    echo $element->nodeName . PHP_EOL;
//}


// Aufgabe 2

//$a2Elements = $xpath->query("/a:product/a:description | /a:product[@sku=12345 and @name='Projektor']");
//foreach ($a2Elements as $a2Element) {
//    echo $a2Element->nodeName . PHP_EOL;
//}


// Aufgabe 3

//$a3Elements = $xpath->query("/a:product/a:description[@type='short']");
//foreach ($a3Elements as $a3Element) {
//    echo $a3Element->nodeName . PHP_EOL;
//}

// Aufgabe 4
//
//$a4Elements = $xpath->query("/a:product/a:description[1]/@type");
//
//foreach ($a4Elements as $a4Element) {
//    echo $a4Element->nodeName . PHP_EOL;
//}

// Aufgabe 5
$domComp = new DOMDocument();
$domComp->load('competec.xml');
$xpathComp = new DOMXPath($domComp);
$xpathComp->registerNamespace('a','http://competec.ch/product');


//$highestElement = $xpathComp->query("/a:product/a:prices/a:price
//[not(@value<= preceding-sibling::a:price/@value)
//and not(@value <=following-sibling::a:price/@value)]");
//
//$lowestElement = $xpathComp->query("/a:product/a:prices/a:price
//[not(@value>= preceding-sibling::a:price/@value)
//and not(@value >=following-sibling::a:price/@value)]|@class");
///** @var DOMElement $element */
//foreach ($highestElement as $element) {
//    echo $element->getAttribute('class') . PHP_EOL;
//    echo $element->getAttribute('value') . PHP_EOL;
//
//}
//
//foreach ($lowestElement as $element) {
//    echo $element->getAttribute('class') . PHP_EOL;
//    echo $element->getAttribute('value') . PHP_EOL;
//
//}

// Aufgabe 6

//$a6Elements = $xpathComp->query("/a:product/a:prices/a:price[@value]");
//$sum = 0;
///** @var DOMElement $a6Element */
//foreach ($a6Elements as $a6Element) {
//    $sum += (int) $a6Element->getAttribute('value');
//}
//
//echo $sum;



// Aufgabe 7

//$xpathComp->registerNamespace('i','http://competec.ch/images');
//$a7Elements = $xpathComp->query("/a:product/i:images/i:image/i:size[@src]");
//
///** @var DOMElement $element */
//foreach ($a7Elements as $element) {
//    echo $element->getAttribute('src') . PHP_EOL;
//}


