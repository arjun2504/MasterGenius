<?php include_once "connect.php";
session_start();
error_reporting(0);
$id = $_SESSION['id'];
$doubtid = $_GET['did'];
?>
<div class="content">
<div class="con" style='word-wrap: break-word;'>
<h1>Answer Doubts</h1>
<center>
<?php if($_GET['sent']==1) echo "<div class='successmsg'>&#10003; You answered the doubt. How awesome teacher you are!</div>"; ?>
</center>
<b>Question:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
<?php
$q = mysql_fetch_array(mysql_query("SELECT * FROM doubts WHERE doubtid = $doubtid LIMIT 1"));
echo nl2br($q['question']);
echo "<br><br><i>Asker: ";
$sdet = mysql_fetch_array(mysql_query("SELECT * FROM students WHERE studentid = $q[studentid] LIMIT 1"));
echo $sdet[fname]." ".$sdet[lname]." (".$sdet[studentid].") - ".$sdet[dept]." ".$sdet[section];
echo "</i>";
?>
<br><br>
<b>Answer:</b><br>
<form method="post" action="answersub.php">
<textarea name='ans' style='padding: 10px;' cols="63" rows="10" placeholder="Write your answer here" required>
<?php echo $q[answer]; ?>
</textarea>
<br><br>
Reference link: <input type='text' name='link' value='<?php echo $q[link]; ?>' size=53 required><br><br>
<?php echo "<input type='hidden' name='did' value='".$doubtid."'>"; ?>
<center>
<a href='<?php echo $_SERVER[HTTP_REFERER]; ?>'><input type='button' value='Back'></a><input type='submit' value='Answer'>
</center><br>
<?php
$sd = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$q[lastid]'"));

if($q[lastid] != NULL)
echo "Last answered by: <b>".$sd[fname]." ".$sd[lname]."</b> (".$sd[teacherid].")";
else
echo "You are the first to answer.";
?>

</div>
</div>