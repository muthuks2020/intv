<?php session_start();
include_once('connection.php');
include_once('functions.php');?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Evaluation Form</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
        <link href="css/evaluation.css" rel="stylesheet">
 


   
        <script type="text/javascript" src="js/jquery-1.10.2.min.js"> </script>
		<script src="js/bootstrap.min.js"></script>
	  
       <script type="text/javascript">

function validation()
{
	//alert('x');
	//document.getElementById('comments1').innerHTML=""; 
	document.getElementById('recomendeds').innerHTML="";
	/*if( document.mycomment.comments.value == "" )
   {
     //alert( "Please provide your name!" );
	 document.getElementById('comments1').innerHTML="Please provide your Comments!"; 
     document.mycomment.comments.focus() ;
     return false;
   }*/
   
    if ( (document.mycomment.recomended[0].checked == false ) && ( document.mycomment.recomended[1].checked == false ) ) 
	{
		
		document.getElementById('recomendeds').innerHTML="Please choose Yes or No";
		return false;
	}
}
	   </script> 
     <style>
.error
{
	color:#F00;	
}
label
{
	font-weight:bold;	
}
.col-md-6 li
{
	list-style:none;
	
}

</style>
   
	</head>
	<!-- Header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-toggle"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="bootstrap/img/logo-1.png" alt="2adpro" /></a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
            <i class="glyphicon glyphicon-user"></i>Welcome <?php echo $_SESSION['user']?> <span class="caret"></span></a>
          <ul id="g-account-menu" class="dropdown-menu" role="menu">
           <!-- <li><a href="#">My Profile</a></li>-->
            <li><a href="logout.php"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div><!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
 <!--tabs-->
      <div class="container">
      <p id="mesE"></p>
      <script type="text/javascript">
		$(document).ready(function(e) {
			
        <?php 
		if(isset($_REQUEST['msg'])){
		if(@$_REQUEST['msg']=="u"){?>
			$("#mesE").append('<p id="msg_e" style="color:#F00; text-align:center">Successfully Updated</p>').slideDown("slow");
			setTimeout(function () {$('#msg_e').slideUp(function(){$(this).remove()});}, 3000);

		<?php } }?>
    
        });
        

				</script>
       <header>
  <div class="logo"><img src="assets/images/logo-.png" /></div>
  
  <div class="head">
  <span id="tit"><img src="assets/images/tit.png" /></span>
  </div>
 
  <div class="head-ash"><img src="assets/images/line.png" /><h2>Evaluator</h2></div>

  </header>
  
<?php 

$query=@mysql_query("SELECT *FROM `contacts` WHERE id ='".$_REQUEST['c']."'") or die(mysql_error());
$emp_name = mysql_fetch_array($query);	
	
?>

<div class="main">
        <form class="form-horizontal well" style="min-height:177px;" action="selected.php" name="mycomment" method="post" onSubmit="return validation()" >
        <input type="hidden" name="cid" value="<?=$_REQUEST['c']?>"/>
        
        
        <div class="row">
 			 <div class="col-md-6">
             	<li><label>Name of Candidate:</label>&nbsp;<?php echo $emp_name['name']; ?></li><br/>
                <li><label>Position Title:</label>&nbsp;<?php echo $emp_name['position']; ?></li><br/>
             </div>
  			 <div class="col-md-6">
             	<li><label>Interviewer(s):</label>&nbsp;<?=$_SESSION['user']?></li><br/>
             	<li><label>Date of Interview:</label>&nbsp;<?=date('d-m-Y',strtotime($emp_name['register_on']))?></li><br/>
              </div>
		</div>
       <!-- <label><b>Comments:</b><span class="error">*  </span></label>
	
        <textarea name="comments" rows="3" cols="5" style="width:100%; resize:none; float:left"></textarea>&nbsp;<span class="error" id="comments1"></span><br /><br />-->
        
       
 <table class="table " >
  <tr>
    <th scope="col" id="col-wid">Criteria</th>
    <th scope="col">Comments:(Be very specific; to support your rating)</th>
    <th scope="col">Rating</th>
    </tr>
 
 <tr>
    <td>Comprehension Skills</td>
    <td>Able to understand instructions clearly the first time itself and produce designs effectively.</td>
    <td>
        <select name="CSevalrating" class="form-control">
            <option value="na">na</option>
            <option value="5">5</option>
            <option value="4">4</option>
            <option value="3">3</option>
            <option value="2">2</option>
            <option value="1">1</option>
        </select>
    </td>

  </tr>
  <tr>
    <td>Design Skills</td>
    <td>Understands and able to produce work that visually reflects both the content and context of the ad using layouts, logo, color and typography.</td>
    <td>
        <select name="DSevalrating" class="form-control">
          <option value="na">na</option>
            <option value="5">5</option>
            <option value="4">4</option>
            <option value="3">3</option>
            <option value="2">2</option>
            <option value="1">1</option>
        </select>
    </td>

  </tr>
  <tr>
    <td>Software Knowledge</td>
    <td>Photoshop <br>
      <p>Clipping Path | Resolution | Action | Masks (Layer & Clipping) |
