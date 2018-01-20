<?php
session_start();
?>
<?php
if (isset($_REQUEST['name'])) {
    define('SERVER', "localhost");
    define('USERNAME', "root");
    //define('PASSWORD',"");
    define('PASSWORD', "ad@pro123");
    define('DATABASE', "hub");
    @mysql_connect(SERVER, USERNAME, PASSWORD);
    mysql_select_db(DATABASE);
    date_default_timezone_set('Asia/Calcutta');
    $query = mysql_query("SELECT * FROM `hub_user` WHERE `eid` ='" . mysql_real_escape_string($_POST['name']) . "' AND `password`='" . mysql_real_escape_string($_POST['password']) . "'");
    $res = mysql_fetch_array($query);
    print_r($res);
    $_SESSION['is_allowed'] = ord($res['is_allowed']);


    $selectrepID = mysql_query("SELECT reporting_manager_id FROM `hub_request` GROUP BY reporting_manager_id");
    while ($remanager = mysql_fetch_array($selectrepID)) {
        $records[] = $remanager['reporting_manager_id'];
    }

    $name = $res['name'];
    if (mysql_num_rows($query) > 0) {
        @mysql_connect(SERVER, USERNAME, PASSWORD);
        mysql_select_db("personal");
        $admin = mysql_query("SELECT eid FROM `elogin` WHERE `hr` ='" . $_POST['name'] . "'") or die(mysql_error());
        $getVal = mysql_fetch_array($admin);
        //echo $getVal['eid'];
        //exit;
        if (mysql_num_rows($admin) > 0) {
            $_SESSION['user'] = $res['name'];
            $_SESSION['userid'] = $res['eid'];
            //$_SESSION['reporting_id'] = $records;
            $_SESSION['usertype'] = 3;
            header("location:maindashboard.php");
            //	header("location:admin_dashboard.php");
        } else {
            //echo "hh"; exit;

            $checkopsm = mysql_query("SELECT eid FROM `elogin` WHERE `opm` ='" . $_POST['name'] . "'") or die(mysql_error());
            $getopm = mysql_fetch_array($checkopsm);

            $checkvp = mysql_query("SELECT eid FROM `elogin` WHERE `vp` ='" . $_POST['name'] . "'") or die(mysql_error());
            $getvp = mysql_fetch_array($checkvp);

            $checkcvp = mysql_query("SELECT eid FROM `elogin` WHERE `cvp` ='" . $_POST['name'] . "'") or die(mysql_error());
            $getcvp = mysql_fetch_array($checkcvp);


            $query1 = mysql_query("SELECT * FROM `elogin` WHERE `manager` ='" . $_POST['name'] . "'") or die(mysql_error());
            $res1 = mysql_fetch_array($query1);

            if (mysql_num_rows($query1) > 0) {
                $_SESSION['user'] = $res['name'];
                $_SESSION['uid'] = $res['uid'];

                $_SESSION['userid'] = $res1['manager'];
                $_SESSION['usertype'] = 1;

                header("location:man_dashboard.php");
                 
            } elseif (mysql_num_rows($checkopsm) > 0) {

                $_SESSION['user'] = $res['name'];
                $_SESSION['uid'] = $res['uid'];
                $_SESSION['userid'] = $getopm['eid'];
                $_SESSION['usertype'] = 2;
              
                header("location:operationManager.php");

            } elseif (mysql_num_rows($checkvp) > 0) {

                $_SESSION['user'] = $res['name'];
                $_SESSION['uid'] = $res['uid'];
                $_SESSION['userid'] = $getvp['eid'];
                $_SESSION['usertype'] = 4;
                header("location:VP_dashboard.php");

            } elseif (mysql_num_rows($checkcvp) > 0) {

                $_SESSION['user'] = $res['name'];
                $_SESSION['userid'] = $getcvp['eid'];
                $_SESSION['usertype'] = 5;
                header("location:CVP_dashboard.php");

            } else {
                $query2 = mysql_query("SELECT * FROM `elogin` WHERE `mapto` ='" . $_POST['name'] . "'") or die(mysql_error());
                $res2 = mysql_fetch_array($query2);
                if (mysql_num_rows($query2) > 0) {
                    $_SESSION['user'] = $res['name'];
                    $_SESSION['uid'] = $res['uid'];
                    $_SESSION['userid'] = $res['eid'];
                    $_SESSION['usertype'] = 0;
                    header("location:eval_dashboard.php");
                } else {
                    $tmanager = mysql_query("SELECT * FROM `elogin` WHERE `eid` ='" . $res['eid'] . "' AND role ='tmanager'");
                    $fetch = mysql_fetch_array($tmanager);

                    if ($fetch) {
                        $_SESSION['user'] = $res['name'];
                        $_SESSION['uid'] = $res['uid'];
                        $_SESSION['userid'] = $res['eid'];
                        $_SESSION['usertype'] = 'tmanager';
                        header("location: tmanager_dashboard.php");
                    } else {
                        header("location:index.php?msg=e");
                    }
                }
            }
        }
    } else {
        header("location:index.php?msg=e");
    }
}
?>