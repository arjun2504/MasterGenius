<?php
include_once "connect.php";
if($_GET[type] == 'faculty')
{
	$q = mysql_query("SELECT * FROM teachers");
	while($r = mysql_fetch_array($q))
	{
		if($r[teacherid] == $_POST[id]);
		{
			header("Location: $_SERVER[HTTP_REFERER]"."&exists=1");
		}
		
	}
	if($_POST['password1'] != $_POST['password2'])
	{
		header("Location: $_SERVER[HTTP_REFERER]"."&match=1");
	}
	else if($_POST['password1'] == $_POST['password2'])
	{
		mysql_query("INSERT INTO teachers values('$_POST[id]','$_POST[sal]','$_POST[fname]','$_POST[lname]','$_POST[password1]','$_POST[dept]')");
		header("Location: login.php"."?sup=1");
	}
	else
	{	echo "<center>An error occurred!</center>";
	}
}
else if($_GET[type] == 'student')
{
	$q = mysql_query("SELECT * FROM students");
	while($r = mysql_fetch_array($q))
	{
		if($r[studentid] == $_POST[id]);
		{
			header("Location: $_SERVER[HTTP_REFERER]"."&exists=1");
		}
		
	}
	if($_POST['password1'] != $_POST['password2'])
	{
		header("Location: $_SERVER[HTTP_REFERER]"."&match=1");
	}
	else if($_POST['password1'] == $_POST['password2'])
	{
		mysql_query("INSERT INTO students values('$_POST[id]','$_POST[fname]','$_POST[lname]','$_POST[password1]','$_POST[year]','$_POST[section]','$_POST[dept]','$_POST[gender]')");
		header("Location: login.php"."?sup=1");
	}
	else
	{	echo "<center>An error occurred!</center>";
	}
}
else
{
	echo "<center>You went out of the box!</center>";
}
?>