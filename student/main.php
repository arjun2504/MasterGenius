<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$sdet = mysql_fetch_array(mysql_query("SELECT * FROM students WHERE studentid = '$id' LIMIT 1"));
?>
<div class="content">
<div class="con">
<h1>Dashboard</h1>
<div class="dashbox">
<div class="title">Broadcast Messages</div>
<?php
$p = mysql_query("SELECT * FROM broadcast WHERE year = '$sdet[year]' AND dept = '$sdet[dept]' ORDER BY t DESC LIMIT 10");
while($pr = mysql_fetch_array($p))
{
	echo "<div class='douboxu' style='width: 96%'>";
	$td = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$pr[teacherid]'"));
	echo "<font size='2px'><b>".$td[sal]." ".$td[fname]." ".$td[lname]."</b> &nbsp; &nbsp; <font color='grey' size='1.5px'>".$pr[t]."</font><br>";
	echo $pr[message];
	echo "</font></div>";
}
?>
</div>
<div class="dashbox">
<div class="title">Mates who recently completed chapters</div>
<?php
$query = mysql_query("SELECT * FROM testappear WHERE dept = '$sdet[dept]' AND marks IS NOT NULL ORDER BY t DESC LIMIT 30");
while($row = mysql_fetch_array($query))
{
	echo "<div class='douboxu' style='width: 96%'>";
	echo "<font size='2px'><b>";
	$nam = mysql_fetch_array(mysql_query("SELECT * FROM students WHERE studentid = '$row[studentid]'"));
	echo $nam[fname]." ".$nam[lname]."</b> (".$row[studentid].")";
	echo " has studied ";
	$titl = mysql_fetch_array(mysql_query("SELECT * FROM qpaper WHERE testid = $row[testid]"));
	echo $titl[title];
	echo " and scored <b>";
	if($row[marks] < 7)
	{
		echo "<font color='red'>";
		echo $row[marks]."/10";
		echo "</font>";
	}
	else
	{
		echo "<font color='green'>";
		echo $row[marks]."/10";
		echo "</b>";
		echo "</font>";
	}
	echo "</b></font>";
	echo "<br>";
	echo "</div>";
}
?>
</div>
<div class="dashbox">
<div class="title">Doubts</div>
<div class="dbox" style='background-color: transparent;'>
<?php
$q1 = mysql_query("SELECT * FROM doubts WHERE answer IS NULL AND dept = '$sdet[dept]' AND studentid = '$sdet[studentid]'");
$countp = 0;
$q2 = mysql_query("SELECT * FROM doubts WHERE dept = '$sdet[dept]' AND studentid = '$sdet[studentid]'");
$q3 = mysql_query("SELECT * FROM doubts WHERE dept = '$sdet[dept]' AND studentid = '$sdet[studentid]' AND answer IS NOT NULL");
while($row = mysql_fetch_array($q1))
	$countp++;
$count = 0;
while($row1 = mysql_fetch_array($q2))
	$count++;
$counta = 0;
while($row2 = mysql_fetch_array($q3))
	$counta++;
echo "<h3 style='text-indent: 30px'>".$countp." Pending</h3>";
echo "<h3 style='text-indent: 30px'>".$counta." Answered</h3>";
echo "<h3 style='text-indent: 30px'>".$count." Doubt(s)</h3>";
?>
</div>
<div class="dbox"  style='background-color: transparent' style='padding: 10px'>
<i>Recent Answerers:</i><br>
<?php
$query = mysql_query("SELECT DISTINCT lastid FROM doubts WHERE dept = '$sdet[dept]' AND lastid IS NOT NULL ORDER BY t DESC LIMIT 3");
while($row = mysql_fetch_array($query))
{
	$sd = mysql_fetch_array(mysql_query("SELECT fname, lname FROM teachers WHERE dept = '$sdet[dept]' AND teacherid = '$row[lastid]'"));
	echo "<br><div class='namelist'>";
	echo $sd[fname]." ".$sd[lname];
	echo "</div>";
}
?>
</div></div></div></div>