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
<html>
<head>
<title>
MasterGenius
</title>



<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular&subset=Latin,Cyrillic">
</head>
<body>
<center>
<h1>Contact Browser</h1>
<form action='studentcontact.php' method='get' id='frm1'>
Whom do you want to message? 
<select name='type'>
<option value='faculty'>Faculty</option>
<option value='student'>Student</option>
</select><br><br>
Which department he/she belongs to? <br><br>
<input type='radio' name='dept' value='CSE' onclick="formSubmit()" >CSE</option> 
<input type='radio' name='dept' value='ECE' onclick="formSubmit()" >ECE</option> 
<input type='radio' name='dept' value='EIE' onclick="formSubmit()" >EIE</option> 
<input type='radio' name='dept' value='AUTO' onclick="formSubmit()" >Auto</option> 
<input type='radio' name='dept' value='MECH' onclick="formSubmit()" >Mech</option> 
<input type='radio' name='dept' value='IT' onclick="formSubmit()" >IT</option> 
<input type='radio' name='dept' value='EEE' onclick="formSubmit()" >EEE</option> 
</form>
</center>
<script>
function formSubmit()
{
document.getElementById("frm1").submit();
}

</script>
</body>
</html>