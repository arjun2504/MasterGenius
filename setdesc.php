<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$q = mysql_fetch_array(mysql_query("SELECT dept FROM teachers WHERE teacherid = '$id'"));
$sel = $_POST['selques'];
$count = count($sel);
$mark = $_POST['marks'];
$countm = count($mark);
$check = mysql_fetch_array(mysql_query("SELECT teacherid FROM testq WHERE teacherid = '$id' AND year = '$_POST[year]'"));
if($check)
{
	mysql_query("DELETE FROM testq WHERE teacherid = '$id'");
}
for($i=0; $i<$count;$i++)
{	
	mysql_query("INSERT INTO testq values('$sel[$i]','$mark[$i]','$id','$q[dept]','$_POST[year]')");
}
header("Location: $_SERVER[HTTP_REFERER]"."&descset=1");
?>