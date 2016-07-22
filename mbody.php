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
if(!isset($_GET['id']))
{
?>
<div class='content'>
<div class='con'>
<h1>Inbox</h1>
<?php
$query = mysql_query("SELECT * FROM messages WHERE toid = '$id' AND del2 IS NULL ORDER BY t DESC");
while($row = mysql_fetch_array($query))
{
	echo "<a href='messages.php?id=".$row[mid]."'>";
	if($row[isread] == '2')
		echo "<div class='message'>";
	else if($row[isread] == '1')
		echo "<div class='messageread'>";
	$mi = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$row[fromid]' LIMIT 1"));
	if(!isset($mi[0]))
	{
		$mi = mysql_fetch_array(mysql_query("SELECT * FROM students WHERE studentid = '$row[fromid]' LIMIT 1"));
	}
	echo "<b>".$mi[fname]." ".$mi[lname]."</b> <font color='gray' size='2px'><i>";
	echo substr($row[message], 0, 45);
	echo "</i></font>";
	echo "</a>";
	echo "<div class='options'>";
	echo "<a href='mdelete.php?iid=".$row[mid]."' title='Delete'><img src='images/delete.gif' align='middle'></img></a>";
	echo "</div>";
	echo "</div>";
}
}
else
{
?>
<div class='content'>
<div class='con'>
<h1>
<?php
$mid = $_GET['id'];
mysql_query("UPDATE messages SET isread = '2' WHERE mid = '$mid'");
$meid = mysql_fetch_array(mysql_query("SELECT * FROM messages WHERE mid = '$mid' AND toid = '$id' LIMIT 1"));
$mi = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$meid[fromid]' LIMIT 1"));
if(!isset($mi[0]))
{
		$mi = mysql_fetch_array(mysql_query("SELECT * FROM students WHERE studentid = '$meid[fromid]' LIMIT 1"));
}
echo $mi[fname]." (".$meid[fromid].") ";
?>
</h1>
<div style='width:auto; word-wrap: break-word; padding: 10px;'>
<?php
$mus = $meid[message];
echo nl2br($mus);
?>
</div><br><br>
<form action='reply.php' method='post'>
<textarea name='message' style='padding: 10px;' placeholder="Start typing your reply here..." cols="63" rows="10" required>
</textarea>
<input type='hidden' name='fromid' value='<?php echo $meid[fromid]; ?>'>
<center><a href='<?php echo $_SERVER[HTTP_REFERER]; ?>'><input type='button' value='Back' style='padding: 10px;'></a> <input type='submit' style='padding: 10px;' value='Send'></center>
</form>
<?php
if($_GET[replied])
	echo "<div class='successmsg'><center>&#10003; Replied! You may view your message in <a href='sent.php' style='color: blue'>Sent items</a> folder.</center></div>";
?>
<?php
}
?>
</div>
</div>

