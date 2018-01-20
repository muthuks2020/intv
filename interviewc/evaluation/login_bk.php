<?php session_start();?>
<?php 
if(isset($_REQUEST['name']))
{
define('SERVER',"localhost");
define('USERNAME',"root");
//define('PASSWORD',"");
define('PASSWORD',"ad@pro123");
define('DATABASE',"hub");
@mysql_connect(SERVER,USERNAME,PASSWORD);
mysql_select_db(DATABASE);

$query=mysql_query("select * from `hub_user` where `eid` ='".mysql_real_escape_string($_POST['name'])."' and `password`='".mysql_real_escape_string($_POST['password'])."'");
$res=mysql_fetch_array($query);

$name = $res['name'];
if(mysql_num_rows($query)>0)
{
@mysql_connect(SERVER,USERNAME,PASSWORD);
mysql_select_db("personal");

	if($_POST['name']=='admin')
{
	$_SESSION['user']=$res['name'];
	$_SESSION['userid']="admin";
	$_SESSION['usertype']=3;
	header("location:admin_dashboard.php");
}
else
{
	
	$query1=mysql_query("select * from `elogin` where `manager` ='".$_POST['name']."'") or die(mysql_error());
	$res1=mysql_fetch_array($query1);
	if(mysql_num_rows($query1)>0)
	{
		$_SESSION['user']=$res['name'];
		
			$_SESSION['userid']=$res1['manager'];
			$_SESSION['usertype']=2;			
			header("location:man_dashboard.php");
		
	}
	else
	{
	 
		
		$_SESSION['user']=$res['name'];
		
		$_SESSION['userid']=$res['eid'];
		$_SESSION['usertype']=0;
		header("location:eval_dashboard.php");
		
		
	}
	
}
}
else
{
	header("location:index.php?msg=e");	
}
}
?>