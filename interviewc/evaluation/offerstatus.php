<?php session_start();
include_once('connection1.php');
$rid = $_REQUEST['rid'];
$offerstatus = $_REQUEST['offer'];
$current_date = date("Y-m-d H:i:s");


mysql_query("UPDATE `hub_request` SET `offer_status`='".$offerstatus."', offer_status_updated_at='".$current_date."', offer_status_updated_by='".$_SESSION['user']."'  WHERE rid='".$rid."'") or die(mysql_error()); 

?>