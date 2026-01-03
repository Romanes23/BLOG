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
                            if (in_array($key,$fillable)) {
                                if ($key=='password'){$data[$key] =  password_hash(prep($value),algo: PASSWORD_DEFAULT);}
                                else $data[$key] = prep($value)  ; 
                            }
                    }
                }
   return $data;
}

function get_request_data_1(array $fillable, string  $get_data ="POST"){
                $data =[];
       //         dump($fillable);
                if ($get_data=="POST") {
                    foreach ($_POST as $key => $value) {
                            if (in_array($key,$fillable)) {
                                $data[$key] = prep($value)  ; 
                            }
                    }
                }
   return $data;
}
function redirect($url =''){
    if ($url) {$redirect=$url;}
          else{
               //$redirect= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER']:PATH;
                  $redirect =PATH;  
                }
        header("Location: $redirect");// предопред. ф-я отправляет HTTP заголовок
        die();
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

function get_allerts(){
        $alerts = [
            "danger",
            "success",
            "info",
            "warning"
        ];

                    function get_alert($type){         //{$type} цвет   $_SESSION[$type] <-- сам текст оповещения
                               return "<div class='alert alert-{$type} alert-dismissible fade show' role='alert'>
                                        $_SESSION[$type] 
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                       </div>";
                    }

                    if (!empty($_SESSION)) {
                        $rezult = "<div class='container py-3'>";
                    
                        foreach ($_SESSION as $key => $value) {
                            if (in_array($key, $alerts)) {
                              $rezult .=   get_alert($key);
                              unset($_SESSION[$key]);
                            }
                        }
                        $rezult .= "</div>";
                        echo $rezult;
                    }
                   








}






?>