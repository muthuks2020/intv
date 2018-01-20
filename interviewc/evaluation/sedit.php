<?php include_once('db.php');


$hrdit=mysql_query("UPDATE `contacts` SET eval_comments='".mysql_real_escape_string($_POST['evalcomm'])."',  man_comments='".mysql_real_escape_string($_POST['mancomm'])."', hrcomments='".mysql_real_escape_string($_POST['hrcom'])."', updated_at='".date('Y-m-d')."', updated_by='".$_SESSION['user']."' WHERE id='".$_POST['cid']."'") or die(mysql_error());



header('location:admin_dashboard.php?msg=u');


?>
