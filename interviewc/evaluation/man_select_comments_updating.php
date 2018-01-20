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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
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

        document.getElementById('comments1').innerHTML="";
        document.getElementById('nextlevels').innerHTML="";
        document.getElementById('CIS').innerHTML="";
        document.getElementById('PK').innerHTML="";
        document.getElementById('TK').innerHTML="";
        document.getElementById('CO').innerHTML="";
        document.getElementById('AD').innerHTML="";
        document.getElementById('FL').innerHTML="";
        document.getElementById('PA').innerHTML="";
        document.getElementById('msource1').innerHTML="";

        if ( (document.mycomment.position[0].checked == false ) && ( document.mycomment.position[1].checked == false )&& ( document.mycomment.position[2].checked == false ) )
        {

          document.getElementById('PA').innerHTML="Please choose atleast one position";
          return false;
        }
        if ( (document.mycomment.source[0].checked == false ) && ( document.mycomment.source[1].checked == false ) && ( document.mycomment.source[2].checked == false )&& ( document.mycomment.source[3].checked == false )&& ( document.mycomment.source[4].checked == false ))
        {

          document.getElementById('msource1').innerHTML="Please choose atleast one source";
          return false;
        }
        if ( (document.mycomment.ci[0].checked == false ) && ( document.mycomment.ci[1].checked == false ) && ( document.mycomment.ci[2].checked == false )&& ( document.mycomment.ci[3].checked == false ) )
        {

          document.getElementById('CIS').innerHTML="Please choose atleast one Comprehending Instructions ";
          return false;
        }
        if ( (document.mycomment.pk[0].checked == false ) && ( document.mycomment.pk[1].checked == false ) && ( document.mycomment.pk[2].checked == false )&& ( document.mycomment.pk[3].checked == false ) )
        {

          document.getElementById('PK').innerHTML="Please choose atleast one Practical Knowledge";
          return false;
        }
        if ( (document.mycomment.tk[0].checked == false ) && ( document.mycomment.tk[1].checked == false ) && ( document.mycomment.tk[2].checked == false )&& ( document.mycomment.tk[3].checked == false ) )
        {

          document.getElementById('TK').innerHTML="Please choose atleast one Technical Knowledge";
          return false;
        }
        if ( (document.mycomment.co[0].checked == false ) && ( document.mycomment.co[1].checked == false ) && ( document.mycomment.co[2].checked == false )&& ( document.mycomment.co[3].checked == false ) )
        {

          document.getElementById('CO').innerHTML="Please choose atleast one Communication";
          return false;
        }
        if ( (document.mycomment.ad[0].checked == false ) && ( document.mycomment.ad[1].checked == false ) && ( document.mycomment.ad[2].checked == false )&& ( document.mycomment.ad[3].checked == false ) )
        {

          document.getElementById('AD').innerHTML="Please choose atleast one Adaptability";
          return false;
        }
        if ( (document.mycomment.fx[0].checked == false ) && ( document.mycomment.fx[1].checked == false ) && ( document.mycomment.fx[2].checked == false )&& ( document.mycomment.fx[3].checked == false ) )
        {

          document.getElementById('FL').innerHTML="Please choose atleast one Flexibility";
          return false;
        }

        if( document.mycomment.comments.value == "" )
         {
           //alert( "Please provide your name!" );
         document.getElementById('comments1').innerHTML="Please provide your Comments!";
           document.mycomment.comments.focus() ;
           return false;
         }
         if ( (document.mycomment.nextlevel[0].checked == false ) && ( document.mycomment.nextlevel[1].checked == false ) )
        {

          document.getElementById('nextlevels').innerHTML="Please choose OnHold or Select";
          return false;
        }

      }

      function getnextlevel(val)
      {

        if(val=='1')
        {
          document.getElementById('ass3c').style="display:block";
        }
        else
        {
          document.getElementById('ass3c').style="display:none";
        }
      }


    </script>
    <style>
      .toggle-status {
      margin-top: 15px;
      margin-bottom: 15px;
      }
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
  <div id="top-nav" class="navbar navbar-default navbar-static-top">
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
    </div>
    <!-- /container -->
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
      <div class="head-ash">
        <!-- <img src="assets/images/line.png" /> -->
        <h2>Manager Evaluator</h2>
      </div>
    </header>
    <?php $query=@mysql_query("SELECT *FROM `contacts` WHERE id ='".$_REQUEST['c']."'") or die(mysql_error());
      $emp_name = mysql_fetch_array($query);

      ?>
    <div class="main">
      <form class="form-horizontal well" style="min-height:177px;" action="mselected.php" name="mycomment" method="post" onSubmit="return validation()" >
        <input type="hidden" name="cid" value="<?=$_REQUEST['c']?>"/>
        <!--<label>Name:</label>&nbsp;<?php //echo $emp_name['name']; ?>&nbsp;&nbsp;
          <label>Position Aplied for:</label>&nbsp;<?php //echo $emp_name['position']; ?>&nbsp;&nbsp;
          <label>Interview Date:</label>&nbsp;<?php //date('d-m-Y',strtotime($emp_name['register_on']))?><br/><br/>
           <label style="float:left"><b>Comments:</b><span class="error">*  </span></label>
           <textarea name="comments" rows="3" cols="5" style="width:100%; resize:none; float:left"></textarea>&nbsp;<span class="error" id="comments1"></span><br /><br />-->
        <div class="row">
          <div class="col-md-6">
            <li><label>Name of Candidate:</label>&nbsp;<?php echo $emp_name['name']; ?></li>
            <br/>
            <li><label>Position Applied:</label>&nbsp;<?php echo $emp_name['position']; ?></li>
            <br/>
            <li><label>Position :</label>
            <?php $sources = get_positions();
            foreach($sources as $source){
             ?>
               <input type="checkbox" class="checkbox-group" name="position" value="<?php echo $source['id'] ?>" <?php if($emp_name['mposition'] == $source['id']){ ?>
               checked <?php } ?>/> <?php echo $source['value'] ?>
            <?php } ?>
            <span class="error" id="PA"></span></li>
            <li><label>Total Experince:</label>&nbsp;<input type="text" name="totalexperince" id="totalexperince" value="<?=$emp_name['totalexperince']?>" required/></li>
            <li><label>Relevant Experince:</label>&nbsp;<input type="text" name="relevantexperince" id="relevantexperince" value="<?=$emp_name['relevantexperince']?>" required/></li>
            <li><label>Recruiter:</label>&nbsp;<input type="text" name="recruiter" id="recruiter" value="<?php echo $emp_name['recruiter']?>" required/></li>
            <br/>
          </div>
          <div class="col-md-6">
            <li><label>Interviewer(s):</label>&nbsp;<?=$_SESSION['user']?></li>
            <br/>
            <li><label>Source:</label>&nbsp;
            <?php $sources = get_sources();
            foreach($sources as $source){
             ?>
               <input type="checkbox" class="checkbox-group" name="source" value="<?php echo $source['id'] ?>" <?php if($emp_name['source'] == $source['id']){ ?>
               checked <?php } ?> disabled/> <?php echo $source['value'] ?>
            <?php } ?>
            <span class="error" id="msource1"></span>
            </li>
            <br />
            <li><label>Date of request:</label>&nbsp;<?=date('d-m-Y',strtotime($emp_name['register_on']))?></li>
            <li><label>Team Allocated:</label>&nbsp; <input type="text" name="teamallocated" value="<?php echo $emp_name['teamallocated']?>" id="teamallocated" required/></li>
          </div>
        </div>
        <table class="table">
          <tr>
            <th scope="col" id="col-wid" colspan="5" style="text-align:center">Proficency</th>
          </tr>
          <tr>
            <th scope="col"></th>
            <th scope="col">Exceptional</th>
            <th scope="col">Good</th>
            <th scope="col">Trainable</th>
            <th scope="col">Non-Trainable</th>
          </tr>
          <tr>
            <td>Comprehending Instructions&nbsp;<span class="error" id="CIS"></span></td>
            <?php $values = array('ciexceptional', 'cigood', 'citrainable', 'cinontrainable');
            foreach($values as $v){ ?>
              <td><input type="checkbox" class="checkbox-group" name="ci" value="<?php echo $v; ?>" <?php echo $emp_name['ci'] == $v ? 'checked' : '' ?> /></td>
            <?php } ?>
          </tr>
          <tr>
            <td>Practical Knowledge&nbsp;<span class="error" id="PK"></span></td>
            <?php $values = array('pkexceptional', 'pkgood', 'pktrainable', 'pknontrainable');
            foreach($values as $v){ ?>
              <td><input type="checkbox" class="checkbox-group" name="pk" value="<?php echo $v; ?>" <?php echo $emp_name['pk'] == $v ? 'checked' : '' ?> /></td>
            <?php } ?>
          </tr>
          <tr>
            <td>Technical Knowledge&nbsp;<span class="error" id="TK"></span></td>
            <?php $values = array('tkexceptional', 'tkgood', 'tktrainable', 'tknontrainable');
            foreach($values as $v){ ?>
              <td><input type="checkbox" class="checkbox-group" name="tk" value="<?php echo $v; ?>" <?php echo $emp_name['tk'] == $v ? 'checked' : '' ?> /></td>
            <?php } ?>
          </tr>
        </table>
        <table class="table " >
          <tr>
            <th scope="col" id="col-wid" colspan="5" style="text-align:center">Interpersonal Skills</th>
          </tr>
          <tr>
            <th scope="col"></th>
            <th scope="col">Exceptional</th>
            <th scope="col">Good</th>
            <th scope="col">Trainable</th>
            <th scope="col">Non-Trainable</th>
          </tr>
          <tr>
            <td>Communication&nbsp;<span class="error" id="CO"></span></td>
            <?php $values = array('coexceptional', 'cogood', 'cotrainable', 'conontrainable');
            foreach($values as $v){ ?>
              <td><input type="checkbox" class="checkbox-group" name="co" value="<?php echo $v; ?>" <?php echo $emp_name['co'] == $v ? 'checked' : '' ?> /></td>
            <?php } ?>
          </tr>
          <tr>
            <td>Adaptability&nbsp;<span class="error" id="AD"></span></td>
            <?php $values = array('adexceptional', 'adgood', 'adtrainable', 'adnontrainable');
            foreach($values as $v){ ?>
              <td><input type="checkbox" class="checkbox-group" name="ad" value="<?php echo $v; ?>" <?php echo $emp_name['ad'] == $v ? 'checked' : '' ?> /></td>
            <?php } ?>
          </tr>
          <tr>
            <td>Flexibility&nbsp;<span class="error" id="FL"></span></td>
            <?php $values = array('fxexceptional', 'fxgood', 'fxtrainable', 'fxnontrainable');
            foreach($values as $v){ ?>
              <td><input type="checkbox" class="checkbox-group" name="fx" value="<?php echo $v; ?>" <?php echo $emp_name['fx'] == $v ? 'checked' : '' ?> /></td>
            <?php } ?>
          </tr>
        </table>
        <label style="float:left"><b>Assessor2 Comments:</b><span class="error">*  </span></label>
        <textarea name="comments" rows="3" cols="5" style="width:100%; resize:none; float:left" ><?=$emp_name['man_comments']?></textarea>
        &nbsp;<span class="error" id="comments1"></span>
        <div class="col-md-12 row toggle-status">
          <span>Status: </span>
          <div class="btn-group" role="group" aria-label="...">
            <button type="button" class="btn btn-default selected-status" data-status="selected">Selected</button>
            <button type="button" class="btn btn-default selected-status" data-status="rejected">Rejected</button>
          </div>
          <input type="hidden" class="contact-mstatus" name="contact_mstatus" value="" />
        </div>
        <!-- <div class="col-md-12 toggle-status rejected-comment-box hidden">
         <div class="form-group">
            <label>Comments:</label>
            <textarea class="form-control" rows="5" name="man_comments" placeholder="Rejected reason..."></textarea>
          </div>
        </div> -->
