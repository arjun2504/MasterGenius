<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$q = mysql_fetch_array(mysql_query("SELECT dept FROM teachers WHERE teacherid = '$id'"));
?>
<div class="content">
<div class="con">
<h1>Frame Questions</h1>
<p align="left" style="border-style: solid; border-width: 1px; padding: 10px;"><a href="home.php?m=2&descriptive=1" style="color: blue">Planning to frame a descriptive question paper? Click here</a></p>
<?php if(isset($_GET[set])) echo "<div class='successmsg'><center>&#10003; Success! Question Paper has been set for examination.</div></center>"; ?>
<p align="justify"><i>Note: You are now framing questions for unit test. This test will be taken up by the student who completes studying a particular unit. When their score is <b>7 out of 10</b> in this test, the student is considered to have finished studying the chapter.</i></p>
<form action="setpaper.php" method="post">
I want  
<select name="year">
<option value=1>1st Year</option>
<option value=2>2nd Year</option>
<option value=3>3rd Year</option>
<option value=4>4th Year</option>
</select> <?php echo $q[dept]; ?> students to take up this examination.<br><br>
<input type="text" name="title" class="textboxtest" placeholder="Enter Chapter Name or Test Title here...">
<br><br>
<!--Question 1-->
<b><font style="font-size: 20px">1.</b> <input class="textboxtest" type="text" name="q1" placeholder="Question 1"><br>
<input style="margin-left: 25px;" type="radio" name="a1" value="c1"> <input class="testbox" type="text" name="o11" placeholder="Option 1">
<input type="radio" name="a1" value="c2"> <input class="testbox" type="text" name="o12" placeholder="Option 2">
<input style="margin-left: 25px;"  type="radio" name="a1" value="c3"> <input class="testbox" type="text" name="o13" placeholder="Option 3">
<input type="radio" name="a1" value="c4"> <input class="testbox" type="text" name="o14" placeholder="Option 4">
<i><font size="2px">Select the best option for the question</font></i>
<br><br>

<!--Question 2-->
<b><font style="font-size: 20px">2.</b> <input class="textboxtest" type="text" name="q2" placeholder="Question 2"><br>
<input style="margin-left: 25px;" type="radio" name="a2" value="c1"> <input class="testbox" type="text" name="o21" placeholder="Option 1">
<input type="radio" name="a2" value="c2"> <input class="testbox" type="text" name="o22" placeholder="Option 2">
<input style="margin-left: 25px;"  type="radio" name="a2" value="c3"> <input class="testbox" type="text" name="o23" placeholder="Option 3">
<input type="radio" name="a2" value="c4"> <input class="testbox" type="text" name="o24" placeholder="Option 4">
<i><font size="2px">Select the best option for the question</font></i>
<br><br>

<!--Question 3-->
<b><font style="font-size: 20px">3.</b> <input class="textboxtest" type="text" name="q3" placeholder="Question 3"><br>
<input style="margin-left: 25px;" type="radio" name="a3" value="c1"> <input class="testbox" type="text" name="o31" placeholder="Option 1">
<input type="radio" name="a3" value="c2"> <input class="testbox" type="text" name="o32" placeholder="Option 2">
<input style="margin-left: 25px;"  type="radio" name="a3" value="c3"> <input class="testbox" type="text" name="o33" placeholder="Option 3">
<input type="radio" name="a3" value="c4"> <input class="testbox" type="text" name="o34" placeholder="Option 4">
<i><font size="2px">Select the best option for the question</font></i>
<br><br>

<!--Question 4-->
<b><font style="font-size: 20px">4.</b> <input class="textboxtest" type="text" name="q4" placeholder="Question 4"><br>
<input style="margin-left: 25px;" type="radio" name="a4" value="c1"> <input class="testbox" type="text" name="o41" placeholder="Option 1">
<input type="radio" name="a4" value="c2"> <input class="testbox" type="text" name="o42" placeholder="Option 2">
<input style="margin-left: 25px;"  type="radio" name="a4" value="c3"> <input class="testbox" type="text" name="o43" placeholder="Option 3">
<input type="radio" name="a4" value="c4"> <input class="testbox" type="text" name="o44" placeholder="Option 4">
<i><font size="2px">Select the best option for the question</font></i>
<br><br>

