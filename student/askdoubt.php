<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$sdet = mysql_fetch_array(mysql_query("SELECT * FROM students WHERE studentid = '$id' LIMIT 1"));
$last = mysql_fetch_array(mysql_query("SELECT doubtid FROM doubts ORDER BY doubtid DESC LIMIT 1"));
$new_id = $last['doubtid'] + 1;
$doub = mysql_real_escape_string(strip_tags($_POST[doubt]));
mysql_query("INSERT INTO doubts values('$sdet[studentid]','$doub',NULL,NOW(),$new_id,NULL,NULL,NULL,'$sdet[dept]')");
header("Location: $_SERVER[HTTP_REFERER]"."&asked=1");
?>