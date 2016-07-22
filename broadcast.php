<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$tdet = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$id' LIMIT 1"));
$msg11 = $_POST['message'];
$year = $_POST['year'];
$msg = htmlentities(mysql_real_escape_string($msg11));
$idx = mysql_fetch_array(mysql_query("SELECT bid FROM broadcast ORDER BY bid DESC LIMIT 1"));
$newid = $idx['bid'] + 1;
mysql_query("INSERT INTO broadcast values($newid,'$id','$msg','$year','$tdet[dept]',NOW())");
if($_SERVER[HTTP_REFERER]=='http://localhost/mg/home.php' || $_SERVER[HTTP_REFERER]=='http://127.0.0.1/mg/home.php')
header("Location: $_SERVER[HTTP_REFERER]"."?bcast=1");
else
header("Location: $_SERVER[HTTP_REFERER]"."&bcast=1");
?>