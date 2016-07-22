<div class="content">
<div class="con">
<h1>All Answered Doubts</h1>
<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$sdet = mysql_fetch_array(mysql_query("SELECT * FROM students WHERE studentid = '$id' LIMIT 1"));

$q = mysql_query("SELECT * FROM doubts WHERE dept = '$sdet[dept]' ORDER BY t DESC");
while($row = mysql_fetch_array($q))
{
if($row[answer] != NULL)
{
	echo "<div class='doubox'>";
	echo substr($row[question], 0, 45);
	echo "<font size='1px' color='green'> &nbsp;-&nbsp;&nbsp;<a href='home.php?m=3&qid=".$row[doubtid]."'>View Answer</a></font>";
	echo "<br>";
	echo "<font size='1px' color='gray'>";
	echo $row[t];
	echo "  - ";
	$tdet = mysql_fetch_array(mysql_query("SELECT sal, fname, lname FROM teachers WHERE teacherid = '$row[lastid]'"));
	echo "Asked by ";
	$sd = mysql_fetch_array(mysql_query("SELECT fname, lname FROM students WHERE studentid = '$row[studentid]'"));
	echo $sd[fname]." ".$sd[lname];
	echo " - Answered by ";
	echo $tdet[sal]." ".$tdet[fname]." ".$tdet[lname];
	echo "</font>";
	echo "</div>";
}
}

?>
</div>
</div>