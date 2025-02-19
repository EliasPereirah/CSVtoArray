<?php
require_once __DIR__ . "/vendor/autoload.php";
$HandleCSV = new \App\HandleCSV();
$csv_path = __DIR__ . '/data.csv';
$arr = $HandleCSV->toArray($csv_path, true);
echo "<pre>";
print_r($arr);

?>



