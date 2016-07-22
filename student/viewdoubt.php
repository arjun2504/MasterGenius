<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$sdet = mysql_fetch_array(mysql_query("SELECT * FROM students WHERE studentid = '$id' LIMIT 1"));
?>
<div class="content">
<div class="con">
<h1>Doubts & Answers</h1>
<h3>Question</h3>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php
$qid = $_GET['qid'];
$data = mysql_fetch_array(mysql_query("SELECT * FROM doubts WHERE doubtid = '$qid' AND dept = '$sdet[dept]' LIMIT 1"));
echo nl2br($data['question']);
$nam = mysql_fetch_array(mysql_query("SELECT fname, lname FROM students WHERE studentid = '$data[studentid]' LIMIT 1"));
echo "<br><br><font size='2px'>Asked by: <b>".$nam[fname]." ".$nam[lname]."</b> (".$data['studentid'].")</font>";
echo "<h3>Answer</h3>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;";
echo nl2br($data['answer']);
echo "<br><br>";
echo "<b>Reference Link: <a href='".$data[link]."' target='_blank'>View</a></b>";
$tdata = mysql_fetch_array(mysql_query("SELECT fname, lname, teacherid FROM teachers WHERE teacherid = '$data[lastid]'"));
echo "<br><br><font size='2px'>Answered by: <b>".$tdata[fname]." ".$tdata[lname]."</b> (".$tdata['teacherid'].")</font>";
?>
<br><br>
<center><a href='<?php echo $_SERVER[HTTP_REFERER]; ?>'><input type='submit' value='Back' style='padding: 10px'></a></center>
</div>
</div>