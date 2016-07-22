<?php include_once "connect.php";
$id = $_SESSION['id'];
$dep = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$id'"));
$q = mysql_query("SELECT * FROM notes WHERE dept = '$tdet[dept]' AND year = '$_GET[year]' ORDER BY t DESC");
while($row = mysql_fetch_array($q))
{
	echo "<div class='notesbox'>";
	echo "<div class='titlenotesimg'><img src='images/notes.png' height='50px' align='top'/></div>";
	$ro = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$id' LIMIT 1"));
	echo "<div class='titlenotes'><b><font size='5px'>".$row[title]."</font></b><br><font size='2px'>Posted by ".$ro[fname]." at ".$row[t]."</font></div>";
	echo "<br><div class='connotes'>".$row['content']."</div>";
	echo "<br><b><font size='2px'>Attachments: </b>";
	if(isset($row[file]))
	echo "<a href='files/".$row['file']."'>".$row[file]."</a></font>";
	else
	echo "No Files attached.";
	echo "<br>";
	if($id == $row[teacherid])
	{
		echo "<br><font size=2 color=red>";
		echo "<b>[</b><a style='font-color: red;' href='deletenote.php?nid=".$row[notesid]."'>";
		echo "Delete Note";
		echo "</a><b>]</b>";
		echo "</font>";
	}
	echo "</div>";
}
?>