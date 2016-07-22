<?php
include "connect.php";
session_start();
$var=$_SESSION['id'];
if(isset($var)){
include "home.php";
}else{
?>
<html>
<head>
<title>
MasterGenius
</title>
</head>
<body>
<center>
<form action='' method="post">
<input type='text' name='id' placeholder='Student/Teacher ID'><Br>
<input type='password' name='p' placeholder='Password'><br>
<input type='submit' value='Login' name='s'>
</form>
<?php
@$ss=$_POST['s'];
if(isset($ss)){
$id=$_POST['id'];
$p=$_POST['p'];
$get=mysql_fetch_array(mysql_Query("SELECT * FROM teachers WHERE teacherid='$id' AND password='$p'"));
$get1=mysql_fetch_array(mysql_Query("SELECT * FROM students WHERE studentid='$id' AND password='$p'"));
if($id!=$get['teacherid'] && $p!=$get['password'] || $id!=$get1['studentid'] && $p!=$get1['password'])
{
	echo "Username or Password is incorrect";
}
else
{
	session_start();
	$_SESSION['id']=$id;
	$_SESSION['password']=$p;
	header('Refresh:0');
}
}
}
?>
