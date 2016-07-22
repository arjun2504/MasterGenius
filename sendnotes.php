<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$title11 = $_POST['title'];
$title = mysql_real_escape_string(strip_tags($title11));
$content = mysql_real_escape_string(strip_tags($_POST['content']));

$year = $_POST['year'];
$tdet = mysql_fetch_array(mysql_query("SELECT * FROM teachers WHERE teacherid = '$id' LIMIT 1"));
$temp = mysql_fetch_array(mysql_query("SELECT * FROM notes ORDER BY t DESC LIMIT 1"));
$last = $temp['notesid'];
$last = $last + 1;

if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }
$uploads_dir = 'C:\xampp\htdocs\mg\student\files';
foreach ($_FILES["file"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["file"]["tmp_name"][$key];
        $name = $id."_".$_FILES["file"]["name"][$key];
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
    }
}
if($_FILES[file][name][$key] == NULL)
{
	mysql_query("INSERT INTO notes values($last, '$id', '$tdet[dept]', NOW(), '$content', '$title', NULL, '$year')");
}
else
{
	mysql_query("INSERT INTO notes values($last, '$id', '$tdet[dept]', NOW(), '$content', '$title', '$name', '$year')");
}
header ("Location: $_SERVER[HTTP_REFERER]"."&sent=1");
?>
