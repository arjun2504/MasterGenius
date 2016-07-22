<?php
include_once "connect.php";
error_reporting(0);
session_start();
$id=$_SESSION['id'];
$o = mysql_fetch_array(mysql_query("SELECT teacherid FROM teachers WHERE teacherid = '$id'"));
if($o != NULL)
{
	$id = NULL;
}
if(isset($id))
{
include "connect.php";
$m = $_GET['m'];
$qid = $_GET['qid'];
$view = $_GET['view'];
$tu = $_GET['takeup'];
?>
<html>
<head>
<title>
MasterGenius
</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular&subset=Latin,Cyrillic">
</head>
<body>
<div class="container">
	<?php include_once "header.php"; ?>
	<?php include_once "nav.php"; ?>
	<?php include_once "sidebar.php"; ?>
	<?php 
		if($m==1 || $m==NULL)
			include_once "main.php";
		else if($m==2 && !isset($tu))
			include_once "test.php";
		else if($m==2 && isset($tu))
		{
			if($tu == 1)
				include_once "unittest.php";
			else if($tu == 2)
				include_once "desctest.php";
		}
		else if($m==3 && !isset($qid))
		{
			if($m==3 && isset($view))
				include_once "alldoubt.php";
			else
				include_once "doubts.php";
		}
		else if($m==3 && isset($qid))
			include_once "viewdoubt.php";
		else if($m==4)
			include_once "notes.php";
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
