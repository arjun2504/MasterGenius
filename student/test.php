<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$sdet = mysql_fetch_array(mysql_query("SELECT * FROM students WHERE studentid = '$id' LIMIT 1"));
?>
<div class="content">
<div class="con">
<h1>Write a test</h1>
Here, you may have two types of test to test yourself. Writing an unit test will notify people that you have completed that particular topic.
<h3>Available Unit Tests</h3>
<?php
$q = mysql_query("SELECT * FROM qpaper WHERE dept = '$sdet[dept]' AND year = '$sdet[year]'");
while($row = mysql_fetch_array($q))
{
	echo "<div class='douboxu'>";
	echo $row['title'];
	echo " - <font size='1.5px' color='gray'>";
	$a = mysql_fetch_array(mysql_query("SELECT * FROM testappear WHERE testid = '$row[testid]' AND studentid = '$id' LIMIT 1"));
	if($a[testid] == $row[testid] && $a[student] == $row[studentid])
	{
		echo "<font color='green'>Your score is <b>".$a[marks]."</b></font>";
	}
	else
	{
		echo "<a href='home.php?m=2&takeup=1&tid=".$row[testid]."' style='color: blue'>";
		echo "Take up now";
		echo "</a>";
	}
	echo "</font>";
	echo "<br>";
	echo "<font size='1px' color='gray'>";
	echo "<br>Created by ";
	$num = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$row[teacherid]' LIMIT 1"));
	echo $num['fname']." ".$num['lname'];
	echo "</font>";
	echo "</div>";
}
?>
<hr>
<h3>Available Descriptive Question Papers</h3>
<?php
$tdata = mysql_query("SELECT * FROM testq WHERE dept = '$sdet[dept]' AND year = '$sdet[year]' ORDER BY teacherid");
$td = mysql_fetch_array(mysql_query("SELECT * FROM testq WHERE dept = '$sdet[dept]' ORDER By teacherid LIMIT 1"));
$tdd = mysql_fetch_array(mysql_query("SELECT fname, lname FROM teachers WHERE teacherid = '$td[teacherid]' ORDER BY teacherid LIMIT 1"));
$temp = $tdd[teacherid];
//echo "<b>Questions by ".$tdd[fname]." ".$tdd[lname]."</b>";
while($tdataq = mysql_fetch_array($tdata))
{
	$tdet = mysql_fetch_array(mysql_query("SELECT fname, lname, sal FROM teachers WHERE teacherid = '$tdataq[teacherid]' ORDER BY teacherid"));
	if($temp != $tdataq['teacherid'])
	{	
		echo "<div class='qbox'>";
		echo "<font size='1.5px'>Question by </font><br><b>".$tdet[sal]." ".$tdet[fname]." ".$tdet[lname]."</b>";
		echo "<br>";
		$mrk = mysql_fetch_array(mysql_query("SELECT SUM(marks) FROM testq WHERE teacherid = '$tdataq[teacherid]' AND year = '$sdet[year]' AND dept = '$sdet[dept]'"));
		echo "<h3><center>Marks: ".$mrk[0]."</center></h3>";
		echo "<center><a style='color: #5CB8E6;' href='home.php?m=2&takeup=2&tid=".$tdataq[teacherid]."'>Take up test</a></center>";
		echo "</div>";
		$temp = $tdataq[teacherid];
		
	}
}
?>
</div>
</div>