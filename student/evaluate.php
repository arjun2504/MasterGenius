<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$q = mysql_fetch_array(mysql_query("SELECT dept FROM teachers WHERE teacherid = '$id'"));
$sid = $_GET['ident'];
$i = mysql_fetch_array(mysql_query("SELECT * FROM testappear WHERE subid = $sid LIMIT 1"));
$j = mysql_fetch_array(mysql_query("SELECT * FROM qpaper WHERE testid = $i[testid] LIMIT 1"));
$mark = 0;
if($_GET['a1'] == $j['a1'])
	$mark = $mark + 1;
if($_GET['a2'] == $j['a2'])
	$mark = $mark + 1;
if($_GET['a3'] == $j['a3'])
	$mark = $mark + 1;
if($_GET['a4'] == $j['a4'])
	$mark = $mark + 1;
if($_GET['a5'] == $j['a5'])
	$mark = $mark + 1;
if($_GET['a6'] == $j['a6'])
	$mark = $mark + 1;
if($_GET['a7'] == $j['a7'])
	$mark = $mark + 1;
if($_GET['a8'] == $j['a8'])
	$mark = $mark + 1;
if($_GET['a9'] == $j['a9'])
	$mark = $mark + 1;
if($_GET['a10'] == $j['a10'])
	$mark = $mark + 1;
echo $mark;
mysql_query("UPDATE testappear SET marks = $mark WHERE subid = $sid");
header("Location: $_SERVER[HTTP_REFERER]");
?>