<?php include_once "connect.php";
$id = $_SESSION['id']
?>
<div class="content">
<div class="con">
<h1>Answer Doubts</h1>
<table width="800px" height="0.1px">
<tr>
<td>
Unanswered Doubts: 
<?php
$q = mysql_query("SELECT * FROM doubts WHERE answer IS NULL");
$count = 0;
while($row = mysql_fetch_array($q))
	$count++;
echo $count;
?>
</td>
<td>
<a href="home.php?m=3&view=all"><font color="blue">Click here to view all doubts</font></a>
</td>
</tr>
</table>
<br><br>
<?php
if($_GET[view] == 'all')
	$q = mysql_query("SELECT * FROM doubts ORDER BY t");
else
	$q = mysql_query("SELECT * FROM doubts WHERE answer IS NULL");
	while($row = mysql_fetch_array($q))
	{
		echo "<div class='doubtbox'>";
		$askedby = $row['studentid'];
		$sdet = mysql_fetch_array(mysql_query("SELECT * FROM students WHERE studentid = '$askedby' LIMIT 1"));
		echo "<div class='doubtcol'><div class='title'>Question</div>";
		echo $row['question'];
		echo "</div>";
		echo "<a href='?m=3&did=".$row['doubtid']."'>";
		echo "<div class='answer'>";
		echo "<div style='padding-top: 40px;'><center>Click to Answer</center></div>";
		echo "</div>";
		echo "</a>";
		echo "<div class='asked'>Asked by: ";
		echo "<b>".$sdet['fname']."</b> (".$row['studentid'].") - ".$sdet['dept']." ".$sdet['section'];
		echo "</div>";
		echo "</div>";
	}
	
?>
</div>
	</div>
