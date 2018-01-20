<?php include_once('connection1.php');
mysql_query("delete from hub_reason where eid='".$_GET['eid']."'") or die(mysql_error());
header("location:resignselection.php");
	
	
		

?>