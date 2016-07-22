<?php
include_once "connect.php";
session_start();
$id = $_SESSION[id];
$nid = $_GET['nid'];
mysql_query("DELETE FROM notes WHERE notesid = $nid");
header("Location: $_SERVER[HTTP_REFERER]"."&delete=1");
?>