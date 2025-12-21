<?
$title = $header ="Create a new post";
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    dd($_POST);
    
}
require_once V_POSTS."/create.tmpl.php";