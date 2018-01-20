<?php session_start();
include_once('connection.php');
include_once('functions.php');

//echo $_SESSION['userid'];
$check = checkMan($_SESSION['userid']);

if (($check <= 0) or (!isset($_SESSION['userid']))) {
    header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Manager Evaluation Form</title>
    <meta name="generator" content="Bootply"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">

    <style type="text/css">
        tr .btn {
            margin-right: 5px;
        }

        .head {
            width: 100%;
            text-align: center;
            background: #8BCD35;
            height: 60px;
            float: left;
            border-top: 3px solid #ffa320;
        }

        #tit {
            position: relative;
            top: 15px;
        }

        .head-ash {

            background: #9A9C9E;
            float: left;
            width: 100%;
            padding: 10px 0px 10px 0px;
            border-bottom: 4px solid #F0F0F0;

        }

        .head-ash img {
            position: absolute;
            top: 187px;
            width: 1170px;
        }

        .main {
            width: 100%;
            min-height: 100%;
            float: left;
        }

        .logo img {
            width: 90px;
            height: 25px;
            margin: 0px 0px 0px 20px;
            position: absolute;
            top: 22px;
        }

        #brdr {
            border-right: none;
        }

        #select {
            background: url(../assets/images/tik.jpg);
            width: 25px;
            height: 25px;
            border: 1px solid #fff;
            margin: 5px;
            cursor: pointer;
        }

        #cros {
            background: url(../assets/images/cros.jpg);
            width: 25px;
            height: 25px;
            border: 1px solid #fff;
            margin: 5px;
            cursor: pointer;
        }

        .head-ash h2 {
            color: #ffffff;
            padding: 0px 0px 0px 10px;
            font-size: 18px;
            font-weight: bold;
            margin: 0;
            display: inline-block;
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

        .fix-brand .navbar-brand {
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

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
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
            <a class="navbar-brand" href="#"><img src="bootstrap/img/logo-1.png" alt="2adpro"/></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
                        <i class="glyphicon glyphicon-user"></i>Welcome <?php echo $_SESSION['user'] ?> <span class="caret"></span></a>
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
        $(document).ready(function (e) {

            <?php
            if(isset($_REQUEST['msg'])){
            if(@$_REQUEST['msg'] == "u"){?>
            $("#mesE").append('<p id="msg_e" style="color:#F00; text-align:center">Successfully Updated</p>').slideDown("slow");
            setTimeout(function () {
                $('#msg_e').slideUp(function () {
                    $(this).remove()
                });
            }, 3000);

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
                    <select id="position-filter" class="form-control">
                        <option selected value="none">None</option>
                        <option value="visualizer">Visualizer</option>
                        <option value="cse">CSE</option>
                        <option value="Adops Analyst">Adops Analyst</option>
                        <option value="QA">QA</option>
                        <option value="Creative Designer">Creative Designer</option>
                             <option value="ImageArtist">ImageArtist</option>
                         <option value="Front End Developer">Front End Developer</option>
                             <option value="Full Stack Developer">Full Stack Developer</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <header>
        <div class="logo"><img src="assets/images/logo-.png"/></div>

        <div class="head">
            <span id="tit"><img src="assets/images/tit.png"/></span>
        </div>

        <div class="head-ash"><!--<img src="assets/images/line.png" />--><h2>Assessor2</h2></div>

    </header>


    <div class="main">
        <div>
            <table class="table table-condensed">
                <table class="user-lists table">
                    <thead>
                    <tr>
                        <th style="width: 15%">Name</th>
                        <th style="width: 15%">Position Applied</th>
                        <th style="width: 15%">Contact </th>
                        <!-- <th style="width: 15%">Assessor1 comments</th> -->
                        <th style="width: 25%">Files / Resume</th>
                        <th style="width: 25%">Practical Selected</th>
                        <th style="width: 15%">Interview feedback</th>
                        <th style="width: 15%">Next level</th>
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


<!--<footer class="text-center">&copy; <?php echo date('Y') ?> <a href="adda.2adpro.com"><strong>2adpro</strong></a></footer>-->


<!-- script references -->
<script type="text/javascript">

        var optionalParams = {};

    jQuery(function () {

        function getUrlParameter(sParam) {
            var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : sParameterName[1];
                }
            }
        }

        $("#position-filter").val(getUrlParameter("filter")).change();

        jQuery.extend($.fn.dataTableExt.oStdClasses, {
            "sFilterInput": "form-control fix-input",
        });

        var table = jQuery('.user-lists').DataTable({
            "order": [
                [2, "desc"]
            ],
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "/interviewc/evaluation/async.php",
                data: {
                    method: 'anc',
                    position_filter: function ( d ) {
                        return $('#position-filter').val();
                    },
                    new_dash: true,
                    type: function (d) {
                        return optionalParams.type;
                    }
                }
            },
            "dom": '<"top search-align-left"f>rt<"row view-pager"<"col-sm-12"<"col-md-3 row"l><"col-md-9 text-right"p>>>',
            "language": {
                "search": "",
                searchPlaceholder: "Search..."
            },
            "columnDefs": [{
                "orderable": false,
                "targets": -4,
                "data": null,
                "render": function (data, type, row) {
                    return '<a class="btn btn-primary" href="/interviewc/admin/uploads/' + row[2] + '/files" target="_blank" >Files</a> <a class="btn btn-primary" href="/interviewc/admin/uploads/' + row[2] + '/resume" target="_blank" >Resume</a>'
                }
            }, 
                            {
                  "orderable": false,
                  "targets": 0,
                  "data": null,
                  "render": function(data, type, row) {
                    if(row[10] == 1) {
                      return '<a href="javascript:void(0);" class="nameHolder" data-comment1="'+row[11]+'" data-comment2="'+row[12]+'" data-comment3="'+row[13]+'">'+row[0]+"</a>"
                    } else {
                      return row[0]
                    }
                  }
                },
                {
                  "orderable": false,
                  "targets": -3,
                  "data": null,
                  "render": function(data, type, row) {
                    return '<button type="button" class="btn '+(row[10] ? 'btn-primary' : 'btn-default')+' select-practical" data-id="'+row[8]+'" data-selected="1" data-current="'+(row[10] ? '1' : '0')+'">Yes</button> <button type="button" class="btn '+(!row[10] ? 'btn-primary' : 'btn-default')+' select-practical" data-id="'+row[8]+'" data-selected="0" data-current="'+(row[10] ? '1' : '0')+'">No</button>'
                  }
                },
            {
                "orderable": false,
                "targets": -2,
                "data": null,
                "render": function (data, type, row) {
                    if (row[10] == 1)
                    return '<a target="_blank" href="new_man_select_comments_form.php?c=' + row[8] + '">Click here</a>';
                return '';
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

            },
                {
                    "orderable": false,
                    "targets": -1,
                    "data": null,
                    "render": function (data, type, row) {
                        data.header = "Next level";
                        if (row[9] == 1)
                            return '<a target="_blank" href="new_man_select_comments_form1.php?c=' + row[8] + '">Click here</a>';
                        return '';
                    }
                }
            ]
        });
jQuery('#DataTables_Table_0_filter').append('<select class="form-control opt-option" style="margin-left: 10px; width: 200px;"> \
              <option value="">[Any types]</option> \
              <option value="1">Interview list</option> \
            </select>');


            jQuery(document.body).on('change', '.opt-option', function(e){
              // jQuery('.opt-option').removeClass('btn-primary');
              optionalParams.type = jQuery(this).val();
              table.ajax.reload();
            });


            jQuery(document.body).on('click', '.select-practical', function(e){
              ['1', '2', '3'].forEach(function(i){
                jQuery('.comment-'+i).val('');
              });
              jQuery('#practical-modal').modal('show');
              instance = this;
              return this;
              // ed.ajax.reload();
            });

        $('#position-filter').on('change', function() {
            var value = $('#position-filter').val();
            if (value != 'none')
            {
                table.ajax.reload();
            }
            else
            {
                window.location.href = "man_dashboard.php";

            }
        });

        jQuery(document.body).on('click', '.save-info', function(e){
    var buttonSelf = jQuery(this);
    buttonSelf.attr('disabled', true);
    var self = jQuery(instance), value = self.attr('data-selected') == '1' ? 1 : 0;
    if(value.toString() == self.attr('data-current')){
        return this;
    }
    self.attr('disabled', true);
    self.parents('td').find('.select-practical').removeClass('btn-primary').addClass('btn-default');
    self.addClass('btn-primary');

    var data = {
        id: self.attr('data-id'),
        value: value
    };

    ['1', '2', '3'].forEach(function(i){
        data['comment'+i] = jQuery('.comment-'+i).val();
        console.log(data);
    });

    jQuery.ajax({
        url: 'async.php?method=practical',
        type: 'POST',
        data: data
    }).always(function(response){
        jQuery('#practical-modal').modal('hide');

        buttonSelf.attr('disabled', false);

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-left",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        try {
            response = JSON.parse(response);
            if(response.status){
                if(value){
                    self.parents('tr').find('.feedback-actions').removeClass('hidden');
                }else{
                    self.parents('tr').find('.feedback-actions').addClass('hidden');
                }
                toastr.success(response.message);

            }else{
                throw Error('JSON parse failed');
            }
        }
        catch(err) {
            toastr.error('Update retest failed. Please try again later.');
            self.parents('td').find('.select-practical').removeClass('btn-primary');
        }
        self.parents('td').find('.select-practical').attr('data-current', value);
        self.attr('disabled', false);
    });
});
    });
$(document).ready(function() {
  $("body").on("click", ".nameHolder", function() {
    $(".comment-1").html($(this).data('comment1'));
    $(".comment-2").html($(this).data('comment2'));
    $(".comment-3").html($(this).data('comment3'));
    $("#practical-modal").modal('show');

  });
});



</script>
<div class="modal fade" tabindex="-1" role="dialog" id="practical-modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Please fill in your Comments</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-2 control-label">Comment 1</label>
            <div class="col-sm-10">
              <textarea class="comment-1 form-control" rows="5"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Comment 2</label>
            <div class="col-sm-10">
              <textarea class="comment-2 form-control" rows="5"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Comment 3</label>
            <div class="col-sm-10">
              <textarea class="comment-3 form-control" rows="5"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary save-info">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
</html>