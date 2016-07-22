<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$sdet = mysql_fetch_array(mysql_query("SELECT * FROM students WHERE studentid = '$id' LIMIT 1"));
$tid = $_GET['tid'];
?>
<div class="content">
<div class="con">
<h1>Unit Test</h1>
<?php
$chk = mysql_fetch_array(mysql_query("SELECT studentid, marks FROM testappear WHERE testid = '$tid' AND studentid = '$sdet[studentid]' LIMIT 1"));
$lid = mysql_fetch_array(mysql_query("SELECT subid FROM testappear ORDER BY subid DESC LIMIT 1"));
$lastid = $lid[0] + 1;
if($chk[marks] == NULL)
{
if($chk[studentid] == NULL)
{
	mysql_query("INSERT INTO testappear values ($tid, '$sdet[studentid]',NULL,NOW(),$lastid,'$sdet[dept]')");
?>
<form action='evaluate.php' method='get'>
<?php
$q = mysql_query("SELECT * FROM qpaper WHERE testid = $tid LIMIT 1");
$n = 1;
while($row = mysql_fetch_array($q))
{
	echo "<br>";
	echo "<b>".$row[title]."</b><br><br>";
	//question 1
	echo "<b>";
	echo $n;
	echo ".</b>";
	echo " ";
	echo $row[q1];
	echo "<br><br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c1'>";
	echo $row[o11];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c2'>";
	echo $row[o12];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c3'>";
	echo $row[o13];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c4'>";
	echo $row[o14];
	$n++;
	
	//question 2
	echo "<br><br><b>";
	echo $n;
	echo ".</b>";
	echo " ";
	echo $row[q2];
	echo "<br><br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c1'>";
	echo $row[o21];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c2'>";
	echo $row[o22];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c3'>";
	echo $row[o23];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c4'>";
	echo $row[o24];
	$n++;
	
	
	//question 3
	echo "<br><br><b>";
	echo $n;
	echo ".</b>";
	echo " ";
	echo $row[q3];
	echo "<br><br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c1'>";
	echo $row[o31];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c2'>";
	echo $row[o32];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c3'>";
	echo $row[o33];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c4'>";
	echo $row[o34];
	$n++;
	
	
	//question 4
	echo "<br><br><b>";
	echo $n;
	echo ".</b>";
	echo " ";
	echo $row[q4];
	echo "<br><br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c1'>";
	echo $row[o41];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c2'>";
	echo $row[o42];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c3'>";
	echo $row[o43];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c4'>";
	echo $row[o44];
	$n++;
	
	
	//question 5
	echo "<br><br><b>";
	echo $n;
	echo ".</b>";
	echo " ";
	echo $row[q5];
	echo "<br><br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c1'>";
	echo $row[o51];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c2'>";
	echo $row[o52];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c3'>";
	echo $row[o53];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c4'>";
	echo $row[o54];
	$n++;
	
	
	//question 6
	echo "<br><br><b>";
	echo $n;
	echo ".</b>";
	echo " ";
	echo $row[q6];
	echo "<br><br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c1'>";
	echo $row[o61];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c2'>";
	echo $row[o62];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c3'>";
	echo $row[o63];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c4'>";
	echo $row[o64];
	$n++;
	
	
	//question 7
	echo "<br><br><b>";
	echo $n;
	echo ".</b>";
	echo " ";
	echo $row[q7];
	echo "<br><br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c1'>";
	echo $row[o71];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c2'>";
	echo $row[o72];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c3'>";
	echo $row[o73];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c4'>";
	echo $row[o74];
	$n++;
	
	
	//question 8
	echo "<br><br><b>";
	echo $n;
	echo ".</b>";
	echo " ";
	echo $row[q8];
	echo "<br><br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c1'>";
	echo $row[o81];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c2'>";
	echo $row[o82];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c3'>";
	echo $row[o83];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c4'>";
	echo $row[o84];
	$n++;
	
	
	//question 9
	echo "<br><br><b>";
	echo $n;
	echo ".</b>";
	echo " ";
	echo $row[q9];
	echo "<br><br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c1'>";
	echo $row[o91];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c2'>";
	echo $row[o92];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c3'>";
	echo $row[o93];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c4'>";
	echo $row[o94];
	$n++;
	
	
	//question 3
	echo "<br><br><b>";
	echo $n;
	echo ".</b>";
	echo " ";
	echo $row[q10];
	echo "<br><br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c1'>";
	echo $row[o101];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c2'>";
	echo $row[o102];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c3'>";
	echo $row[o103];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='radio' name='a".$n."' value='c4'>";
	echo $row[o104];
	$n++;
}
?>
<br><br><center>
<input type='hidden' name='ident' value='<?php
$identify = mysql_fetch_array(mysql_query("SELECT * FROM testappear WHERE subid = $lastid LIMIT 1"));
echo $identify[subid];
 ?>'>
<input style='padding:10px' type='submit' value='Finish Test'></center>
</form>
<?php
}
else
{
	//mysql_query("INSERT INTO testappear values ($tid, '$sdet[studentid]',NULL,NOW())");
	echo "You have already taken up or seen the question paper! No donut for you!";
}
}
else
{
	$ma = mysql_fetch_array(mysql_query("SELECT * FROM testappear WHERE testid = '$tid' AND studentid = '$sdet[studentid]' LIMIT 1"));
	if($ma[marks] >= 0 && $ma[marks] <7)
	{
		echo "You may need to improve the quality of your learning process. Better luck next time.";
		echo "";
		echo "<br>Your score is <b>".$ma[marks]." out of 10</b>.";
	}
	else if($ma[marks] >= 7 && $ma[marks] <=10)
	{
		echo "Congratulations! Your score is <b>".$ma[marks]." out of 10</b>.";
	}
	else
	{
		echo "This site guesses that you have seen the question paper. So, no donut for you!";
	}
}
?>
</div>
</div>