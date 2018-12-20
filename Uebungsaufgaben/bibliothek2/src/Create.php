<?php
include ('autoload.php');


$factory = new Factory();
$tool = $factory->createTool();
$renderer = $factory->createRenderer($tool->getXSLTProcessor());
$request = $factory->createRequest($_POST);


if ($request->receivedRequest()) {

    var_dump($request->receivedRequest());
    echo "<h1> HIT </h1>";
    $record = $factory->createRecordCreator($request, $tool);
    $record->addRecord();
}

$tool->getXsl()->load('createXSL.xsl');
$renderer->getProc()->importStylesheet($tool->getXsl());
echo $renderer->render($tool->getDom());
