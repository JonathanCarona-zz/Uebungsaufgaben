<?php
$iniArray = parse_ini_file('configuration.ini', true);

$players = $iniArray['players'];

echo $players['alice'];
