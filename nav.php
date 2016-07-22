<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
?>
<div class="nav">
		<div class="menu">
		<a href='home.php'><img src="images/homeicon.png" height=22 align=middle /></a>
		</div>
		<div class="menu">
		<a href='messages.php'>
		Inbox
		<?php
		$count = mysql_fetch_array(mysql_query("SELECT count(mid) FROM messages WHERE toid = '$id' AND isread = '1'"));
		if($count[0] !=0)
		{
			echo " <b>(".$count[0].")</b>";
		}
		?>
		</a>
		</div>
		<div class="menu">
		<a href="forum.php">Discussion</a>
		</div>
	</div>