<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$sdet = mysql_fetch_array(mysql_query("SELECT * FROM students WHERE studentid = '$id' LIMIT 1"));
$tid = $_GET['tid'];
?>
<div class="content">
<div class="con">
<h1>Descriptive Questions</h1>
<?php
$query = mysql_query("SELECT * FROM testq WHERE teacherid = $tid AND year='$sdet[year]' ORDER BY marks");
$i = 1;
$mrk = mysql_fetch_array(mysql_query("SELECT SUM(marks) FROM testq WHERE teacherid = '$tid' AND year = '$sdet[year]'"));
echo "<div id='prtbox'>";
echo "Total mark:s <b>".$mrk[0]."</b><br><br>";
while($row = mysql_fetch_array($query))
{
	echo "<div class='qboxx'>";
	echo $i.". ";
	echo $row[question];
	echo "<br><font color='gray' size='1.5px' style='align: right'>";
	echo $row[marks]." marks</font>";
	echo "</div>";
	$i++;
}
?>
</div>
<p align="right">
<a href="#" onclick="printDiv('prtbox')">Click Here to Print this Question paper</a></p>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</div>
</div>