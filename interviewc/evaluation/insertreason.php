<?php session_start();include_once('connection1.php');


$insert = mysql_query("insert into hub_reason(eid,uid,mapto,manager,reason,status,created_at,created_by,updated_at,updated_by) values('".$_REQUEST['eid']."','".$_SESSION['uid']."','".$_SESSION['userid']."','".$_SESSION['userid']."','','','".date('Y-m-d H:i:s')."','".$_SESSION['user']."','','')") or die(mysql_error());

header("location:resignselection.php");


?>