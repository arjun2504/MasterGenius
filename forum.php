<?php
include_once "connect.php";
error_reporting(0);
session_start();
$id=$_SESSION['id'];
$o = mysql_fetch_array(mysql_query("SELECT studentid FROM students WHERE studentid = '$id'"));
if($o != NULL)
{
	$id = NULL;
}
if(isset($id))
{
include "connect.php";
?>
<html>
<head>
<title>
MasterGenius
</title>



<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="fstyle.css">
<link rel="stylesheet" type="text/css" href="mstyle.css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular&subset=Latin,Cyrillic">
</head>
<body>
<div class="container">
	<?php include_once "header.php"; ?>
	<?php include_once "nav.php"; ?>
	<?php
	if(isset($_GET[thread]) && isset($_GET[id]))
		include_once "showthread.php";
	else if(isset($_GET[id]))
		include_once "thread.php";
	else
		include_once "fcontent.php";
	?>
	<?php include_once "footer.php"; ?>
</div>
</body>
</html>
<?php }
else
{
	echo "You do not have permission to view this page.";
} ?>
