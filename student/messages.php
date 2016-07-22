<?php
error_reporting(0);
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$idfs = mysql_fetch_array(mysql_query("SELECT studentid FROM students WHERE studentid = '$id' LIMIT 1"));
$idft = mysql_fetch_array(mysql_query("SELECT teacherid FROM WHERE teacherid = '$id' LIMIT 1"));
if($idfs[studentid] == $id)
	$sid = $_SESSION['id'];
else
	$tid = $_SESSION['id'];
if(isset($id))
{
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="mstyle.css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular&subset=Latin,Cyrillic">
<title>
MasterGenius
</title>
</head>
<body>
<div class="container">
<?php include_once "header.php"; ?>
	<?php include_once "nav.php"; ?>
	<?php include_once "menu.php"; ?>
	<?php include_once "mbody.php"; ?>
	<?php include_once "footer.php"; ?>
</div>
</body>
</html>
<?php } ?>