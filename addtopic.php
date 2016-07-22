<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$idfs = mysql_fetch_array(mysql_query("SELECT studentid FROM students WHERE studentid = '$id' LIMIT 1"));
//$idft = mysql_fetch_array(mysql_query("SELECT teacherid FROM WHERE teacherid = '$id' LIMIT 1"));
if($idfs[studentid] == $id)
	$sid = $_SESSION['id'];
else
	$tid = $_SESSION['id'];
$last = mysql_fetch_array(mysql_query("SELECT topicid FROM topics ORDER BY topicid DESC LIMIT 1"));
$new = $last[0] + 1;
$title = mysql_real_escape_string(strip_tags($_GET[title]));
mysql_query("INSERT INTO topics values($new,'$title','$id',NOW(),'$_GET[dept]')");
header("Location: $_SERVER[HTTP_REFERER]");
?>