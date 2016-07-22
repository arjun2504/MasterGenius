<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$idfs = mysql_fetch_array(mysql_query("SELECT studentid FROM students WHERE studentid = '$id' LIMIT 1"));
//$idft = mysql_fetch_array(mysql_query("SELECT teacherid FROM WHERE teacherid = '$id' LIMIT 1"));
if($idfs[studentid] == $id)
	$sid = $_SESSION['id'];
else
	$tid = $_SESSION['id'];
$last = mysql_fetch_array(mysql_query("SELECT threadid FROM threads ORDER BY threadid DESC LIMIT 1"));
$new = $last[0] + 1;
$title = mysql_real_escape_string(strip_tags($_POST[title]));
$content = mysql_real_escape_string(strip_tags($_POST[content]));
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
$uploads_dir = 'C:\xampp\htdocs\mg\student\uploads';
foreach ($_FILES["file"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["file"]["tmp_name"][$key];
        $name = $id."_".$_FILES["file"]["name"][$key];
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
    }
}
if($_FILES[file][name][$key] == NULL)
{
	mysql_query("INSERT INTO threads values($new,'$title','$content','$_GET[id]','$id',NOW(),NULL)");
}
else
{
	mysql_query("INSERT INTO threads values($new,'$title','$content','$_GET[id]','$id',NOW(),'$name')");
}
header("Location: $_SERVER[HTTP_REFERER]");
?>