<?
// ============== мой код
// $routes =[
//     "" => C_POSTS.'/index.php',
//     "index" => C_POSTS.'/index.php',
//   "contacts" => CONTROLLERS."/contacts.php",
// "post/create"=> C_POSTS.'/create.php'

// ];

//================ Алиса
// карта маршрутов
// $routes = [
//     "" => C_POSTS.'/index.php',
//     "index" =>  C_POSTS.'/index.php',
//     "contacts" => CONTROLLERS."/contacts.php",
//     "posts/create" => C_POSTS."/create.php",
//     "posts/store" => C_POSTS."/store.php",
//     // "index2" =>  C_POSTS.'/index2.php',
//     // "1" => CONTROLLERS."/courses/index.php",
//     // "courses" => CONTROLLERS."/courses/course.php",
// ];



// POSTS
$router->get("index", C_POSTS.'/index.php');
$router->get("", C_POSTS.'/index.php');

$router->get("posts/create", C_POSTS.'/create.php');
$router->post("posts/store", C_POSTS.'/store.php');

$router->get("posts", C_POSTS.'/show.php'); // 1 ресурс
$router->get("posts/edit", C_POSTS.'/edit.php');
// $router->put("posts/edit", C_POSTS.'/update.php');
// $router->delete("posts/destroy", C_POSTS.'/destroy.php');

$router->get("contacts", CONTROLLERS."/contacts.php");