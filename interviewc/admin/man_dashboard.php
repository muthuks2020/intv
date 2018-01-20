<?php session_start();
include_once('connection.php');
include_once('functions.php');

//echo $_SESSION['userid'];
$check = checkMan($_SESSION['userid']);

if(($check <= 0) or (!isset($_SESSION['userid'])))
{
	header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Manager Evaluation Form</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">

    <style type="text/css">
      tr .btn {
        margin-right: 5px;
      }

.head{
width:100%;
text-align:center;
background:#8BCD35;
height: 60px;
float:left;
border-top: 3px solid #ffa320;
}

#tit{
position:relative;
top: 15px;}
.head-ash{

background: #9A9C9E;
float: left;
width: 100%;
padding: 10px 0px 10px 0px;
border-bottom: 4px solid #F0F0F0;

}

.head-ash img{
    position: absolute;
    top: 187px;
  width:1170px;
}

.main{
width:100%;
min-height:100%;
float:left;
}
.logo img{
width: 90px;
height: 25px;
margin: 0px 0px 0px 20px;
position: absolute;
top: 22px;
}

#brdr{
border-right:none;
}
#select{
background:url(../assets/images/tik.jpg);
width: 25px;
height: 25px;
border: 1px solid #fff;
margin: 5px;
cursor:pointer;
}

#cros{
background:url(../assets/images/cros.jpg);
width: 25px;
height: 25px;
border: 1px solid #fff;
margin: 5px;
cursor:pointer;
}

.head-ash h2{
color:#ffffff;
padding:0px 0px 0px 10px;
font-size:18px;
font-weight:bold;
margin:0;
display:inline-block;
}

.search-align-left {
  margin: 10px 0 10px 0;
}

.search-align-left label {
  margin: 0;
}
.search-align-left div {
  text-align: left !important;
}

.search-align-left input {
  width: 400px !important;
}

.fix-brand .navbar-brand{
  height: 70px;
}

.brd_nav {
    width: 100%;
    float: left;
    background: #f0f1f3;
    border: 1px solid #AAAAAA;
    padding: 10px;
}
    </style>
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

        <!-- <link href="css/pagination.css" rel="stylesheet"> -->

        <script type="text/javascript" src="js/jquery-1.10.2.min.js"> </script>
		<script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
       <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>


	</head>
	<body style="height:100%; width:100%">
<!-- Header -->
<div id="top-nav" class="navbar navbar-default navbar-static-top">

  <div class="container">
    <div class="navbar-header fix-brand">
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
         <div class="brd_nav">
             <div class="container">
                 <div class="row">
                     <div class="col-md-2">
                         <a class="btn btn-default" target="_blank" href="backfill.php">Backfill Request</a>
                     </div>
                     <div class="col-md-2">
                         <?php if ($_SESSION['is_allowed']) { ?>
                         <select id="position-filter" class="form-control">
                             <option selected value="none">None</option>
                             <option value="visualizer">Visualizer</option>
                             <option value="cse">CSE</option>
                         </select>
                         <?php } ?>
                     </div>
                 </div>
             </div>
               </div>
       <header>
  <div class="logo"><img src="assets/images/logo-.png" /></div>

  <div class="head">
  <span id="tit"><img src="assets/images/tit.png" /></span>
  </div>

  <div class="head-ash"><!--<img src="assets/images/line.png" />--><h2>Assessor2</h2></div>

  </header>


<div class="main">
<div>
<table class="table table-condensed" > <table class="user-lists table">
             <thead>
                <tr>
                    <th style="width: 15%">Name</th>
                    <th style="width: 15%">Position Applied</th>
                    <th style="width: 15%">Assessor1 name</th>
                   <!-- <th style="width: 15%">Assessor1 comments</th> -->
                    <th style="width: 25%">Assessor1 status & comments</th>
                    <th style="width: 15%">Interview feedback</th>
                  </tr>
              </thead>
              <tfoot>
              </tfoot>
            </table>
	</div>
      </div>
      <!--/tabs-->
      <!--/container-->
<!-- /Main -->



        </div> <!--your content end-->

    </div> <!--toPopup end-->

	<div class="loader"></div>
   	<div id="backgroundPopup"></div>


<!--<footer class="text-center">&copy; <?php echo date('Y')?> <a href="adda.2adpro.com"><strong>2adpro</strong></a></footer>-->






	<!-- script references -->
      <script type="text/javascript">
          jQuery(function() {
              $('#position-filter').on('change', function() {
                  var value = $('#position-filter').val();
                  if (value != 'none')
                  {
                      window.location.href = "new_dashboard.php?filter=" + value;
                  }
              });

            jQuery.extend($.fn.dataTableExt.oStdClasses, {
              "sFilterInput": "form-control fix-input",
            });
            jQuery('.user-lists').DataTable({
              "order": [
                [2, "desc"]
              ],
              "processing": true,
              "serverSide": true,
              "ajax": {
                url: "/interviewc/evaluation/async.php",
                data: {
                  method: 'anc'
                }
              },
              "dom": '<"top search-align-left"f>rt<"row view-pager"<"col-sm-12"<"col-md-3 row"l><"col-md-9 text-right"p>>>',
              "language": {
                "search": "",
                searchPlaceholder: "Search..."
              },
              "columnDefs": [{
                  "orderable": false,
                  "targets": -2,
                  "data": null,
                  "render": function(data, type, row) {
                    var tp = '';
                    if(row[4] == '1'){
                      //tp += '<button type="button" class="btn btn-success btn-sm">Selected</button>';
                      tp += '<a target="_blank" class="btn btn-info btn-sm" href="assviewdetails.php?c='+row[8]+'">View Details</a>';
                    }

                    return tp
                  }
                }, {
                  "orderable": false,
                  "targets": -1,
                  "data": null,
                  "render": function(data, type, row) {
                    return '<a target="_blank" href="man_select_comments_form.php?c='+row[8]+'">Click here</a>';
                    // var cl = 'btn-primary';
                    // var tp = '';

                    // if(row[5] == '1'){
                    //   cl = 'btn-success';
                    // }else if(row[5] == '3'){
                    //   cl = 'btn-warning';
                    // }

                    // if(row[7] > 0){
                    //   tp += '<a target="_blank" class="btn btn-sm '+cl+'" href="man_select_comments1.php?c='+row[8]+'">'+(row[6] == '3' ? 'On Hold' : 'Selected')+'</a>';
                    // }else if(row[5] == '0'){
                    //   tp += '<a target="_blank" class="btn btn-sm '+cl+'" href="man_select_comments.php?c='+row[8]+'">Click here</a>';
                    // }else{
                    //   tp += '<button class="btn btn-sm btn-primary" type="button">Click here</button>';
                    // }

                    // if(row[5] != '1'){
                    //   tp += '<a target="_blank" class="btn btn-sm btn-danger" href="man_comments.php?c='+row[8]+'" >Rejected</a>';
                    // }
                    // return tp;
                  }

                }
              ]
            });
          });
        </script>
	</body>
</html>