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
$topicid = $_GET['id'];
?>
<div class="fstyle">
<h1>Discussion Forums</h1>
<?php
$titl = mysql_fetch_array(mysql_query("SELECT topic, teacherid FROM topics WHERE topicid = $_GET[id] LIMIT 1"));
echo " <div class='douboxu' style='width: auto;  background-color: transparent'><center><font size='5px'>".$titl[topic]."</font><br>";
echo "<font size='2px' style='color:gray'>A topic by ";
	$i = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$titl[teacherid]' LIMIT 1"));
	echo $i[sal]." ".$i[fname]." ".$i[lname]." (".$i[dept].")";
	echo "</font></center></div>";
?>
<?php
$q = mysql_query("SELECT * FROM threads WHERE threadid = '$_GET[thread]'");
while($row = mysql_fetch_array($q))
{
	echo "<div class='showt'>";
	$i = mysql_fetch_array(mysql_query("SELECT * FROM students WHERE studentid = '$row[createdby]' LIMIT 1"));
	if(!isset($i[0]))
		$i = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$row[createdby]' LIMIT 1"));
	if($i[gender] == 'm' || $i[sal] == 'Mr.' || $i[sal] == 'Dr.' || $i[sal] == 'Er.')
	{
		echo "<div class='imgshw'>";
		echo "<img src='images/male.gif' height='150'>";
		echo "<br>";
		echo "<center><b>";
		echo $i[fname]." ".$i[lname];
		echo "</b>";
		echo "<br><font color='gray'>";
		echo $row[createdby];
		echo "</font><br>";
		echo "<a href='compose.php?s=".$row[createdby]."' style='color:red' size='1px'>";
		echo "Message";
		echo "</a>";
		echo "</center>";
		echo "</div>";
		echo "<div class='thrshw'";
		
		echo "</div>";
	}
	else
	{
		echo "<div class='imgshw'>";
		echo "<img src='images/female.gif' height='150'>";
		echo "<br>";
		echo "<center><b>";
		echo $i[fname]." ".$i[lname];
		echo "</b>";
		echo "<br><font color='gray'>";
		echo $row[createdby];
		echo "</font><br>";
		echo "<a href='compose.php?s=".$row[createdby]."' style='color:red' size='1px'>";
		echo "Message";
		echo "</a>";
		echo "</center>";
		echo "</div>";
		echo "<div class='thrshw'";
		
		echo "</div>";
	}
	echo "<h3>";
	echo $row[title];
	echo "</h3>";
	echo "<font color='gray' size='2'>Created: ";
	echo $row[t];
	echo "</font><br><br>";
	echo $row[thread];
	if($row[file] != NULL)
	{
	echo "<h4>Attachments: ";
	echo "<a href='uploads/".$row[file]."' target='_blank' style='color: blue'>";
	echo $row[file];
	echo "</a>";
	echo "</h4>";
	}
	echo "</div>";
}
?>
</div></div>
<div class="fstyletemp">
<div class="formribbon" style='padding-top: 0.5px;'>
<center>
<form action='postreply.php?tid=<?php echo $_GET[thread]; ?>' method='post'  enctype='multipart/form-data'>
<h3><a href="#" onclick="showHide('hidden_div'); return false;" style='color: blue'>Reply to this thread</a></h3>
<div id="hidden_div" style="display: none;">
<textarea class='tarea' name="content" style='padding: 10px; transparent' placeholder="Start typing your reply here..." required>
</textarea><br><br>
Attach a file: <input type="file" name="file[]" id="file"><br><br><font size='2'>Recommended format to attach: .ZIP, .RAR, .7z</font>
<br><br>
<input type='submit' value='Create a Thread' style='padding:5px; height: 35px; padding-bottom: 2px;'>
</div>
</form>
</center>
</div>
<script type="text/javascript">
 function showHide(obj) {
   var div = document.getElementById(obj);
   if (div.style.display == 'none') {
     div.style.display = '';
   }
   else {
     div.style.display = 'none';
   }
 }
</script>
</div>
<div class="fstyleproc">
<?php
$shw = mysql_query("SELECT * FROM showthread WHERE threadid = '$_GET[thread]' ORDER BY t DESC");
while($row = mysql_fetch_array($shw))
{
	echo "<div class='dashbox'>";
	echo "<div class='title'>";
	$i = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$row[postedby]'"));
	if(!isset($i[0]))
		$i = mysql_fetch_array(mysql_query("SELECT * FROM students WHERE studentid = '$row[postedby]'"));
	echo "<b>".$i[fname]." ".$i[lname]."</b>";
	echo " of ";
	echo " ".$i[year]." ";
	echo $i[dept]." ";
	echo $i[section];
	echo "<font size='2' color='gray'> wrote...</font>";
	echo "</div><font color='gray' size='1'>Created: ";
	echo $row[t];
	echo " | ";
	echo "<a href='compose.php?s=".$row[postedby]."' style='color:blue'>";
	echo "Message ".$i[fname];
	echo "</a>";
	echo "</font><br><br>";
	echo $row[discuss];
	if($row[file] != NULL)
	{
	echo "<h4>Attachments: ";
	echo "<a href='file/".$row[file]."' target='_blank' style='color: blue'>";
	echo $row[file];
	echo "</a>";
	echo "</h4>";
	}
	echo "</div>";
}
?></div>