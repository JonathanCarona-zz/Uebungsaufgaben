<?php
include "autoload.php";

$factory = new Factory();
$tool = $factory->createTool();
$renderer = $factory->createRenderer($tool->getXSLTProcessor());

$request = $factory->createRequest($_POST);
$newSearch = $factory->createSearchResult($request, $tool);
echo $renderer->render($newSearch->findResult());