Image formats for Print | Color mode | Smart Objects
Timeline | Frames | Optimization | Resolution |Image formats for web</p></td>
    <td>
        <select name="SKPevalrating" class="form-control">
          <option value="na">na</option>
            <option value="5">5</option>
            <option value="4">4</option>
            <option value="3">3</option>
            <option value="2">2</option>
            <option value="1">1</option>
        </select>
    </td>

  </tr>
  <tr>
    <td> <!--<textarea name="Criteria_ill" required rows="3" cols="5" style="resize:none; width:100%" required></textarea>--></td>
    <td>illustrator<br>
      <p>Clipping path | Pathfinder | Attributes | Popular vector formats
Difference between Spot & Process color</p>
    </td>
    <td>
        <select name="SKLevalrating" class="form-control">
          <option value="na">na</option>
            <option value="5">5</option>
            <option value="4">4</option>
            <option value="3">3</option>
            <option value="2">2</option>
            <option value="1">1</option>
        </select>
    </td>

  </tr>
  <tr>
    <td><!--<textarea name="Criteria_indesign" rows="3" cols="5" style="resize:none; width:100%" required></textarea>--></td>
    <td>InDesign <br>
     <p>Preflight | Stylesheet (Character, Paragraph, Object, Table, GREP) |
Tabs and Tables| Tracking, Kerning, Leading | Links Panel | Seperation Preview | Ink Limit</p>
    </td>
    <td>
        <select name="SKIDevalrating" class="form-control">
          <option value="na">na</option>
            <option value="5">5</option>
            <option value="4">4</option>
            <option value="3">3</option>
            <option value="2">2</option>
            <option value="1">1</option>
        </select>
    </td>

  </tr>
  <tr>
    <td><!--<textarea name="Criteria_acrobat" rows="3" cols="5" style="resize:none; width:100%" required></textarea>--></td>
    <td>Animate CC <br>
      <p> Symbols | Library | Shortcuts | Reducing file size | Output formats | Types of tweening
Masking | FPS</p></td>
    <td>
        <select name="SKAevalrating" class="form-control">
          <option value="na">na</option>
            <option value="5">5</option>
            <option value="4">4</option>
            <option value="3">3</option>
            <option value="2">2</option>
            <option value="1">1</option>
        </select>
    </td>

  </tr>
   <tr>
    <td><!--<textarea name="Criteria_acrobat" rows="3" cols="5" style="resize:none; width:100%" required></textarea>--></td>
    <td>AS2/3 / HTML5 <br>
      </td>
    <td>
        <select name="SKAevalrating" class="form-control">
          <option value="na">na</option>
            <option value="5">5</option>
            <option value="4">4</option>
            <option value="3">3</option>
            <option value="2">2</option>
            <option value="1">1</option>
        </select>
    </td>

  </tr>
   <tr>
    <td><!--<textarea name="Criteria_acrobat" rows="3" cols="5" style="resize:none; width:100%" required></textarea>--></td>
    <td>Acrobat  Preflight, Extracting images | Running OCR 
      </td>
    <td>
        <select name="SKAevalrating" class="form-control">
          <option value="na">na</option>
            <option value="5">5</option>
            <option value="4">4</option>
            <option value="3">3</option>
            <option value="2">2</option>
            <option value="1">1</option>
        </select>
    </td>

  </tr>

 <tr>
    <td><!--<textarea name="Criteria_acrobat" rows="3" cols="5" style="resize:none; width:100%" required></textarea>--></td>
    <td>GWD / EDGE
      </td>
    <td>
        <select name="SKAevalrating" class="form-control">
          <option value="na">na</option>
            <option value="5">5</option>
            <option value="4">4</option>
            <option value="3">3</option>
            <option value="2">2</option>
            <option value="1">1</option>
        </select>
    </td>

  </tr>
  
  <tr>
    <td>(Training required)<br/>(Please specify the software)</td>
    <td colspan="2"><textarea name="training_comments" rows="3" cols="5" style="resize:none; width:100%" required></textarea></td>
    <!--<td>
        <select name="TRevalrating" class="form-control">
            <option value="5">5</option>
            <option value="4">4</option>
            <option value="3">3</option>
            <option value="2">2</option>
            <option value="1">1</option>
        </select>
    </td>-->

  </tr>
  <tr>
    <td>Other comments:</td>
    <td colspan="2"><textarea name="othercomments" rows="3" cols="5" style="resize:none; width:100%" required></textarea></td>
  </tr>
  
  </table>
  <div>
    <label>Recommended for next interview panel:</label>&nbsp;
    <input type="checkbox" name="recomended" value="yes" /> Selected
    <input type="checkbox" name="recomended" value="no" /> Hold&nbsp;&nbsp;<span class="error" id="recomendeds"></span>
</div>
         
<div class="btn btn-default"><a href="eval_dashboard.php" style=" color:red">Cancel</a></div>
<button type="submit" class="btn btn-primary">Save</button>

    </form>
    <!--/tabs-->
      <!--/container-->
<!-- /Main -->

 
           
        </div> <!--your content end-->
    
    </div> <!--toPopup end-->
    
	


<footer class="text-center">&copy; <?php echo date('Y')?> <a href="adda.2adpro.com"><strong>2adpro</strong></a></footer>





  
	<!-- script references -->
		
	</body>
</html>