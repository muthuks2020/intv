<?php include_once('db.php');

$change_status=mysql_query("UPDATE `contacts` SET mstatus='2',manager_emp_id='".$_SESSION['userid']."', manager_emp_name='".$_SESSION['user']."', man_comments='".mysql_real_escape_string($_POST['comments'])."',man_updated_date='".date('Y-m-d')."', updated_at='".date('Y-m-d')."', updated_by='".$_SESSION['user']."' WHERE id='".$_POST['cid']."'") or die(mysql_error());
header('location:man_dashboard.php?msg=u');


?>
