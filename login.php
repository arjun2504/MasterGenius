<?php
include_once "connect.php";
@session_start();
$var=@$_SESSION['id'];
error_reporting(0);
?><html>
<head>
<title>
MasterGenius
</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/tip-yellowsimple.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script type="text/javascript" src="src/jquery.poshytip.js"></script>

<script type="text/javascript">
$(function(){
	$('#unameblock').poshytip({
		className: 'tip-yellowsimple',
		showOn: 'focus',
		alignTo: 'target',
		alignX: 'inner-left',
		alignY: 'top',
		offsetX: 10
	});
	
	$('#pwblock').poshytip({
		className: 'tip-yellowsimple',
		showOn: 'focus',
		alignTo: 'target',
		alignX: 'inner-left',
		alignY: 'top',
		offsetX: 10
	});
});
</script>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular&subset=Latin,Cyrillic">
</head>
<body>
<div class="container">
<div class="header">
		<a href='login.php'><img src="images/logo.png" style="padding: 20px;"></a>
		<div style="float: right; padding: 35px; padding-right: 70px;">
		</div>
	</div>
	
	
<div class="nav"></div>
<div class="meaw" style='height: auto'>
<?php if(!isset($_GET[mode]) && !isset($_GET[type]) && !isset($_GET[m])) { ?>
<center><br><br><br><h1>Login to your account</h1><br><br>

<div id="c">

<form action='check.php' id="basicform" method="post">
<?php
if(isset($_GET[sup]))
{
	echo "<center><div class='successmsg' style='width: 600px'>Signup successful! You may login now.</div></center>";
}
?><br>
<input style='width: 500px; height: 30px; background-color: #f3f6f8; border: none; font-size: 20px; text-align: center' type='text' name='id' placeholder='Student/Teacher ID' required><br><br>
<input style='width: 500px; height: 30px; background-color: #f3f6f8; border: none;  font-size: 20px; text-align: center' type='password' name='p' placeholder='Password' required><br><br>
<select name='utype' class='styled-select'>
<option value='faculty'>Faculty</option>
<option value='student'>Student</option>
</select><br><br>
<input type='submit' value='Login' name='s' style="background:none;border:0;color:#ff0000">
</form>
<?php
} 
else {
?>
<center><br><br><br>
<?php if(isset($_GET[m])) { ?>
	<form action="<?php echo "login.php?mode=1&step=2"; ?>" id="basicform" method="get">
	<h3>Step #1: You are a ...</h3><br>
	<select name='type' class='styled-select'>
<option value='faculty'>Faculty</option>
<option value='student'>Student</option>
</select><br><br>
<input type="submit" style="padding: 10px" value="Next Step">
</form>
<?php

}
else if($_GET[type]=='student')
{
echo "<h1>Step #2: Complete Details</h1><br><br>";
?>
<form action="signup.php?type=student" method="post">
<input style='width: 500px; height: 30px; background-color: #f3f6f8; border: none; font-size: 20px; text-align: center' type='text' name='id' placeholder='Your Student ID' required><br><br>
<?php
	if($_GET[exists] == 1)
	{
		echo "<font color='red'>You already exist in our database. Want to log in? <a href='login.php'>Click here</a></font><br><br>";
	}
?>
<input style='width: 500px; height: 30px; background-color: #f3f6f8; border: none; font-size: 20px; text-align: center' type='text' name='fname' placeholder='First Name' required><br><br>
<input style='width: 500px; height: 30px; background-color: #f3f6f8; border: none; font-size: 20px; text-align: center' type='text' name='lname' placeholder='Last Name' required><br><br>
<input style='width: 500px; height: 30px; background-color: #f3f6f8; border: none;  font-size: 20px; text-align: center' type='password' name='password1' placeholder='Desired Password here' required><br><br>
<input style='width: 500px; height: 30px; background-color: #f3f6f8; border: none;  font-size: 20px; text-align: center' type='password' name='password2' placeholder='Re-Enter Password' required><br><br>
<?php
	if($_GET[match] == 1)
	{
		echo "<font color='red'>Sorry, your password do not match!</font><br><br>";
	}
?>
<select name='year' class='styled-select' required>
<option value=''>To which year you belong to..</option>
<option value='1'>First year</option>
<option value='2'>Second year</option>
<option value='3'>Third year</option>
<option value='4'>Fourth year</option>
</select><br><br>
<select name='dept' class='styled-select' required>
<option value=''>Which stream you are in..</option>
<option value='CSE'>Computer Science and Engineering</option>
<option value='IT'>Information Technology</option>
<option value='MECH'>Mechanical Engineering</option>
<option value='ECE'>Electrical Communication Engineering</option>
<option value='EEE'>Electrical and Electronic Engineering</option>
<option value='EIE'>Electronic and Information Engineering</option>
<option value='AUTO'>Automobile Engineering</option>
</select><br><br>
<select name='section' class='styled-select' required>
<option value=''>Which section of your class you are in...</option>
<option value='A'>A</option>
<option value='B'>B</option>
<option value='C'>C</option>
</select><br><br>
<select name='gender' class='styled-select' required>
<option value=''>What are you..</option>
<option value='m'>Male</option>
<option value='f'>Female</option>
</select><br><br>
<input type="submit" value="Sign up" style="padding: 10px">
</form>
<?php
}
else if($_GET[type]=='faculty')
{ echo "<h3>Step #2: Complete Details</h3><br><br>"; ?>

<form action="signup.php?type=faculty" method="post">
<input style='width: 500px; height: 30px; background-color: #f3f6f8; border: none; font-size: 20px; text-align: center' type='text' name='id' placeholder='Your Teacher ID' required><br><br>
<?php
	if($_GET[exists] == 1)
	{
		echo "<font color='red'>You already exist in our database. Want to log in? <a href='login.php'>Click here</a></font><br><br>";
	}
?>
<select name='sal' class='styled-select' required>
<option value=''>How do you want us to mention you?</option>
<option value='Mr.'>Mr.</option>
<option value='Mrs.'>Mrs.</option>
<option value='Ms.'>Ms.</option>
<option value='Er.'>Er.</option>
<option value='Dr.'>Dr.</option>
</select><br><br>
<input style='width: 500px; height: 30px; background-color: #f3f6f8; border: none; font-size: 20px; text-align: center' type='text' name='fname' placeholder='First Name' required><br><br>
<input style='width: 500px; height: 30px; background-color: #f3f6f8; border: none; font-size: 20px; text-align: center' type='text' name='lname' placeholder='Last Name' required><br><br>
<input style='width: 500px; height: 30px; background-color: #f3f6f8; border: none;  font-size: 20px; text-align: center' type='password' name='password1' placeholder='Desired Password here' required><br><br>
<input style='width: 500px; height: 30px; background-color: #f3f6f8; border: none;  font-size: 20px; text-align: center' type='password' name='password2' placeholder='Re-Enter Password' required><br><br>
<?php
	if($_GET[match] == 1)
	{
		echo "<font color='red'>Sorry, your password do not match!</font><br><br>";
	}
?>
<select name='dept' class='styled-select' required>
<option value=''>Which stream you are in..</option>
<option value='CSE'>Computer Science and Engineering</option>
<option value='IT'>Information Technology</option>
<option value='MECH'>Mechanical Engineering</option>
<option value='ECE'>Electrical Communication Engineering</option>
<option value='EEE'>Electrical and Electronic Engineering</option>
<option value='EIE'>Electronic and Information Engineering</option>
<option value='AUTO'>Automobile Engineering</option>
</select><br><br>
<input type="submit" value="Sign up" style="padding: 10px">
</form>

<?php }
?>

<?php
}
?>
<br>
<br>
<?php
	if(isset($_GET[error]))
		echo "Error! Username/Password is incorect.";
?>

</div>
<?php include "keela.php"; ?>
</div>
</div>
</body>
</html>