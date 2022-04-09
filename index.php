<?php
$file=$_GET['file'] or die("Parameter get required with url of csv file");
$format=$_GET['format']  or die("Parameter format required");;
$csv= file_get_contents($file) or die("Please check url");
if($format=='json'){
    print_r(csvToJson($csv));
    header('Content-Type: Application/json');
}
else if($format=='xml'){
    csvToXML($csv);
}
else if($format=='array'){
    csvToArray($csv);
}
else{
    echo "invalid format";
}

function csvToJson($csv) {
    $rows = explode("\n", trim($csv));
    $data = array_slice($rows, 1);
    $keys = array_fill(0, count($data), $rows[0]);
    $json = array_map(function ($row, $key) {
        return array_combine(str_getcsv($key), str_getcsv($row));
    }, $data, $keys);
    return json_encode($json);
}


function csvToArray($csv){
   $json= csvToJson($csv);
   $data = json_decode($json, TRUE);
   print_r($data);
}

function csvToXML($csv){
   $json= csvToJson($csv);

   $array = json_decode($json, true);

   ob_clean(); //Clean (erase) the output buffer
  
   print_r(array2xml($array));
   
   header('Content-type: text/xml');
   
}

function array2xml($array, $xml = false){
    if($xml === false){
        $xml = new SimpleXMLElement('<root/>');
    }
    foreach($array as $key => $value){
        if(is_array($value)){
            array2xml($value, $xml->addChild($key));
        }else{
            $xml->addChild($key, $value);
        }
    }
    return $xml->asXML();
}
?>
