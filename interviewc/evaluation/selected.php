<?php include_once('db.php');

$change_status=mysql_query("UPDATE `contacts` SET status='1', eval_emp_id='".$_SESSION['userid']."', eval_emp_name='".$_SESSION['user']."', CSevalrating='".$_POST['CSevalrating']."', DSevalrating='".$_POST['DSevalrating']."',SKPevalrating='".$_POST['SKPevalrating']."',Criteria_ill='".$_POST['Criteria_ill']."',SKLevalrating='".$_POST['SKLevalrating']."',Criteria_indesign='".$_POST['Criteria_indesign']."',SKIDevalrating='".$_POST['SKIDevalrating']."',Criteria_acrobat='".$_POST['Criteria_acrobat']."',

  SKAevalrating='".$_POST['SKAevalrating']."',
  rating_animate_cc='".$_POST['rating_animate_cc']."',
  rating_html5='".$_POST['rating_html5']."',
  rating_edge='".$_POST['rating_edge']."',

  training_comments='".$_POST['training_comments']."',TRevalrating='".$_POST['TRevalrating']."',recomended='".$_POST['recomended']."', eval_comments='".$_POST['othercomments']."',eval_updated_date='".date('Y-m-d')."', updated_at='".date('Y-m-d')."', updated_by='".$_SESSION['user']."' WHERE id='".$_REQUEST['cid']."'") or die(mysql_error());

header('location:eval_dashboard.php?msg=u');


?>