<?php
include_once('db.php');
if ($_POST['nextlevel'] == "3") {
  if ($_POST['ass3comments'] != '') {
    $change_status = mysql_query("UPDATE `contacts` SET mstatus='1', manager_emp_id='" . $_SESSION['userid'] . "', manager_emp_name='" . $_SESSION['user'] . "',  man_comments='" . mysql_real_escape_string($_POST['comments']) . "',  man_comment1='" . mysql_real_escape_string($_POST['comments2']) . "', mposition='" . $_POST['position'] . "',totalexperince='" . $_POST['totalexperince'] . "',relevantexperince='" . $_POST['relevantexperince'] . "',recruiter='" . $_POST['recruiter'] . "',msource='" . $_POST['source'] . "',teamallocated='" . $_POST['teamallocated'] . "',ci='" . $_POST['ci'] . "',pk='" . $_POST['pk'] . "',tk='" . $_POST['tk'] . "',co='" . $_POST['co'] . "',ad='" . $_POST['ad'] . "',fx='" . $_POST['fx'] . "',ass3comments='" . mysql_real_escape_string($_POST['ass3comments']) . "',nextlevel='" . $_POST['nextlevel'] . "',man_updated_date='" . date('Y-m-d') . "', updated_at='" . date('Y-m-d') . "', updated_by='" . $_SESSION['user'] . "' WHERE id='" . $_REQUEST['cid'] . "'") or die(mysql_error());
  } else {
    $change_status = mysql_query("UPDATE `contacts` SET mstatus='3', manager_emp_id='" . $_SESSION['userid'] . "', manager_emp_name='" . $_SESSION['user'] . "',  man_comments='" . mysql_real_escape_string($_POST['comments']) . "',  man_comment1='" . mysql_real_escape_string($_POST['comments2']) . "', mposition='" . $_POST['position'] . "',totalexperince='" . $_POST['totalexperince'] . "',relevantexperince='" . $_POST['relevantexperince'] . "',recruiter='" . $_POST['recruiter'] . "',msource='" . $_POST['source'] . "',teamallocated='" . $_POST['teamallocated'] . "',ci='" . $_POST['ci'] . "',pk='" . $_POST['pk'] . "',tk='" . $_POST['tk'] . "',co='" . $_POST['co'] . "',ad='" . $_POST['ad'] . "',fx='" . $_POST['fx'] . "',ass3comments='" . mysql_real_escape_string($_POST['ass3comments']) . "',nextlevel='" . $_POST['nextlevel'] . "',man_updated_date='" . date('Y-m-d') . "', updated_at='" . date('Y-m-d') . "', updated_by='" . $_SESSION['user'] . "' WHERE id='" . $_REQUEST['cid'] . "'") or die(mysql_error());
  }
} else {
  $change_status = mysql_query("UPDATE `contacts` SET mstatus='1', manager_emp_id='" . $_SESSION['userid'] . "', manager_emp_name='" . $_SESSION['user'] . "',  man_comments='" . mysql_real_escape_string($_POST['comments']) . "',  man_comment1='" . mysql_real_escape_string($_POST['comments2']) . "', mposition='" . $_POST['position'] . "',totalexperince='" . $_POST['totalexperince'] . "',relevantexperince='" . $_POST['relevantexperince'] . "',recruiter='" . $_POST['recruiter'] . "',msource='" . $_POST['source'] . "',teamallocated='" . $_POST['teamallocated'] . "',ci='" . $_POST['ci'] . "',pk='" . $_POST['pk'] . "',tk='" . $_POST['tk'] . "',co='" . $_POST['co'] . "',ad='" . $_POST['ad'] . "',fx='" . $_POST['fx'] . "',ass3comments='" . mysql_real_escape_string($_POST['ass3comments']) . "',nextlevel='" . $_POST['nextlevel'] . "',man_updated_date='" . date('Y-m-d') . "', updated_at='" . date('Y-m-d') . "', updated_by='" . $_SESSION['user'] . "' WHERE id='" . $_REQUEST['cid'] . "'") or die(mysql_error());
}


if(!empty($_POST['contact_mstatus'])){
  if($_POST['contact_mstatus'] == 'rejected'){
    mysql_query("UPDATE `contacts` SET mstatus='2',manager_emp_id='".$_SESSION['userid']."', manager_emp_name='".$_SESSION['user']."', man_updated_date='".date('Y-m-d')."', updated_at='".date('Y-m-d')."', updated_by='".$_SESSION['user']."' WHERE id='".$_POST['cid']."'") or die(mysql_error());
  }else{
    mysql_query("UPDATE contacts set mstatus='1' where id=".$_POST['cid']);
  }
}

header('location:man_dashboard.php?msg=u');
?>
