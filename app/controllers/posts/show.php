<?
global $db;
$sql = "SELECT * FROM `posts` LIMIT 5 ";
$posts = $db->query($sql)->findALL();

$id = (int)$_GET['id']?? 0;

 $sql = "SELECT * FROM `posts` WHERE `post_id` = ?";
 $post = $db->query($sql,[$id])->findOrAbort();
 $header=$title=$post['title'];

require_once V_POSTS."/show.tmpl.php";
