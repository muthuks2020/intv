<?php include_once('db.php');

$change_status=mysql_query("UPDATE `contacts` SET status='1', eval_emp_id='".$_SESSION['userid']."', eval_emp_name='".$_SESSION['user']."',  eval_comments='".mysql_real_escape_string($_POST['comments'])."', updated_at='".date('Y-m-d')."', updated_by='".$_SESSION['user']."' WHERE id='".$_REQUEST['cid']."'") or die(mysql_error());
header('location:eval_dashboard.php?msg=u');


?>