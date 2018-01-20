<?php
session_start();
include_once('connection1.php');

$approve_date = date("Y-m-d H:i:s");

//print_r($_POST['eid']);

/*$empname = mysql_query("select * from `hub_user` where `eid`=".$_SESSION['userid']);
$empres = mysql_fetch_array($empname);*/

		/*$appQury = mysql_query("update `hub_request` set cancel_comments  = '".$_POST['comments']."', status = '0' where `employee_id` = '".$_POST['eid']."'");*/
		
			$appQury = mysql_query("update `hub_request` set opmng_comments  = '".$_POST['comments']."',  ops_man_updated_by ='".$_SESSION['user']."',ops_man_updated_at='".$approve_date."', status='2', opmstatus = '2',vpstatus='3',cvpstatus='3' where `rid` = '".$_POST['eid']."'");
			
header("location:operationManager.php?msg=u");
?>