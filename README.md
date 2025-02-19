## CSVtoArray

- English:

This script converts CSV files to PHP arrays.
If the CSV has headers, set the second parameter of the toArray method to true so that each
value in the array is associated with its respective header column.

         I haven't tested this script much, there may be bugs.

- Português: 

Este script converte arquivos CSV em arrays PHP. 
Se o CSV possuir cabeçalhos, defina o segundo parâmetro do método toArray como true para que cada 
valor do array seja associado à sua respectiva coluna do cabeçalho. 
       
          Eu não testei muito este script, pode haver bugs.


- PHP

```php
<?php
// example
require_once __DIR__ . "/vendor/autoload.php";
$HandleCSV = new \App\HandleCSV();
$csv_path = __DIR__ . '/data.csv';
$ignoreColumns = []; // ex: [1, 5, 6]; if you want to ignore columns at position 1, 5 and 6
$arr = $HandleCSV->csvToArray($csv_path, true, $ignoreColumns);
echo "<pre>";
print_r($arr);

// $csv = $HandleCSV->arrayToCSV($arr); // You can also convert un array to CSV
// echo $csv;
?>
```
Expected output
```HTML
Array
(
    [0] => Array
        (
            [data] => 18.02.2025
            [ultimo] => 131.090
            [abertura] => 131.300
            [maxima] => 131.600
            [minima] => 130.300
            [vol] => 9,18M
            [var] => 0,13%
        )

    [1] => Array
        (
            [data] => 17.02.2025
            [ultimo] => 130.921 ...
```
