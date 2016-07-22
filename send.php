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
$msg11 = $_POST['message'];
$to = $_POST['to'];
$mmm = mysql_real_escape_string($msg11);
$msg = strip_tags(nl2br($mmm),'<br><br/>');
$flag = 0;
$fl = mysql_query("SELECT teacherid FROM teachers");
while($fll = mysql_fetch_array($fl))
{
	if($fll[teacherid]==$to)
	{
		$flag = 1;
	}
}
if($flag != 1)
{
		$fl = mysql_query("SELECT studentid FROM students");
		while($fll = mysql_fetch_array($fl))
		{
			if($fll[studentid]==$to)
			{
				$flag = 1;
			}
		}
}
if($flag == 0)
	if($_SERVER[HTTP_REFERER] == 'http://localhost/mg/student/compose.php' || $_SERVER[HTTP_REFERER] == 'http://127.0.0.1/mg/student/compose.php')
	header("Location: $_SERVER[HTTP_REFERER]"."?sent=2");
	else
	header("Location: $_SERVER[HTTP_REFERER]"."&sent=2");
else
{	
	$q = mysql_fetch_array(mysql_query("SELECT mid FROM messages ORDER BY mid DESC LIMIT 1"));
	$last = $q[0] + 1;
	mysql_query("INSERT INTO messages values($last,'$id','$to','$msg','1',NOW(),NULL,NULL)");
	if($_SERVER[HTTP_REFERER] == 'http://localhost/mg/compose.php' || $_SERVER[HTTP_REFERER] == 'http://127.0.0.1/mg/compose.php')
	header("Location: $_SERVER[HTTP_REFERER]"."?sent=1");
	else
	header("Location: $_SERVER[HTTP_REFERER]"."&sent=1");
	
}

?>