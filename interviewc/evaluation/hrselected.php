<?php include_once('db.php');

$change_status=mysql_query("UPDATE `contacts` SET hrstatus='1', hrcomments='".mysql_real_escape_string($_POST['comments'])."',hrname='".$_SESSION['user']."',hr_updated_date='".date('Y-m-d')."', updated_at='".date('Y-m-d')."', updated_by='".$_SESSION['user']."' WHERE id='".$_REQUEST['cid']."'") or die(mysql_error());
header('location:admin_dashboard.php?msg=u');


?>