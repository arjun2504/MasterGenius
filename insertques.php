<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$q = mysql_fetch_array(mysql_query("SELECT dept FROM teachers WHERE teacherid = '$id'"));
$last = mysql_fetch_array(mysql_query("SELECT questionid FROM dques ORDER BY questionid DESC LIMIT 1"));
$new_id = $last['questionid'] + 1;
$ques11 = $_POST[question];
$ques = mysql_real_escape_string(strip_tags($ques11));
mysql_query("INSERT INTO dques values($new_id, '$ques','$id','$q[dept]','$_POST[mark]')");
header("Location: $_SERVER[HTTP_REFERER]"."&ins=1");
?>