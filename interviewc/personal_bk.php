<?php
//session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Interview</title>
</head>
<?php
include_once("connection.php");
?>
<body>
<?php

if($_REQUEST['submit'] !='')
{
	
	$name =	$_POST['name'];
	$number = $_POST['number'];
	$employer = $_POST['employer'];
	$desig = $_POST['desig'];
	$exp = $_POST['experience'];
	$ctc = $_POST['ctc'];
	$position = $_POST['position'];
	$friends = $_POST['friends'];
	$before = $_POST['before'];
	$details = $_POST['details'];
	$email = $_POST['email'];
	$source = $_POST['source'];
	

	
	$check_mobile_no = mysql_query("SELECT * FROM contacts WHERE contact IN ('".$number."')") or die(mysql_error());
	 $num_rows = mysql_num_rows($check_mobile_no);
	$data = mysql_fetch_array($check_mobile_no);
	$reg_date = $data['register_on'];
	$startTimeStamp = strtotime("$reg_date");
	//echo "<br/>";
 $thirty_days = strtotime("+35 days",$startTimeStamp);
//	echo "<br/>";
	 $time_to_days = date('Y-m-d', $thirty_days);
	//echo "<br/>";
	//$startTimeStamp = strtotime("$reg_date");

	 //$endTimeStamp = strtotime("$time_to_days");

	
	$timeDiff = abs($thirty_days - $startTimeStamp);

	$numberDays = $timeDiff/86400;  // 86400 seconds in one day


 $numberDays = intval($numberDays);

	
	//$today_date = "2014-07-01";
//$timeStamp = strtotime($today_date);
	
 $t=time();

	if(($num_rows == 1) and ($thirty_days < $t))
	{
			//echo "already user but above 35 days";
			//exit;
		if($details =='fresher')
		{
		
			$sql = mysql_query("INSERT INTO `contacts`(`name`, `contact`, `email`, `details`,`employer`, `designation`, `experience`, `ctc`, `position`, `friends`, `source`, `interviewed`, `register_on`,`location`) VALUES ('".ucfirst($name)."','$number','$email','$details','NULL','NULL','0','0','".ucfirst($position)."','$friends', '$source','$before', '".date("Y-m-d")."','Chennai')") or die(mysql_error());
		}
		else
		{
			$sql = mysql_query("INSERT INTO `contacts`(`name`, `contact`,`email`, `details`, `employer`, `designation`, `experience`, `ctc`, `position`, `friends`, `source`, `interviewed`, `register_on`,`location`) VALUES ('".ucfirst($name)."','$number','$email','$details','".ucfirst($employer)."','".ucfirst($desig)."','$exp','$ctc','".ucfirst($position)."','$friends','$source','$before', '".date("Y-m-d")."','Chennai')") or die(mysql_error());
		}
			$succ = "Submited value Successfully Inserted";
			//$_SESSION['success'] = $succ;
			header('location:employee.php?success='.$succ.'&value='.$position);
		}
	else if($num_rows <=0)
	{
		//echo "newuser";
		//exit;
		if($details =='fresher')
		{
		
			$sql = mysql_query("INSERT INTO `contacts`(`name`, `contact`, `email`, `details`,`employer`, `designation`, `experience`, `ctc`, `position`, `friends`, `source`, `interviewed`, `register_on`,`location`) VALUES ('".ucfirst($name)."','$number','$email','$details','NULL','NULL','0','0','".ucfirst($position)."','$friends', '$source','$before', '".date("Y-m-d")."','Chennai')") or die(mysql_error());
		}
		else
		{
			$sql = mysql_query("INSERT INTO `contacts`(`name`, `contact`,`email`, `details`, `employer`, `designation`, `experience`, `ctc`, `position`, `friends`, `source`, `interviewed`, `register_on`,`location`) VALUES ('".ucfirst($name)."','$number','$email','$details','".ucfirst($employer)."','".ucfirst($desig)."','$exp','$ctc','".ucfirst($position)."','$friends','$source','$before', '".date("Y-m-d")."','Chennai')") or die(mysql_error());
		}
			$succ = "Submited value Successfully Inserted";
			//$_SESSION['success'] = $succ;
			header('location:employee.php?success='.$succ.'&value='.$position);
		}	
		
	
	else
	{
		//echo "below 35 days";
		//	exit;
		//$unsucc = "Already you are taken this Test";	
		header("location:index.php?acontact");
	}
	
	

}

?>
</body>
</html>