<!--
        <div>
          <label>Next Level:</label>&nbsp;
          <input type="checkbox" name="nextlevel" value="3" <?php if($emp_name['mstatus']=='3'){?> checked<?php } ?> onclick="getnextlevel(this.value)" /> On Hold
          <input type="checkbox" name="nextlevel" value="1" <?php if($emp_name['mstatus']=='1'){?> checked<?php } ?> onclick="getnextlevel(this.value)" /> Select&nbsp;&nbsp;<span class="error" id="nextlevels"></span><br/><br/>
        </div>
        <div style="display:none" id="ass3c">
          <label style="float:left"><b>Assessor3 Comments:</b></label>
          <textarea name="ass3comments" rows="3" cols="5" style="width:100%; resize:none; float:left"></textarea>&nbsp;<br /><br />
        </div> -->
        <div class="row" style="margin-left: 0px;">
          <a href="man_dashboard.php" class="btn btn-default">Cancel</a>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>

      </form>
      <!--/tabs-->
      <!--/container-->
      <!-- /Main -->
    </div>
    <!--your content end-->
  </div>
  <!--toPopup end-->
  <footer class="text-center">&copy; <?php echo date('Y')?> <a href="adda.2adpro.com"><strong>2adpro</strong></a></footer>
  <script type="text/javascript">
    var filled = <?php echo json_encode($emp_name); ?>;
    jQuery(function(){
      jQuery('.selected-status').on('click', function(){
        var status = jQuery(this).attr('data-status')
        jQuery('.contact-mstatus').val(status);
        jQuery('.selected-status').addClass('btn-default').removeClass('btn-primary');
        jQuery(this).removeClass('btn-default').addClass('btn-primary');
        if(status == 'rejected'){
          jQuery('.rejected-comment-box').removeClass('hidden');
        }else{
          jQuery('.rejected-comment-box').addClass('hidden');
        }
      });
      jQuery('.checkbox-group').on('click', function(){
        var groupName = jQuery(this).attr('name');
        jQuery('.checkbox-group[name="'+groupName+'"]').prop('checked', false);
        jQuery(this).prop('checked', true);
      });

      var mStatus = filled.mstatus;

      if(mStatus == '2'){
        jQuery('.selected-status[data-status="rejected"]').trigger('click');
      }else{
        jQuery('.selected-status[data-status="selected"]').trigger('click');
      }
    });
  </script>
  <!-- script references -->
  </body>
</html>
