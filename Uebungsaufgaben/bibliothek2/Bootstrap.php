<?php
include 'Searchresult.php';

$form = $_POST['searchForm'];


if ($form === "search") {
    $searchArray = array($_POST);
    $newSearch = new Searchresult($searchArray);
    $newSearch->showResult();
}