<!--Question 5-->
<b><font style="font-size: 20px">5.</b> <input class="textboxtest" type="text" name="q5" placeholder="Question 5"><br>
<input style="margin-left: 25px;" type="radio" name="a5" value="c1"> <input class="testbox" type="text" name="o51" placeholder="Option 1">
<input type="radio" name="a5" value="c2"> <input class="testbox" type="text" name="o52" placeholder="Option 2">
<input style="margin-left: 25px;"  type="radio" name="a5" value="c3"> <input class="testbox" type="text" name="o53" placeholder="Option 3">
<input type="radio" name="a5" value="c4"> <input class="testbox" type="text" name="o54" placeholder="Option 4">
<i><font size="2px">Select the best option for the question</font></i>
<br><br>

<!--Question 6-->
<b><font style="font-size: 20px">6.</b> <input class="textboxtest" type="text" name="q6" placeholder="Question 6"><br>
<input style="margin-left: 25px;" type="radio" name="a6" value="c1"> <input class="testbox" type="text" name="o61" placeholder="Option 1">
<input type="radio" name="a6" value="c2"> <input class="testbox" type="text" name="o62" placeholder="Option 2">
<input style="margin-left: 25px;"  type="radio" name="a6" value="c3"> <input class="testbox" type="text" name="o63" placeholder="Option 3">
<input type="radio" name="a6" value="c4"> <input class="testbox" type="text" name="o64" placeholder="Option 4">
<i><font size="2px">Select the best option for the question</font></i>
<br><br>

<!--Question 7-->
<b><font style="font-size: 20px">7.</b> <input class="textboxtest" type="text" name="q7" placeholder="Question 7"><br>
<input style="margin-left: 25px;" type="radio" name="a7" value="c1"> <input class="testbox" type="text" name="o71" placeholder="Option 1">
<input type="radio" name="a7" value="c2"> <input class="testbox" type="text" name="o72" placeholder="Option 2">
<input style="margin-left: 25px;"  type="radio" name="a7" value="c3"> <input class="testbox" type="text" name="o73" placeholder="Option 3">
<input type="radio" name="a7" value="c4"> <input class="testbox" type="text" name="o74" placeholder="Option 4">
<i><font size="2px">Select the best option for the question</font></i>
<br><br>

<!--Question 8-->
<b><font style="font-size: 20px">8.</b> <input class="textboxtest" type="text" name="q8" placeholder="Question 8"><br>
<input style="margin-left: 25px;" type="radio" name="a8" value="c1"> <input class="testbox" type="text" name="o81" placeholder="Option 1">
<input type="radio" name="a8" value="c2"> <input class="testbox" type="text" name="o82" placeholder="Option 2">
<input style="margin-left: 25px;"  type="radio" name="a8" value="c3"> <input class="testbox" type="text" name="o83" placeholder="Option 3">
<input type="radio" name="a8" value="c4"> <input class="testbox" type="text" name="o84" placeholder="Option 4">
<i><font size="2px">Select the best option for the question</font></i>
<br><br>

<!--Question 9-->
<b><font style="font-size: 20px">9.</b> <input class="textboxtest" type="text" name="q9" placeholder="Question 9"><br>
<input style="margin-left: 25px;" type="radio" name="a9" value="c1"> <input class="testbox" type="text" name="o91" placeholder="Option 1">
<input type="radio" name="a9" value="c2"> <input class="testbox" type="text" name="o92" placeholder="Option 2">
<input style="margin-left: 25px;"  type="radio" name="a9" value="c3"> <input class="testbox" type="text" name="o93" placeholder="Option 3">
<input type="radio" name="a9" value="c4"> <input class="testbox" type="text" name="o94" placeholder="Option 4">
<i><font size="2px">Select the best option for the question</font></i>
<br><br>

<!--Question 10-->
<b><font style="font-size: 20px">10.</b> <input class="textboxtest" type="text" name="q10" placeholder="Question 10"><br>
<input style="margin-left: 25px;" type="radio" name="a10" value="c1"> <input class="testbox" type="text" name="o101" placeholder="Option 1">
<input type="radio" name="a10" value="c2"> <input class="testbox" type="text" name="o102" placeholder="Option 2">
<input style="margin-left: 25px;"  type="radio" name="a10" value="c3"> <input class="testbox" type="text" name="o103" placeholder="Option 3">
<input type="radio" name="a10" value="c4"> <input class="testbox" type="text" name="o104" placeholder="Option 4">
<i><font size="2px">Select the best option for the question</font></i>
<br><br>

<center><input style="padding: 10px" type="submit" value="Set Question Paper"></center>

</form>
</div>
	</div>
