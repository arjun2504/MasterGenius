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
$msg11 = $_POST['message'];
$mmm = mysql_real_escape_string($msg11);
$msg = strip_tags(nl2br($mmm),'<br><br/>');
$fid = $_POST['fromid'];
$lid = mysql_fetch_array(mysql_query("SELECT mid FROM messages ORDER BY mid DESC"));
$newid = $lid[mid] + 1;
mysql_query("INSERT INTO messages values('$newid','$id','$fid','$msg','1',NOW(),NULL,NULL)");
header("Location: $_SERVER[HTTP_REFERER]"."&replied=1");
?>