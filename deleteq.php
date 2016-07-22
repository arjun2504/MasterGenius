<?php
include_once "connect.php";
session_start();
$id = $_SESSION[id];
$nid = $_GET['nid'];
mysql_query("DELETE FROM dques WHERE questionid = $nid");
header("Location: $_SERVER[HTTP_REFERER]"."&delete=1");
?>