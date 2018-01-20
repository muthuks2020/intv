<?php
//session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Interview</title>
</head>
<?php
include_once("connection.php");
?>
<body>
<?php

if ($_REQUEST['submit'] != '') {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $employer = $_POST['employer'];
    $desig = $_POST['desig'];
    $exp = $_POST['experience'];
    $ctc = $_POST['ctc'];
    $tkHome = $_POST['tkhome'];
    $position = $_POST['position'];
    $friends = $_POST['friends'];
    $before = $_POST['before'];
    $details = $_POST['details'];
    $email = $_POST['email'];
    $source = $_POST['source'];
    $location = $_POST['location'];

    if ($_POST['telephone'] = "") {
        $first_name = NULL;
        $telephone = NULL;
        $Companyname_name = NULL;
        $Designation_name = NULL;
    } else {
        $first_name = $_POST['first_name'];
        $telephone = $_POST['telephone'];
        $Companyname_name = $_POST['Companyname_name'];
        $Designation_name = $_POST['Designation_name'];
    }
    if ($_POST['telephone1'] = "") {
        $first_name1 = NULL;
        $telephone1 = NULL;
        $Companyname_name1 = NULL;
        $Designation_name1 = NULL;
    } else {
        $first_name1 = $_POST['first_name1'];
        $telephone1 = $_POST['telephone1'];
        $Companyname_name1 = $_POST['Companyname_name1'];
        $Designation_name1 = $_POST['Designation_name1'];
    }


    $empname = $_POST['empName'];
    $empid = $_POST['empId'];
    $emploc = $_POST['empLocation'];
    $conNum = $_POST['conNum'];


    $check_mobile_no = mysql_query("SELECT * FROM contacts WHERE contact IN ('" . $number . "')") or die(mysql_error());
    $num_rows = mysql_num_rows($check_mobile_no);
    $data = mysql_fetch_array($check_mobile_no);
    $reg_date = $data['register_on'];
    $startTimeStamp = strtotime("$reg_date");
    //echo "<br/>";
    $thirty_days = strtotime("+35 days", $startTimeStamp);
//	echo "<br/>";
    $time_to_days = date('Y-m-d', $thirty_days);
    //echo "<br/>";
    //$startTimeStamp = strtotime("$reg_date");

    //$endTimeStamp = strtotime("$time_to_days");

    if ($source == 'Employee Referral') {
        $sql = mysql_query("INSERT INTO `empfrnd`(`emp_id`, `emp_name`, `location`, `mobile`,`cand_name`,`cand_mob`) VALUES ('$empid','" . ucfirst($empname) . "','$emploc','$conNum','$name','$number')") or die(mysql_error());
    }


    $timeDiff = abs($thirty_days - $startTimeStamp);

    $numberDays = $timeDiff / 86400;  // 86400 seconds in one day


    $numberDays = intval($numberDays);


    //$today_date = "2014-07-01";
//$timeStamp = strtotime($today_date);

    $t = time();

    if (($num_rows == 1) and ($thirty_days < $t)) {
        //echo "already user but above 35 days";

        //exit;

        if ($details == 'fresher') {

            $sql = mysql_query("INSERT INTO `contacts`(`name`, `contact`, `email`, `details`,`employer`, `designation`, `experience`, `ctc`,`take_home`,`position`, `friends`, `source`, `interviewed`, `register_on`,`location`,`first_name`,`telephone`,`Companyname_name`,`Designation_name`,`first_name1`,`telephone1`,`Companyname_name1`,`Designation_name1`) VALUES ('" . ucfirst($name) . "','$number','$email','$details','NULL','NULL','0','0','0','" . ucfirst($position) . "','$friends', '$source','$before', '" . date("Y-m-d") . "','" . $location . "','" . $first_name . "','" . $telephone . "','" . $Companyname_name . "','" . $Designation_name . "','" . $first_name1 . "','" . $telephone1 . "','" . $Companyname_name1 . "','" . $Designation_name1 . "')") or die(mysql_error());
        } else {
            $sql = mysql_query("INSERT INTO `contacts`(`name`, `contact`,`email`, `details`, `employer`, `designation`, `experience`, `ctc`,`take_home`,`position`, `friends`, `source`, `interviewed`, `register_on`,`location`,`first_name`,`telephone`,`Companyname_name`,`Designation_name`,`first_name1`,`telephone1`,`Companyname_name1`,`Designation_name1`) VALUES ('" . ucfirst($name) . "','$number','$email','$details','" . ucfirst($employer) . "','" . ucfirst($desig) . "','$exp','$ctc','$tkHome','" . ucfirst($position) . "','$friends','$source','$before', '" . date("Y-m-d") . "','" . $location . "','" . $first_name . "','" . $telephone . "','" . $Companyname_name . "','" . $Designation_name . "','" . $first_name1 . "','" . $telephone1 . "','" . $Companyname_name1 . "','" . $Designation_name1 . "')") or die(mysql_error());
        }
        $succ = "Submited value Successfully Inserted";

        mysql_query("UPDATE contacts SET status = '0' WHERE position = 'Visualizer' OR position = 'CSE' OR position = 'ImageArtist'") or die(mysql_error());

        //$_SESSION['success'] = $succ;
        header('location:employeenew.php?success=' . $succ . '&value=' . $position);
    } else if ($num_rows <= 0) {
        //echo "newuser";
        //exit;
        if ($details == 'fresher') {

            $sql = mysql_query("INSERT INTO `contacts`(`name`, `contact`, `email`, `details`,`employer`, `designation`, `experience`, `ctc`,`take_home`,`position`, `friends`, `source`, `interviewed`, `register_on`,`location`,`first_name`,`telephone`,`Companyname_name`,`Designation_name`,`first_name1`,`telephone1`,`Companyname_name1`,`Designation_name1`) VALUES ('" . ucfirst($name) . "','$number','$email','$details','NULL','NULL','0','0','0','" . ucfirst($position) . "','$friends', '$source','$before', '" . date("Y-m-d") . "','" . $location . "','" . $first_name . "','" . $telephone . "','" . $Companyname_name . "','" . $Designation_name . "','" . $first_name1 . "','" . $telephone1 . "','" . $Companyname_name1 . "','" . $Designation_name1 . "')") or die(mysql_error());
        } else {
            $sql = mysql_query("INSERT INTO `contacts`(`name`, `contact`,`email`, `details`, `employer`, `designation`, `experience`, `ctc`,`take_home`,`position`, `friends`, `source`, `interviewed`, `register_on`,`location`,`first_name`,`telephone`,`Companyname_name`,`Designation_name`,`first_name1`,`telephone1`,`Companyname_name1`,`Designation_name1`) VALUES ('" . ucfirst($name) . "','$number','$email','$details','" . ucfirst($employer) . "','" . ucfirst($desig) . "','$exp','$ctc','$tkHome','" . ucfirst($position) . "','$friends','$source','$before', '" . date("Y-m-d") . "','" . $location . "','" . $first_name . "','" . $telephone . "','" . $Companyname_name . "','" . $Designation_name . "','" . $first_name1 . "','" . $telephone1 . "','" . $Companyname_name1 . "','" . $Designation_name1 . "')") or die(mysql_error());
        }
        $succ = "Submited value Successfully Inserted";

        mysql_query("UPDATE contacts SET status = '0' WHERE position = 'Visualizer' OR position = 'CSE' OR position = 'ImageArtist'") or die(mysql_error());

        //$_SESSION['success'] = $succ;
        header('location:employeenew.php?success=' . $succ . '&value=' . $position);
    } else {
        //echo "below 35 days";
        //	exit;
        //$unsucc = "Already you are taken this Test";
        header("location:index.php?acontact");
    }


}

?>
</body>
</html>