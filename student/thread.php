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

</div>
<div class="fstyletemp">
<div class="formribbon" style='padding-top: 0.5px;'>
<center>
<form action='createthread.php?id=<?php echo $_GET[id]; ?>' method='post'  enctype='multipart/form-data'>
<h3>Create a Thread</h3>
<font size='5px'>Thread Title:</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="title"  style="width:450px; height: 30px; border: none; background-color: #D6EBFF; font-size: 20px" placeholder="Type a Thread Title to insert..." required><br><br>
<a href="#" onclick="showHide('hidden_div'); return false;" style='color: blue'>Show/Hide Options</a>
<div id="hidden_div" style="display: none;">
<textarea class='tarea' name="content" style='padding: 10px; transparent' placeholder="Start typing your thread content here..." required>
</textarea><br><br>
Attach a file: <input type="file" name="file[]" id="file"> <br><br><font size='2'>Recommended format to attach: .ZIP, .RAR, .7z</font>
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
<div class="dashbox">
<div class="title">
<?php $titl = mysql_fetch_array(mysql_query("SELECT topic, teacherid FROM topics WHERE topicid = $_GET[id] LIMIT 1"));
echo $titl[topic];
?>
</div>
<?php
$q = mysql_query("SELECT * FROM threads WHERE topicid = $topicid ORDER BY t DESC");
while($row = mysql_fetch_array($q))
{
	echo "<div class='boxes' style='width: 97.5%'>";
	echo "<a href='forum.php?id=".$topicid."&thread=".$row[threadid]."'>";
	echo "<b>".$row[title]."</b><br>";
	echo "</a>";
	echo "<font size='2px'>by ";
	$i = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$row[createdby]' LIMIT 1"));
	if($id[teacherid] != $row[createdby])
	{
		$i = mysql_fetch_array(mysql_query("SELECT * FROM students WHERE studentid = '$row[createdby]' LIMIT 1"));
	}
	echo $i[fname]." ".$i[lname];
	echo "</font><font size='1px' style='color: gray; line-height: 20px'> at ";
	echo $row[t];
	echo "</font>";
	echo "</div>";
}
?>
</div>
</div>