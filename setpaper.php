<?php
include_once "connect.php";
session_start();
$id = $_SESSION['id'];
$q = mysql_fetch_array(mysql_query("SELECT dept FROM teachers WHERE teacherid = '$id'"));
$last = mysql_fetch_array(mysql_query("SELECT testid FROM qpaper ORDER BY testid DESC LIMIT 1"));
$new_id = $last[testid] + 1;
mysql_query("INSERT INTO qpaper values($new_id,'$_POST[year]','$q[dept]','$_POST[title]','$_POST[q1]','$_POST[q2]','$_POST[q3]','$_POST[q4]','$_POST[q5]','$_POST[q6]','$_POST[q7]','$_POST[q8]','$_POST[q9]','$_POST[q10]','$_POST[o11]','$_POST[o12]','$_POST[o13]','$_POST[o14]','$_POST[o21]','$_POST[o22]','$_POST[o23]','$_POST[o24]','$_POST[o31]','$_POST[o32]','$_POST[o33]','$_POST[o34]','$_POST[o41]','$_POST[o42]','$_POST[o43]','$_POST[o44]','$_POST[o51]','$_POST[o52]','$_POST[o53]','$_POST[o54]','$_POST[o61]','$_POST[o62]','$_POST[o63]','$_POST[o64]','$_POST[o71]','$_POST[o72]','$_POST[o73]','$_POST[o74]','$_POST[o81]','$_POST[o82]','$_POST[o83]','$_POST[o84]','$_POST[o91]','$_POST[o92]','$_POST[o93]','$_POST[o94]','$_POST[o101]','$_POST[o102]','$_POST[o103]','$_POST[o104]','$_POST[a1]','$_POST[a2]','$_POST[a3]','$_POST[a4]','$_POST[a5]','$_POST[a6]','$_POST[a7]','$_POST[a8]','$_POST[a9]','$_POST[a10]','$id')");
header("Location: $_SERVER[HTTP_REFERER]"."?set=1");
?>