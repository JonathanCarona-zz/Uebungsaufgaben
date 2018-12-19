<?php
include "autoload.php";

$factory = new Factory();
$renderer = $factory->createRenderer();

$request = $factory->createRequest($_POST);
$newSearch = $factory->createSearchResult($request, $factory->createTool());
$renderer->render($newSearch->findResult($renderer->getProc()));

