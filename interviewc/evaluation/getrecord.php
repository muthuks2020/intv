<?php
include_once('connection.php');
$ID = $_REQUEST['nid'];

			$frecords = mysql_query("SELECT *FROM `contacts` WHERE id='".$ID."'")or die(mysql_error());
			$getR = mysql_fetch_assoc($frecords);


?>
   <style>
body,h2{
	margin:0px;
	padding:0px;
		
	}
.wrapper {
width: 1000px;
margin: 0 auto;
font-family: Arial, Helvetica, sans-serif;
background: antiquewhite;
padding-bottom: 30px;
}
.emp {
width:900px;
/*background: #F3F3F3;*/
border-radius: 5px;
margin:0 auto;
padding: 10px;

}
h2{
font-size: 18px;
line-height: 33px;
color: #444444;
text-shadow: 0 1px 0 #FFF;
font-weight:bold;
	}
.cont{
		font-size:13px;
		font-weight:bold;
		color:#444444;}
.eval{
	width:900px;
	margin:0 auto;
	
	
	padding: 10px;
	/*background: #F3F3F3;*/
		}		
	.man{
	width:900px;
	margin:0 auto;
	
	
	padding: 10px;
	/*background: #F3F3F3;*/}
	.hr{
	width:900px;
	margin:0 auto;
	
	
	padding: 10px;
	/*background: #F3F3F3;*/}
	.sub_wrap {
	background: white;
	padding: 10px;
	border-radius: 8px 8px 0px 0px;
	border-top: 5px solid #FFAE35;
	box-shadow: 2px 2px 2px 2px #E0DFDC;
	word-wrap:break-word;
}
.sub_wrap:hover{
	background:#E0DFDC;}
	.rdate
	{
	font-size: 10px;
/*padding-left: 100px;*/

	}
</style>
<div class="wrapper">
<div class="emp">
<div class="sub_wrap">
<h2>Candidate name:&nbsp;<span style="font-size:12px"><?=$getR["name"]?></span><span style="float:right"><img src="popup-box/img/user.png" title="User"/></span></h2>
<span class="cont">Position applied:</span>&nbsp;<?=$getR["position"]?><br/>
<span class="rdate">Position applied date:&nbsp;<?=$getR["register_on"]?></span>

</div>
</div>

<div class="eval">
<div class="sub_wrap">
<h2>Assessor1 name:&nbsp;<span style="font-size:12px"><?=$getR["eval_emp_name"]?></span><span style="float:right"><img src="popup-box/img/eval.png" title="User"/></span></h2>
<span class="cont">Comments:</span>&nbsp;<?=$getR["eval_comments"]; ?><br/>
<span class="rdate">Assessor1 Reviewed Date:&nbsp;<?=$getR["eval_updated_date"]; ?></span>

</div>
</div>

<div class="man">
<div class="sub_wrap">
<h2>Assessor2 name:&nbsp;<span style="font-size:12px"><?=$getR["manager_emp_name"]?></span><span style="float:right"><img src="popup-box/img/manager.png" title="User"/></span></h2>
<span class="cont">Comments:</span>&nbsp;<?=$getR["man_comments"]?><br/>
<span class="rdate">Assessor2 Reviewed Date:&nbsp;<?=$getR["man_updated_date"]; ?></span>

</div>
</div>

<div class="hr">
<div class="sub_wrap">
<h2>Hr Name:&nbsp;<span style="font-size:12px"><?=$getR["hrname"]?></span><span style="float:right"><img src="popup-box/img/hr.png" title="User"/></span></h2>
<span class="cont">Comments:</span>&nbsp;<?=$getR["hrcomments"]?><br/>
<span class="rdate">HR Reviewed Date:&nbsp;<?=$getR["hr_updated_date"]; ?></span>

</div>
</div>

</div>
