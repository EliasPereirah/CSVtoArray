<?php
require_once __DIR__."/vendor/autoload.php";
$csv_path = __DIR__ . '/data.csv';
$HandleCSV = new \App\HandleCSV();

$arr = $HandleCSV->toArray($csv_path, true);
echo "<pre>";
print_r($arr);