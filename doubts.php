<?php include_once "connect.php";
$id = $_SESSION['id'];
$dep = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$id'"));
?>
<div class="content">
<div class="con">
<h1>Answer Doubts</h1>
<table width=500>
<tr>
<td>
<?php
if($_GET[view] == 'all')
$q = mysql_query("SELECT * FROM doubts WHERE dept = '$dep[dept]'");
else
$q = mysql_query("SELECT * FROM doubts WHERE answer IS NULL AND dept = '$dep[dept]'");
$count = 0;
while($row = mysql_fetch_array($q))
	$count++;
if($_GET[view] == 'all')
echo "Number of doubts: ".$count;
else
echo "Number of pending doubts: ".$count;
?>
</td>
<td>
<?php
if($_GET[view] == 'all')
{
?>
<a href="home.php?m=3"><font color="blue"><div style="float: right">
Click here to view pending doubts
</div></font></a>
<?php
}
else
{
?>
<a href="home.php?m=3&view=all"><font color="blue"><div style="float: right">
Click here to view all doubts
</div></font></a>
<?php
}
?>
</td>
</tr>
</table>
<br><br>
<?php
if($_GET[view] == 'all')
	$q = mysql_query("SELECT * FROM doubts WHERE dept = '$dep[dept]' ORDER BY t DESC");
else
	$q = mysql_query("SELECT * FROM doubts WHERE dept = '$dep[dept]' AND answer IS NULL ORDER BY t DESC");
	while($row = mysql_fetch_array($q))
	{
		echo "<div class='doubtbox'>";
		$askedby = $row['studentid'];
		$sdet = mysql_fetch_array(mysql_query("SELECT * FROM students WHERE studentid = '$askedby' AND dept = '$dep[dept]' LIMIT 1"));
		echo "<div class='doubtcol'><div class='title'>Question</div>";
		echo $row['question'];
		echo "</div>";
		echo "<a href='?m=3&did=".$row['doubtid']."'>";
		echo "<div class='answer'>";
		echo "<div style='padding-top: 40px;'><center>";
		if($row[answer] == NULL)
		{
		echo "Click to Answer";
		}
		else
		{
		echo "View/Edit Answer";
		}
		echo "</center></div>";
		echo "</div>";
		echo "</a>";
		echo "<div class='asked'>Asked by: ";
		echo "<b>".$sdet['fname']."</b> (".$row['studentid'].") - ".$sdet['dept']." ".$sdet['section'];
		echo "</div>";
		echo "<div style='float: right; margin-top: -25px; margin-right: 10px;'><font color='gray' size=2>".$row[t]."</font></div>";
		echo "</div>";
	}
	
?>
</div>
	</div>
