<?php 
//if(isset($_POST['submit']) !='')
//{
	session_start();
include_once('connection1.php');
//print_r($_SESSION);

if(!isset($_SESSION['userid']))
{	
	header("location:index.php");
}
//print_r($_POST);



	
	$frecords1= mysql_query("SELECT *FROM `hub_request` WHERE rid='".$_POST['hubrid']."'")or die(mysql_error());
			$getR1 = mysql_fetch_assoc($frecords1);
	
	
	$datetime = date("Y-m-d H:i:s");
	
	
	if($_POST['omapproved'] !='')
	{
		$opmstatus	= $_POST['omapproved']; 
	}
	else
	{
		$opmstatus	= $getR1["opmstatus"];
		
	}
	if($_POST['vpapproved'] !='')
	{
		$vpapproved	= $_POST['vpapproved']; 
	}
	else
	{
		$vpapproved	= $getR1["vpstatus"];
		
	}
	if($_POST['svpapproved'] !='')
	{
		$svpapproved	= $_POST['svpapproved']; 
	}
	else
	{
		$svpapproved	= $getR1["cvpstatus"];
		
	}
	
	
	mysql_query("UPDATE hub_request SET opmng_comments='".mysql_real_escape_string($_POST['opmngcomm'])."',vp_comments='".mysql_real_escape_string($_POST['vpcomm'])."',cvp_comments='".mysql_real_escape_string($_POST['cvpcomm'])."',closed_by='closed',closed_date='".$datetime."',closed_comments='".mysql_real_escape_string($_POST['hrcom'])."',hr_updated_at='".$datetime."',hr_updated_by='".$_SESSION['user']."' WHERE rid='".$_POST['hubrid']."'") or die(mysql_error());
	
	
		header("location:admin_backfill.php?msg=u");
	
//}
?>