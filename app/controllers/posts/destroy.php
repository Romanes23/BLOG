<?
global $db;
// $api_data = file_get_contents('php://input');
// dump($api_data);

$api_data = json_decode(file_get_contents('php://input'),true); // сюда приходит либо NULL либо массив
$data =($api_data)?? $_POST;   // если есть, что то да, если нет, то сюда попадаем методом POST
$id = (int)$data['post_id']?? 0; // если число, то сохран, иначе 0

$db->query("DELETE FROM `posts` WHERE `post_id`=?", [$id]);

if ($db->rowCount()) 
{$_SESSION['success']= $answer = "Post DELETED successfully";}
else {$_SESSION['danger']= $answer = "Post is not DELETED ";}
   

if($api_data){
   echo json_encode($answer);
die;
}

 redirect();  

//dump($data);