<?php
namespace App;
use Cocur\Slugify\Slugify;
class HandleCSV
{
    private Slugify $Slugify;
    public function __construct()
    {
        $this->Slugify = new Slugify();
    }
    public function csvToArray(string $file_path, $has_headers = false, $ignore_columns = []):array
    {
        $data = [];
        $handle = fopen($file_path, 'r');
        if($has_headers){
            $headers = fgetcsv($handle, 1000, ',');
        }
        while (($linha = fgetcsv($handle, 1000, ',')) !== false) {
            if (empty(array_filter($linha))) {
                continue;
            }

            $line_data = [];
            if($has_headers){
                foreach ($headers as $key => $h_name) {
                    if(in_array($key, $ignore_columns)){
                        // column will be ignored
                        continue;
                    }
                    $h_name = $this->Slugify->slugify($h_name);
                    $item = $linha[$key] ?? '';
                    $line_data[$h_name] = $item;
                }
            }else{
                $idx = 0;
                while (isset($linha[$idx])) {
                    if(in_array($idx, $ignore_columns)){
                        // column will be ignored
                        $idx++;
                        continue;
                    }
                    $line_data[] = $linha[$idx];
                    $idx++;
                }
            }
            $data[] = $line_data;
        }
        fclose($handle);
        return $data;
    }

    public function arrayToCSV(array $arr):string{
        $csv_string = '';
        foreach ($arr as $lines){
            $the_line ='';
            foreach ($lines as $line){
                if(str_contains($line, ',')){
                    $line = "\"$line\"";
                }
                $the_line .= "$line,";
            }
            $the_line = rtrim($the_line, ",");
            $csv_string .= $the_line."\r";
        }
        $csv_string = trim($csv_string);
        return $csv_string;
    }


}
