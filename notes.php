<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$tdet = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$id' LIMIT 1"));
?>
<div class="content">
<div class="con">
<h1>Send Notes</h1>
<center>
<?php
if($_GET['sent']==1 && $_GET['delete']==1)
echo "<div class='successmsg'>&#10003; Operation Successful!</div>"; 
else if($_GET['delete']==1)
echo "<div class='successmsg'>&#10003; Note was deleted successfully</div>";
else if($_GET['sent']==1)
{
	echo "<div class='successmsg'>&#10003; Note was sent successfully</div>";
} ?>

</center>
<br>
Create New:<br><br>
<form action="sendnotes.php" method=post enctype='multipart/form-data'>
<input type="text" name="title"  style="width:540px; height: 30px; border: none; background-color: #f3f5f8; font-size: 20px" placeholder="Click to Insert a Title..." required><br><br>
Content:
<textarea name="content" style='padding: 10px;' placeholder="Start typing your notes here..." cols="63" rows="10" required>
</textarea><br><br>
Attach a file: <input type="file" name="file[]" id="file">
<br><br>
To whom you want to send note?
<br>
<br>
<input type="radio" name="year" value="1" required>1st year&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="year" value="2" required>2nd year&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="year" value="3" required>3rd year&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="year" value="4" required>4th year&nbsp;&nbsp;&nbsp;&nbsp;
<br>
<br>
<center><input type='reset' value='Clear text' style="padding: 10px;"><input type='submit' value='Send' style="padding: 10px;"></center>
</form>
<hr>
<br>
<b>Archives of <?php echo $tdet['dept'] ?> Notes:</b>
<form method="get" action="home.php" id="filter"><br>
Choose year: 
<input type='radio' value='all' name='year' required onclick="formSubmit()"> All&nbsp;&nbsp;&nbsp;
<input type='radio' value=1 name='year' required onclick="formSubmit()"> 1st&nbsp;&nbsp;&nbsp;
<input type='radio' value=2 name='year' required onclick="formSubmit()"> 2nd&nbsp;&nbsp;&nbsp;
<input type='radio' value=3 name='year' required onclick="formSubmit()"> 3rd&nbsp;&nbsp;&nbsp;
<input type='radio' value=4 name='year' required onclick="formSubmit()"> 4th
<input type='hidden' name='m' value=4>
</form>
<script>
function formSubmit()
{
document.getElementById("filter").submit();
}
</script>
</script>
<br>
<?php
if(isset($_GET[year]))
{
$yn = $_GET[year];
if($yn > 0 && $yn <5)
$q = mysql_query("SELECT * FROM notes WHERE dept = '$tdet[dept]' AND teacherid = '$id' AND year = '$yn' ORDER BY t DESC");
else if($yn == 'all')
$q = mysql_query("SELECT * FROM notes WHERE dept = '$tdet[dept]' AND teacherid = '$id' ORDER BY t DESC");
}
else
$q = mysql_query("SELECT * FROM notes WHERE dept = '$tdet[dept]' AND teacherid = '$id' ORDER BY t DESC");
while($row = mysql_fetch_array($q))
{
	echo "<div class='notesbox'>";
	echo "<div class='titlenotesimg'><img src='images/notes.png' height='50px' align='top'/></div>";
	$ro = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$id' LIMIT 1"));
	echo "<div class='titlenotes'><b><font size='5px'>".$row[title]."</font></b><br><font size='2px'>Posted by ".$ro[fname]." at ".$row[t]." for year ".$row[year]."</font></div>";
	echo "<br><div class='connotes'>".nl2br($row['content'])."</div>";
	echo "<br><b><font size='2px'>Attachments: </b>";
	if(isset($row[file]))
	echo "<a href='student/files/".$row['file']."'>".$row[file]."</a></font>";
	else
	echo "No Files attached.";
	echo "<br>";
	if($id == $row[teacherid])
	{
		echo "<br><font size=2 color=red>";
		echo "<b>[</b><a style='font-color: red;' href='deletenote.php?nid=".$row[notesid]."'>";
		echo "Delete Note";
		echo "</a><b>]</b>";
		echo "</font>";
	}
	echo "</div>";
}
?>
</div>
	</div>
