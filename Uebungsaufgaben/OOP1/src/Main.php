<?php

require 'autoload.php';

/**
 * TODO:
 * - Einfache Hochkommas x
 * - Überlegen welche Werte für Person Pflichtfelder sind => Konstruktor. Optional => Setter
 * - Typen deklarieren in Methodenparametern x
 * - Umbrüche x
 * - Properties annotieren mit Docblocks + Typ x
 * - Return Type Declarations x
 * - Englisch x
 * - Kein echo. Rückgabewert überlegen x
 * - GetAge. Algorithmus überdenken.
 * - GetBirthday: DateTime Objekt zurückgeben x
 */



$date = DateTime::createFromFormat("Y-m-d", "2017-05-19");

$zip = new Zip(5702);

$phoneNumber = new Phonenumber('0765163971');
$jonathan = new Person("Carona", "Jonathan", "Boellistrasse 11", $zip, "Niederlenz", $date, $phoneNumber, "Tuerkis");


echo $jonathan->getWholeName() . PHP_EOL;
echo $jonathan->getWholeAddress() . PHP_EOL;
echo $jonathan->getAge() . PHP_EOL;
echo $jonathan->askforNumber() . PHP_EOL;
echo $jonathan->getTelefonnumber() . PHP_EOL;
echo $jonathan->getFavoriteColor() . PHP_EOL;
var_dump($jonathan->getBirthday());