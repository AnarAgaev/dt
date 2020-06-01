<?
  header("HTTP/1.x 404 Not Found");
  header("Status: 404 Not Found");
  require_once (SITE__DIR.'/404.php');
  exit();
?>