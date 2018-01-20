<?php include_once('connection1.php');


$getman = mysql_query("select *from hub_manpower where reporting_manager_id='".$_REQUEST['mid']."'") or die(mysql_error());

?>
<p>Resign select employee:&nbsp;</p>
<select onchange="selectemp(this.value);">
<option value=''>--select--</option>
<?php while($getres = mysql_fetch_array($getman)){?>
<option value="<?=$getres['eid']?>"><?=$getres['name']?></option>
<?php } ?>

</select>