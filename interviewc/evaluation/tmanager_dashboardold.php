<?php session_start();
include_once('connection.php');
include_once('functions.php');
//echo $_SESSION['userid'];
 $check = isTmanager($_SESSION['userid']);
if(!$check or (!isset($_SESSION['userid'])))
{
	exit("You don't have access to this page.");
}
?>
<!DOCTYPE html>
<html lang="en"><head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Evaluation Form</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
        <!-- <link href="css/evaluation.css" rel="stylesheet"> -->
       <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
       <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
       <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
		  <script src="js/bootstrap.min.js"></script>
         <script type="text/javascript">
        //     $(document).ready(function(){
        //         function loading_show(){
        //             $('#loading').html("<img src='images/loading.gif'/>").fadeIn('fast');
        //         }
        //         function loading_hide(){
        //             $('#loading').fadeOut('fast');
        //         }
        //         function loadData(page){
        //             loading_show();
        //             $.ajax
        //             ({
        //                 type: "POST",
        //                 url: "load_data.php",
        //                 data: "page="+page,
        //                 success: function(msg)
        //                 {
        //                     $("#container").ajaxComplete(function(event, request, settings)
        //                     {
        //                         loading_hide();
         //
        //                         $("#container").html(msg);
        //                     });
        //                 }
        //             });
        //         }
        //         loadData(1);  // For first time page load default results
				//  $('#container .pagination li.active').live('click',function(){
        //             var page = $(this).attr('p');
        //             loadData(page);
         //
        //         });
        //         $('#go_btn').live('click',function(){
        //             var page = parseInt($('.goto').val());
        //             var no_of_pages = parseInt($('.total').attr('a'));
        //             if(page != 0 && page <= no_of_pages){
        //                 loadData(page);
        //             }else{
        //                 alert('Enter a PAGE between 1 and '+no_of_pages);
        //                 $('.goto').val("").focus();
        //                 return false;
        //             }
         //
        //         });
        //     });
        </script>

        <style type="text/css">

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
        </style>

	</head>
	<body>
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
        <script type="text/javascript">
          var optionalParams = {};

          jQuery(function() {
            jQuery.extend($.fn.dataTableExt.oStdClasses, {
              "sFilterInput": "form-control fix-input",
            });
            var ed = jQuery('.user-lists').DataTable({
              "order": [
                [2, "desc"]
              ],
              "processing": true,
              "serverSide": true,
              // "ajax": "/adda/interviewc/evaluation/async.php",
              "ajax": {
                'type': 'GET',
                'url': '/interviewc/evaluation/async_v2.php',
                'data': function(d){
                  return jQuery.extend({}, d, optionalParams);
                }
              },
              "dom": '<"top search-align-left"f>rt<"row view-pager"<"col-sm-12"<"col-md-3 row"l><"col-md-9 text-right"p>>>',
              "language": {
                "search": "",
                searchPlaceholder: "Search..."
              },
              "columnDefs": [{
                  "orderable": true,
                  "targets": -5,
                  "data": null,
                  "render": function(data, type, row) {
                    return row[3];
                    var tp = '';
                    var cl = 'btn-primary';
                    if (row[5] == '1') {
                      cl = 'btn-success';
                    }
                    if (row[4]) {
                      tp = '<a class="btn ' + cl + '" target="_blank" href="eval_select_comments1.php?c=' + row[6] + '">Selected</a>';
                    } else if (row[5] == '0') {
                      tp = '<a class="btn ' + cl + '" target="_blank" href="eval_select_comments.php?c=' + row[6] + '">Selected</a>';
                    } else {
                      tp = '<span>Selected</span>'
                    }
                    if (row[5] != '1') {
                      tp += ' <a class="btn btn-danger" target="_blank" href="eval_comments.php?c=' + row[6] + '">Rejected</a>';
                    }
                    return tp
                  }
                }, {
                  "orderable": false,
                  "targets": -2,
                  "data": null,
                  "render": function(data, type, row) {
                    return '<a class="btn btn-primary" href="/interviewc/admin/uploads/' + row[3] + '/files" target="_blank" >Files</a> <a class="btn btn-primary" href="/interviewc/admin/uploads/' + row[3] + '/resume" target="_blank" >Resume</a>'
                  }
                },
                {
                  "orderable": false,
                  "targets": -1,
                  "data": null,
                  "render": function(data, type, row) {
                    return row[7]
                  }
                },
                {
                  "orderable": true,
                  "targets": -4,
                  "data": null,
                  "render": function(data, type, row) {
                    return row[1]
                  }
                },
                {
                  "orderable": true,
                  "targets": -3,
                  "data": null,
                  "render": function(data, type, row) {
                    return row[2]
                  }
                }
              ]
            });

            jQuery('#container').find('.dataTables_filter').append('<select class="form-control opt-option" style="margin-left: 10px; width: 200px;"> \
              <option value="">[Any types]</option> \
              <option value="1">Selected</option> \
              <option value="2">Rejected</option> \
            </select>');

            jQuery(document.body).on('change', '.opt-option', function(e){
              // jQuery('.opt-option').removeClass('btn-primary');
              optionalParams.type = jQuery(this).val();
              ed.ajax.reload();
            });
          });
        </script>
       <header>
  <div class="logo"><img src="assets/images/logo-.png" /></div>

  <div class="head">
  <span id="tit"><img src="assets/images/tit.png" /></span>
  </div>

  <div class="head-ash"><!--<img src="assets/images/line.png" />--><h2>Assessor1</h2></div>

  </header>


<div class="main">

        <div id="container">
          <table class="user-lists table">
             <thead>
                <tr>
                   <th>Name</th>
                   <th>Phone Number</th>
                   <th>Position Applied</th>
                   <th>Interview Date</th>
                   <th>Download files</th>
                   <th>Assessor name</th>
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





<footer class="text-center">&copy; <?php echo date('Y')?> <a href="adda.2adpro.com"><strong>2adpro</strong></a></footer>






	<!-- script references -->

	</body>
</html>
