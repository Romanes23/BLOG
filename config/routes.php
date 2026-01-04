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
 $router->delete("posts", C_POSTS.'/destroy.php');

$router->patch("posts", C_POSTS.'/rate.php');

$router->get("contacts", CONTROLLERS."/contacts.php");

$router->get("posts/reg", C_POSTS.'/reg.php');

//$router->post("posts/registration", C_POSTS.'/registration.php');
$router->post("posts/storeUs", C_POSTS.'/storeUs.php');
$router->get("posts/inp", C_POSTS.'/inp.php');
$router->post("posts/storeUsInp", C_POSTS.'/storeUsInp.php');
$router->post("posts/storeUsPrint", C_POSTS.'/storeUsPrint.php');
$router->get("posts/print", C_POSTS.'/print.php');