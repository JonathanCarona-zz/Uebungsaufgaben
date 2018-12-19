<?php
include ('autoload.php');


$factory = new Factory();
$tool = $factory->createTool();
$renderer = $factory->createRenderer();
$request = $factory->createRequest($_POST);


if ($request->getArrayRequest() != null) {
    $record = $factory->createRecordCreator($request, $tool);
    $record->addRecord();
}

$tool->getDom()->load('books.xml');
$tool->getXsl()->load('createXSL.xsl');

$renderer->getProc()->importStylesheet($tool->getXsl());
$renderer->render($tool->getDom());

