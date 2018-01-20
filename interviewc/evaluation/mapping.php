<?php session_start();
		include_once('connection1.php');
$app_list_count = count($_POST['approved_ID']);
$select_list_count = count($_POST['selected_ID']);


	$current_date = date("Y-m-d H:i:s");

mysql_query("INSERT INTO `hub_backfill_map`(`rid`, `cid`, `Request_type`,`approved_emp_name`, `app_emp_desig`, `approved_emp_cluster`, `approved_emp_type`, `approved_emp_date`, `selected_emp_name`, `selected_emp_pos`, `selected_emp_register`, `selected_emp_details`, `selected_emp_employer`, `mapping`,`updated_at`, `updated_by`) VALUES ('".$_POST['approved_ID']."','".$_POST['selected_ID']."','".$_POST['request_type']."','".$_POST['approved_emp_name']."','".$_POST['app_emp_desig']."','".$_POST['approved_emp_cluster']."','".$_POST['approved_emp_type']."','".$_POST['approved_emp_date']."','".$_POST['selected_emp_name']."','".$_POST['selected_emp_pos']."','".$_POST['selected_emp_register']."','".$_POST['selected_emp_details']."','".$_POST['selected_emp_employer']."','1','".$current_date."','".$_SESSION['user']."')") or die(mysql_error());	

mysql_query("UPDATE `hub_request` SET `mapping`='1' WHERE `rid`='".$_POST['approved_ID']."'")or die(mysql_error());
	
	

include_once('connection.php');
mysql_query("UPDATE `contacts` SET `mapping`='1' WHERE `id`='".$_POST['selected_ID']."'")or die(mysql_error());

header("location:queuelist.php?msg=s");

?>