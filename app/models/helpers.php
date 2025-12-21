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

//Получаем только те данные, что нужны в форму
function get_request_data(array $fillable, string  $get_data ="POST"){
                $data =[];
       //         dump($fillable);
                if ($get_data=="POST") {
                    foreach ($_POST as $key => $value) {
       //                   echo "[$key] = $value <br>";
                            if (in_array($key,$fillable)) {$data[$key] = prep($value)  ;  }
                            }
                }
     //     dump($data);
   return $data;
}


function prep($data){
    return htmlentities(trim($data),ENT_QUOTES);
}

function len($str){
    return mb_strlen($str,"utf-8");
}

function old($fieldname){
    return isset($_POST[$fieldname]) ? prep($_POST[$fieldname]) :"";
    if (isset($_POST[$fieldname]))
   return $_POST[$fieldname];
}


?>