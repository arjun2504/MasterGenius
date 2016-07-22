<?php
//error_reporting(0);
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$idfs = mysql_fetch_array(mysql_query("SELECT studentid FROM students WHERE studentid = '$id' LIMIT 1"));
$idft = mysql_fetch_array(mysql_query("SELECT teacherid FROM WHERE teacherid = '$id' LIMIT 1"));
$iid = $_GET['iid'];
$sid= $_GET['sid'];
if(isset($iid))
	mysql_query("UPDATE messages SET del2 = 1 WHERE mid = '$iid'");
else if(isset($sid))
	mysql_query("UPDATE messages SET del1 = 1 WHERE mid = '$sid'");
header("Location: $_SERVER[HTTP_REFERER]"."?dels=1");
?>