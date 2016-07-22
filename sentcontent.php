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
if(!isset($_GET['id']))
{
?>
<div class='content'>
<div class='con'>
<h1>Sent items</h1>
<?php
$query = mysql_query("SELECT * FROM messages WHERE fromid = '$id' AND del1 IS NULL ORDER BY t DESC");
while($row = mysql_fetch_array($query))
{
	echo "<a href='sent.php?id=".$row[mid]."'>";
	echo "<div class='message'>";
	$mi = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$row[toid]' LIMIT 1"));
	if(!isset($mi[0]))
	{
		$mi = mysql_fetch_array(mysql_query("SELECT * FROM students WHERE studentid = '$row[toid]' LIMIT 1"));
	}
	echo "<b>".$mi[fname]." ".$mi[lname]."</b> <font color='gray' size='2px'><i>";
	echo substr($row[message], 0, 45);
	echo "</i></font>";
	echo "</a>";
	echo "<div class='options'>";
	echo "<a href='mdelete.php?sid=".$row[mid]."' title='Delete'><img src='images/delete.gif' align='middle'></img></a>";
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
$meid = mysql_fetch_array(mysql_query("SELECT * FROM messages WHERE mid = '$mid' AND fromid = '$id' LIMIT 1"));
$mi = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$meid[toid]' LIMIT 1"));
if(!isset($mi[0]))
{
		$mi = mysql_fetch_array(mysql_query("SELECT * FROM students WHERE studentid = '$meid[toid]' LIMIT 1"));
}
echo "Sent to: ".$mi[fname]." (".$meid[toid].") ";
?>
</h2>
<div style='width:97%; padding: 10px'>
<div style='width:auto; word-wrap: break-word; padding: 10px;'>
<?php
$mus = $meid[message];
echo nl2br($mus);
?>
</div></div><br><br><center>
<a href="<?php echo $_SERVER[HTTP_REFERER]; ?>"><input type='button' value='Back' style='padding: 10px'></a></center>
<?php } ?>
</div>
</div>