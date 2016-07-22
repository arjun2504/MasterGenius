<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$q = mysql_fetch_array(mysql_query("SELECT dept FROM teachers WHERE teacherid = '$id'"));
?>
<div class="content">
<div class="con">
<h1>Frame Questions</h1>
<?php if($_GET[ins]) echo "<center><div class='successmsg'>&#10003; Question inserted!</div></center>"; ?><br>
Insert Descriptive Question:<br><br>
<form action="insertques.php" method="post">
<input class="textboxtest" type="text" style="padding:10px" name="question" placeholder="Click to Write a Question..." required><br><br>
Mark: <input type="text" name="mark" size="3" onkeypress="return isNumberKey(event)" required><br><br>
<center><input type="submit" value="Insert Question" style="padding: 10px;"></center>
</form>
<font size="2px">Note: You will be able to insert questions one by one.</font><br>
<hr>
<h2>Available Descriptive Questions</h1>
<?php if($_GET[descset]) echo "<center><div class='successmsg'>&#10003; Task done!</div></center>"; ?>
<p align="justify"><i>Choose from the below questions to create a descriptive question paper.</i></p>
<form action="setdesc.php" method="post">
I want  
<select name="year">
<option value=1>1st Year</option>
<option value=2>2nd Year</option>
<option value=3>3rd Year</option>
<option value=4>4th Year</option>
</select> <?php echo $q[dept]; ?> students to take up this examination.<br><br>
<?php
$query = mysql_query("SELECT * FROM dques WHERE dept = '$q[dept]' AND teacherid = '$id' ORDER BY questionid DESC");
while($row = mysql_fetch_array($query))
{
	echo "<div class='quesbox'>";
	echo "<div style='float: left; padding: 7px'>";
	echo "<input type='checkbox' name='selques[]' value='".$row[question]."'>";
	echo "</div>";
	echo "<div style='padding: 7px'>";
	echo $row[question]."<br><font color='#A6A6A6'>".$row[marks]." marks</font>";
	echo "<br>";
	echo "<a href='deleteq.php?nid=".$row[questionid]."' style='float: right'>";
	echo "<font color='red' size='1px'><b>[</b></font><font size='1px'>Delete</font><font color='red' size='1px'><b>]</b></font>";
	echo "</a>";
	echo "</div>";
	echo "</div>";
	echo "<input type='hidden' name='marks[]' value='".$row[marks]."'>";
}
?>
<br><center><input type="submit" value="Set Selected Questions" style="padding: 10px"></center>
</form>
</div>
</div>
 <SCRIPT language=Javascript>
       <!--
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : event.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       //-->
    </SCRIPT>