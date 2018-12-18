<?php
include ('autoload.php');


$factory = new Factory();
$tool = $factory->createTool();

if (isset($_POST) && $_POST != null) {
    $record = $factory->createRecord($_POST, $tool);
    $record->addRecord();
}

$tool->getDom()->load('books.xml');
$tool->getXsl()->load('createXSL.xsl');
$tool->getProc()->importStylesheet($tool->getXsl());
echo $tool->getProc()->transformToXml($tool->getDom());


?>
