<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$ans11 = $_POST['ans'];
$mmm = mysql_real_escape_string($ans11);
$ans = strip_tags(nl2br($mmm),'<br><br/>');
$link11 = $_POST['link'];
$mmm = mysql_real_escape_string($link11);
$link = strip_tags(nl2br($mmm),'<br><br/>');
$doubtid = $_POST['did'];
mysql_query("UPDATE doubts SET answer = '$ans', link = '$link', lastid = '$id' WHERE doubtid = $doubtid");
//$mysql_query("UPDATE doubts SET link = '$link' WHERE doubtid = $doubtid");
header ("Location: $_SERVER[HTTP_REFERER]"."&sent=1");
?>
