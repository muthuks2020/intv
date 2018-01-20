<?php //session_start();?>
<?php 
$link = @mysql_connect('localhost', 'root', 'ad@pro123');
//$link = @mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
else{
	
	//echo "connect";
}
mysql_select_db("personal",$link);
$item_per_page = 13;

?>
