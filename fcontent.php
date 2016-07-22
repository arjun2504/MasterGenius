<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$idfs = mysql_fetch_array(mysql_query("SELECT studentid FROM students WHERE studentid = '$id' LIMIT 1"));
//$idft = mysql_fetch_array(mysql_query("SELECT teacherid FROM WHERE teacherid = '$id' LIMIT 1"));
if($idfs[studentid] == $id)
	$sid = $_SESSION['id'];
else
	$tid = $_SESSION['id'];
?>
<div class="fstyle">
<h1>Discussion Forums</h1>
<?php
if(isset($tid))
{
?>
</div>
<div class="fstyletemp">
<div class="formribbon">
<center>
<form action='addtopic.php' method='get'>
<font size='5px'>Insert:</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="title"  style="width:450px; height: 30px; border: none; background-color: #D6EBFF; font-size: 20px" placeholder="Type a Topic Name to insert..." required>
<select name='dept' style="width:160px; height: 30px; border-color: #E0E0E0; border-width: 1px; border-radius: 2px; background-color: #f3f5f8; font-size: 20px;" required>
<option value=''>--Department--</option>
<option value='CSE'>CSE</option>
<option value='IT'>IT</option>
<option value='MECH'>MECH</option>
<option value='ECE'>ECE</option>
<option value='EEE'>EEE</option>
<option value='EIE'>EIE</option>
<option value='AUTO'>AUTO</option>
</select>
<input type='submit' value='Insert' style='padding:5px; height: 35px; padding-bottom: 2px;'>
</form>
</center>
</div>
</div>
<?php } ?>
<div class="fstyleproc">
<div class="dashbox">
<div class="title">Computer Science & Engineering</div>
<?php
$q = mysql_query("SELECT * FROM topics WHERE dept = 'CSE' ORDER BY t DESC");
while($row = mysql_fetch_array($q))
{
	echo "<div class='boxes' style='width: 600px; height: 45px; float: right; margin-right: 10px;'>";
	echo "<a href='forum.php?id=".$row[topicid]."'>";
	echo "<b>".$row[topic]."</b><br>";
	echo "</a>";
	echo "<font size='2px'>by ";
	$i = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$row[teacherid]'"));
	echo $i[sal]." ".$i[fname]." ".$i[lname];
	echo "<br></font><font size='1px' style='color: gray; line-height: 20px'>Created: ";
	echo $row[t];
	echo "</font>";
	echo "</div>";
	echo "<div class='boxes' style='width: 100px; height: 45px; background-color: transparent'>";
	echo "<center><font size='5' color='gray'>";
	$cou = mysql_fetch_array(mysql_query("SELECT COUNT(threadid) FROM threads WHERE topicid = $row[topicid] LIMIT 1"));
	echo $cou[0];
	if($cou[0] == 1)
		echo "<br> thread";
	else
		echo "<br> threads";
	echo "</font></center>";
	echo "</div>";
}
?>
</div>
<div class="dashbox">
<div class="title">Information Technology</div>
<?php
$q = mysql_query("SELECT * FROM topics WHERE dept = 'IT' ORDER BY t DESC");
while($row = mysql_fetch_array($q))
{
	echo "<div class='boxes' style='width: 600px; height: 45px; float: right; margin-right: 10px;'>";
	echo "<a href='forum.php?id=".$row[topicid]."'>";
	echo "<b>".$row[topic]."</b><br>";
	echo "</a>";
	echo "<font size='2px'>by ";
	$i = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$row[teacherid]'"));
	echo $i[sal]." ".$i[fname]." ".$i[lname];
	echo "<br></font><font size='1px' style='color: gray; line-height: 20px'>Created: ";
	echo $row[t];
	echo "</font>";
	echo "</div>";
	echo "<div class='boxes' style='width: 100px; height: 45px; background-color: transparent'>";
	echo "<center><font size='5' color='gray'>";
	$cou = mysql_fetch_array(mysql_query("SELECT COUNT(threadid) FROM threads WHERE topicid = $row[topicid] LIMIT 1"));
	echo $cou[0];
	if($cou[0] == 1)
		echo "<br> thread";
	else
		echo "<br> threads";
	echo "</font></center>";
	echo "</div>";
}
?>
</div>
<div class="dashbox">
<div class="title">Electrical & instrumentation Engineering</div>
<?php
$q = mysql_query("SELECT * FROM topics WHERE dept = 'EIE' ORDER BY t DESC");
while($row = mysql_fetch_array($q))
{
	echo "<div class='boxes' style='width: 600px; height: 45px; float: right; margin-right: 10px;'>";
	echo "<a href='forum.php?id=".$row[topicid]."'>";
	echo "<b>".$row[topic]."</b><br>";
	echo "</a>";
	echo "<font size='2px'>by ";
	$i = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$row[teacherid]'"));
	echo $i[sal]." ".$i[fname]." ".$i[lname];
	echo "<br></font><font size='1px' style='color: gray; line-height: 20px'>Created: ";
	echo $row[t];
	echo "</font>";
	echo "</div>";
	echo "<div class='boxes' style='width: 100px; height: 45px; background-color: transparent'>";
	echo "<center><font size='5' color='gray'>";
	$cou = mysql_fetch_array(mysql_query("SELECT COUNT(threadid) FROM threads WHERE topicid = $row[topicid] LIMIT 1"));
	echo $cou[0];
	if($cou[0] == 1)
		echo "<br> thread";
	else
		echo "<br> threads";
	echo "</font></center>";
	echo "</div>";
}
?>
</div>
<div class="dashbox">
<div class="title">Mechanical Engineering</div>
<?php
$q = mysql_query("SELECT * FROM topics WHERE dept = 'MECH' ORDER BY t DESC");
while($row = mysql_fetch_array($q))
{
	echo "<div class='boxes' style='width: 600px; height: 45px; float: right; margin-right: 10px;'>";
	echo "<a href='forum.php?id=".$row[topicid]."'>";
	echo "<b>".$row[topic]."</b><br>";
	echo "</a>";
	echo "<font size='2px'>by ";
	$i = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$row[teacherid]'"));
	echo $i[sal]." ".$i[fname]." ".$i[lname];
	echo "<br></font><font size='1px' style='color: gray; line-height: 20px'>Created: ";
	echo $row[t];
	echo "</font>";
	echo "</div>";
	echo "<div class='boxes' style='width: 100px; height: 45px; background-color: transparent'>";
	echo "<center><font size='5' color='gray'>";
	$cou = mysql_fetch_array(mysql_query("SELECT COUNT(threadid) FROM threads WHERE topicid = $row[topicid] LIMIT 1"));
	echo $cou[0];
	if($cou[0] == 1)
		echo "<br> thread";
	else
		echo "<br> threads";
	echo "</font></center>";
	echo "</div>";
}
?>
</div>
<div class="dashbox">
<div class="title">Electronics & Communication Engineering</div>
<?php
$q = mysql_query("SELECT * FROM topics WHERE dept = 'ECE' ORDER BY t DESC");
while($row = mysql_fetch_array($q))
{
	echo "<div class='boxes' style='width: 600px; height: 45px; float: right; margin-right: 10px;'>";
	echo "<a href='forum.php?id=".$row[topicid]."'>";
	echo "<b>".$row[topic]."</b><br>";
	echo "</a>";
	echo "<font size='2px'>by ";
	$i = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$row[teacherid]'"));
	echo $i[sal]." ".$i[fname]." ".$i[lname];
	echo "<br></font><font size='1px' style='color: gray; line-height: 20px'>Created: ";
	echo $row[t];
	echo "</font>";
	echo "</div>";
	echo "<div class='boxes' style='width: 100px; height: 45px; background-color: transparent'>";
	echo "<center><font size='5' color='gray'>";
	$cou = mysql_fetch_array(mysql_query("SELECT COUNT(threadid) FROM threads WHERE topicid = $row[topicid] LIMIT 1"));
	echo $cou[0];
	if($cou[0] == 1)
		echo "<br> thread";
	else
		echo "<br> threads";
	echo "</font></center>";
	echo "</div>";
}
?>
</div>
<div class="dashbox">
<div class="title">Electronics & Electrical Engineering</div>
<?php
$q = mysql_query("SELECT * FROM topics WHERE dept = 'EEE' ORDER BY t DESC");
while($row = mysql_fetch_array($q))
{
	echo "<div class='boxes' style='width: 600px; height: 45px; float: right; margin-right: 10px;'>";
	echo "<a href='forum.php?id=".$row[topicid]."'>";
	echo "<b>".$row[topic]."</b><br>";
	echo "</a>";
	echo "<font size='2px'>by ";
	$i = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$row[teacherid]'"));
	echo $i[sal]." ".$i[fname]." ".$i[lname];
	echo "<br></font><font size='1px' style='color: gray; line-height: 20px'>Created: ";
	echo $row[t];
	echo "</font>";
	echo "</div>";
	echo "<div class='boxes' style='width: 100px; height: 45px; background-color: transparent'>";
	echo "<center><font size='5' color='gray'>";
	$cou = mysql_fetch_array(mysql_query("SELECT COUNT(threadid) FROM threads WHERE topicid = $row[topicid] LIMIT 1"));
	echo $cou[0];
	if($cou[0] == 1)
		echo "<br> thread";
	else
		echo "<br> threads";
	echo "</font></center>";
	echo "</div>";
}
?>
</div>
<div class="dashbox">
<div class="title">Automobile Engineering</div>
<?php
$q = mysql_query("SELECT * FROM topics WHERE dept = 'AUTO' ORDER BY t DESC");
while($row = mysql_fetch_array($q))
{
	echo "<div class='boxes' style='width: 600px; height: 45px; float: right; margin-right: 10px;'>";
	echo "<a href='forum.php?id=".$row[topicid]."'>";
	echo "<b>".$row[topic]."</b><br>";
	echo "</a>";
	echo "<font size='2px'>by ";
	$i = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$row[teacherid]'"));
	echo $i[sal]." ".$i[fname]." ".$i[lname];
	echo "<br></font><font size='1px' style='color: gray; line-height: 20px'>Created: ";
	echo $row[t];
	echo "</font>";
	echo "</div>";
	echo "<div class='boxes' style='width: 100px; height: 45px; background-color: transparent'>";
	echo "<center><font size='5' color='gray'>";
	$cou = mysql_fetch_array(mysql_query("SELECT COUNT(threadid) FROM threads WHERE topicid = $row[topicid] LIMIT 1"));
	echo $cou[0];
	if($cou[0] == 1)
		echo "<br> thread";
	else
		echo "<br> threads";
	echo "</font></center>";
	echo "</div>";
}
?>
</div>
</div>