<?php
include "connect.php";
session_start();
$var=@$_SESSION['id'];
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
<?php include_once "login.php"; } ?>
