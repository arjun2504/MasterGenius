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
$tid = $_GET['tid'];
$last = mysql_fetch_array(mysql_query("SELECT id FROM showthread ORDER BY id DESC"));
$newid = $last[0] + 1;
$tid = $_GET['tid'];
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
$uploads_dir = 'C:\xampp\htdocs\mg\student\file';
foreach ($_FILES["file"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["file"]["tmp_name"][$key];
        $name = $id."_".$_FILES["file"]["name"][$key];
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
    }
}
if($_FILES[file][name][$key] == NULL)
{
	mysql_query("INSERT INTO showthread values($newid, '$_POST[content]',$tid,NOW(),'$id',NULL)");
}
else
{
	mysql_query("INSERT INTO showthread values($newid, '$_POST[content]',$tid,NOW(),'$id','$name')");
}
header("Location: $_SERVER[HTTP_REFERER]");
?>