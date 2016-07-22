<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$q = mysql_fetch_array(mysql_query("SELECT * FROM students WHERE studentid = '$id' LIMIT 1"));
?>
<div class="header">
		<a href='home.php'><img src="images/logo.png" style="padding: 20px;"></a>
		<div style="float: right; padding: 35px; padding-right: 70px;">
		You have been logged in as <b><?php echo $q['fname']." ".$q['lname']; ?></b>.
		<br><a href="logout.php" style='color: blue'>Log out</a>
		</div>
	</div>
