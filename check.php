<?php
include_once "connect.php";
if($_POST[utype] == 'student') {
	$var = mysql_fetch_array(mysql_query("SELECT studentid, password FROM students WHERE studentid = '$_POST[id]' AND password = '$_POST[p]' LIMIT 1"));
	if($var[studentid] == $_POST[id] && $var[password] == $_POST[p]) {
		session_start();
		$_SESSION['id']=$_POST[id];
		$_SESSION['password']=$_POST[p];
		header('Location: student/home.php');
	}
	else {
		header('Location: index.php'.'?error=1');
	}
}
else if($_POST[utype] == 'faculty'){
	$var = mysql_fetch_array(mysql_query("SELECT teacherid, password FROM teachers WHERE teacherid = '$_POST[id]' AND password = '$_POST[p]' LIMIT 1"));
	if($var[teacherid] == $_POST[id] && $var[password] == $_POST[p]) {
		session_start();
		$_SESSION['id']=$_POST[id];
		$_SESSION['password']=$_POST[p];
		header('Location: home.php');
	}
	else {
		header('Location: index.php'.'?error=1');
	}
}
?>