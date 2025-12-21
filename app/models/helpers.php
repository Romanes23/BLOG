<!-- <H3> HELLO from helpers</H3> -->
<?php
function dump($data): void
{
    echo "<pre>"; //для включения в документ предварительно отформатированного текста
    var_dump(value: $data);
    echo "/<pre>";
}
//Функция с типом never либо выбрасывает исключение, либо вызывает конструкцию языка exit()
function dd($data): never
{
    echo "<pre>";
    var_dump(value: $data);
    echo "<pre>";
    die; //exit
}


function abort($code = "404"){
$title = $code;
$header = "$code - ";
switch ($code) {
    case "404":
       $header .=" Page not found ";
        break;
        case '500':
       $header .="Server error ";
        break;
    default:
        break;
}
require_once VIEWS."/error.tmpl.php";
}




?>