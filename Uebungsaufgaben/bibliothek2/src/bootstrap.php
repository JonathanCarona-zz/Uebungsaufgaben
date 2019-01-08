<?php
include("autoload.php");


$factory = new Factory();

$tool = $factory->createTool();
$request = $factory->createRequest($_POST, $_SERVER);
$renderer = $factory->createRenderer($tool->getXSLTProcessor());
$router = $factory->createRouter();


$page = $router->route($request, $tool);
echo $renderer->render($page);

