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
?>
<div class="content">
<div class="con">
<h1>Write a message</h1>
<?php
	if($_GET[sent]==2)
		echo "<div class='failmsg'><center>&#10006; Message Sending Failed!</center></div>";
	else if($_GET[sent] == 1)
		echo "<div class='successmsg'><center>&#10003; Success! Your message was sent.</center></div>";
?>
<form action='send.php' method='post'>
<font size='4'>To</font> &nbsp;&nbsp;&nbsp;<input type="text" name="to"  style="width:430px; height: 30px; border: none; background-color: #f3f5f8; font-size: 20px" placeholder="Type recipient's ID here..." value="<?php if(isset($_GET[s])) echo $_GET[s];?>" required><input type='button' style='padding:5px' value='Browse...' onclick="return popitup('contacts.php')"><br>
<!--<font size='1.5'>&nbsp;&nbsp;&nbsp;Start typing the Faculty ID or Student ID above. You can refer the correct match below.</font>-->
<br>

Recently messaged IDs...
<div class='hintbox'>

<?php
$res = mysql_query("SELECT DISTINCT toid FROM messages WHERE fromid = '$id' ORDER BY t DESC LIMIT 5");
$rest = mysql_fetch_array(mysql_query("SELECT * FROM messages WHERE fromid = '$id' ORDER BY t DESC LIMIT 1"));
$i = 0;
$temp = $rest[toid];
$t = mysql_fetch_array(mysql_query("SELECT * FROM students WHERE studentid = '$temp'"));
if(!isset($t[0]))
	$t = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$temp'"));
if(!isset($t[section]))
	echo $temp." - <font color='gray' size='2'>".$t[sal]." ".$t[fname]." ".$t[lname]." of ".$t[dept]."</font><br>";
else
	echo $temp." - <font color='gray' size='2'>".$t[fname]." ".$t[lname]." of ".$t[dept]." ".$t[section]." section</font><br>";
while($r = mysql_fetch_array($res))
{
	if($r[toid] != $temp)
	{
		$temp = $r[toid];
		$t = mysql_fetch_array(mysql_query("SELECT * FROM students WHERE studentid = '$temp'"));
		if(!isset($t[0]))
			$t = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$temp'"));
		if(!isset($t[section]))
			echo $temp." - <font color='gray' size='2'>".$t[sal]." ".$t[fname]." ".$t[lname]." of ".$t[dept]."</font><br>";
		else
			echo $temp." - <font color='gray' size='2'>".$t[fname]." ".$t[lname]." of ".$t[dept]." ".$t[section]." section</font><br>";
		$i++;
	}
	if($i==5)
		break;
}
?>
</div>
<br><br>
Message:
<textarea name="message" style='padding: 10px;' placeholder="Start typing your message here..." cols="63" rows="10" required>
</textarea><br>
<br>
<center><input type='submit' value='Send' style='padding:10px'></center>
</form> 
</div>
</div>
<script language="javascript" type="text/javascript">
<!--
function popitup(url) {
	newwindow=window.open(url,'name','height=500,width=500');
	if (window.focus) {newwindow.focus()}
	return false;
}

// -->
</script>