<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$sdet = mysql_fetch_array(mysql_query("SELECT * FROM students WHERE studentid = '$id' LIMIT 1"));
?>
<div class="content">
<div class="con">
<h1>Ask Doubt</h1>
<p align="right"><a href="home.php?m=3&view=all" style="color: blue">Click here to view doubts by my mates.</a></p>
<?php if($_GET[asked]) echo "<center><div class='successmsg'>Doubt asked! Await for faculty's reply.</div></center><br>"; ?>
<form action="askdoubt.php" method="post">
Ask your doubt to your faculty and your faculty will answer your query.<br><br>
<textarea name="doubt" style='padding: 10px;' placeholder="Start typing your doubt here..." cols="63" rows="10" required></textarea><br><br>
<center><input type="submit" style="padding: 10px;" value="Ask"></center>
</form>
<hr>
<h2>Doubts you've asked recently..</h2>
<?php
$q = mysql_query("SELECT * FROM doubts WHERE dept = '$sdet[dept]' AND studentid = '$sdet[studentid]' ORDER BY t DESC");
while($row = mysql_fetch_array($q))
{
	if($row[answer] != NULL)
	{
		echo "<div class='doubox'>";
		echo nl2br($row[question]);
		echo "<font size='1px' color='green'> &nbsp;-&nbsp;&nbsp;<a href='home.php?m=3&qid=".$row[doubtid]."'>View Answer</a></font>";
		echo "<br>";
		echo "<font size='1px' color='gray'>";
		echo $row[t];
		echo "</font>";
		echo "</div>";
	}
	else
	{
		echo "<div class='douboxu'>";
		echo nl2br($row[question]);
		echo "<font size='1px' color='gray'><i> &nbsp;-&nbsp;&nbsp;Awaiting for faculty to answer.</i></font>";
		echo "<br>";
		echo "<font size='1px' color='gray'>";
		echo $row[t];
		echo "</font>";
		echo "</div>";
	}
}
?>
</div>
	</div>
