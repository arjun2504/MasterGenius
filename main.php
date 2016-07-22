<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$q = mysql_fetch_array(mysql_query("SELECT dept FROM teachers WHERE teacherid = '$id'"));
?>
<div class="content">
<div class="con">
<h1>Dashboard</h1>
<div class="dashbox">
<div class="title">Broadcast a message</div>
<form action='broadcast.php' method="post">
<input type='text' name='message'  style="width:525px; height: 30px; border: none; background-color: transparent; font-size: 20px" placeholder="Click to Write a message here..." required><br><br>
I want  this message to reach 
<select name="year" required>
<option value="">--Select--</option>
<option value=1>1st Year</option>
<option value=2>2nd Year</option>
<option value=3>3rd Year</option>
<option value=4>4th Year</option>
</select> students of <?php echo $q[dept]; ?> department.
<br><br><center>
<input type='submit' value='Broadcast' style='padding: 10px'></center>
</form>
<?php
if($_GET[bcast])
	echo "<center><div class='successmsg' >&#10003; Message Broadcasted!</div></center>";
?>
<font size='2.5px' color=gray><b><center>Recent 5 Broadcasts by you:</center></b></font><?php echo "\n"; ?>
<?php
$bm = mysql_query("SELECT * FROM broadcast WHERE dept = '$q[dept]' AND teacherid = '$id' ORDER BY t DESC LIMIT 5");
while($r = mysql_fetch_array($bm))
{
	echo "<i><center><font size='2px' color=gray>For Year ".$r[year].": ".$r[message]."</font></center></i>\n";
}
?>
</div>
<div class="dashbox">
<div class="title">Students who have completed studying</div>
<?php
$query = mysql_query("SELECT * FROM testappear WHERE dept = '$q[dept]' AND marks IS NOT NULL ORDER BY t DESC LIMIT 30");
while($row = mysql_fetch_array($query))
{
	echo "<div class='douboxu'>";
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
$q1 = mysql_query("SELECT * FROM doubts WHERE answer IS NULL AND dept = '$q[dept]'");
$countp = 0;
$q2 = mysql_query("SELECT * FROM doubts WHERE dept = '$q[dept]'");
$q3 = mysql_query("SELECT * FROM doubts WHERE dept = '$q[dept]' AND answer IS NOT NULL");
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
<i>Recent Askers:</i><br>
<?php
$query = mysql_query("SELECT DISTINCT studentid FROM doubts WHERE dept = '$q[dept]' ORDER BY t DESC LIMIT 3");
while($row = mysql_fetch_array($query))
{
	$sdet = mysql_fetch_array(mysql_query("SELECT fname, lname FROM students WHERE dept = '$q[dept]' AND studentid = '$row[studentid]'"));
	echo "<br><div class='namelist'>";
	echo $sdet[fname]." ".$sdet[lname];
	echo "</div>";
}
?>
</div>
</div>
<!--<div class="dashbox">
<div class="title">Students who took up descriptive test</div>
</div>-->
<div class="dashbox">
<div class="title">Notes</div>
<?php
$m = mysql_query("SELECT * FROM notes WHERE dept = '$q[dept]'");
$myou = mysql_query("SELECT * FROM notes WHERE dept = '$q[dept]' AND teacherid = '$id'");
$you = 0;
$atty = 0;
while($myo = mysql_fetch_array($myou))
{
	$you++;
	if($myo[file] != NULL)
		$atty++;
}
echo "<center><h3>".$you." notes created by you.</h3></center>";
$all = 0;
$att = 0;
while($mrow = mysql_fetch_array($m))
{
	$all++;
	if($mrow[file] != NULL)
		$att++;
}
echo "<center><h3>".$all." total available notes.</h3>".$att." total attachment(s) on available notes</center>";
?>
</div>
</div>
</div>