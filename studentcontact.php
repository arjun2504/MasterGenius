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
$type = $_GET['type'];
$dept = $_GET['dept'];
?>
<html>
<head>
<title>
MasterGenius
</title>



<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="mstyle.css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular&subset=Latin,Cyrillic">
</head>
<body>
<center>
<h1>Contact Browser</h1>
<div class='hintbox' style='width: 355px; float: left; background-color: #F4F4F4'><b>Name</div>
<div class='hintbox1' style='width: 100px; float: left;  background-color: #F4F4F4'>ID</b></div>
<?php
if($type == 'student')
{
	$q = mysql_query("SELECT * FROM students WHERE dept = '$dept' ORDER BY fname");
	while($row = mysql_fetch_array($q))
	{
		echo "<div class='hintbox' style='width: 355px; float: left'>";
		echo $row[fname]." ".$row[lname];
		echo "<font color=gray size='1.5px'> - ";
		echo $row[dept]." ".$row[section];
		echo "</font>";
		echo "</div>";
		echo "<div class='hintbox1' style='width: 100px; float: left'>";
		echo $row[studentid];
		echo "</div>";
		
	}
}
else if($type == 'faculty')
{
	$q = mysql_query("SELECT * FROM teachers WHERE dept = '$dept' ORDER BY fname");
	while($row = mysql_fetch_array($q))
	{
		echo "<div class='hintbox' style='width: 355px; float: left'>";
		echo $row[fname]." ".$row[lname];
		echo "</div>";
		echo "<div class='hintbox1' style='width: 100px; float: left'>";
		echo $row[teacherid];
		echo "</div>";
		
	}
}
?>
</center>

<script>
function formSubmit()
{
document.getElementById("frm1").submit();
}
</script>
</body>
</html>