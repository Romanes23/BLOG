<?
$title = "Romanes blog";
$header = "Recent post";

$sql = "SELECT * FROM `posts`";
$posts = $db->query($sql)->findALL();
require_once (VIEWS."/index.tmpl.php");
?>