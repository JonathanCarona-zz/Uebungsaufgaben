<?php


$counter = 1;
$domDocument = new DOMDocument('1.0', "UTF-8");
$domDocument->load('product.xml');
$elements = $domDocument->getElementsByTagName('*');

foreach ($elements as $child) {
    $child->setAttribute('visited', $counter++);
}

print $domDocument->saveXML();

$dom = new DOMDocument();
$dom->loadXML('<?xml version="1.0" ?><product />');
$productElement = $dom->getElementsByTagName('product');
$productElement->item(0)->setAttribute('sku', 123456);
$descriptionElement = $dom->createElement('description');
$descriptionAttribute = $dom->createAttribute('type');
$descriptionElement->appendChild($descriptionAttribute);
$descriptionElement->appendChild($dom->createElement('flotest'));
$descriptionElement->setAttribute('type', 'short');
$dom->appendChild($descriptionElement);
$productElement->item(0)->appendChild($descriptionElement);
print $dom->saveXML();


echo '================'.PHP_EOL;

//// Aufgabe 1.5
$secondDom = new DOMDocument();
$secondDom->load('product.xml');
$descriptionElement = $secondDom->importNode($descriptionElement, true);
$secondDom->getElementsByTagName('product')->item(0)->appendChild($descriptionElement);
print $secondDom->saveXML();


// Aufgabe 1.6
$nsDom = new DOMDocument();
$nsDom->load('productNS.xml');
$nsDom->isDefaultNamespace('http://competec.ch/product');
$descriptionElement = $nsDom->importNode($descriptionElement);
$nsDom->getElementsByTagName('product')->item(0)->appendChild($descriptionElement);
print $nsDom->saveXML();
