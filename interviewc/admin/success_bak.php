<?php
   session_start();

   if(isset($_SESSION['username']) !='')
   {
   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Admin</title>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="assets/css/admin.css" rel="stylesheet" type="text/css">
      <link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="assets/css/jquery-ui.css">
      <script src="../evaluation/js/jquery-1.8.3.min.js"></script>
      <script src="assets/js/jquery-ui.js"></script>
      <script src="jquery.uploadfile.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
      <style>.menu{float:left;margin:0 5px;}</style>
   </head>
   <?php
      include_once("connection.php");
      ?>
   <body>
      <div class="page-header">
         <h2>
            Manage Admin <img style="float:right" src="assets/img/logo-1.png" /><span style="float:right; margin-right:25px; color: #7F7F7F; font-family: Verdana,Arial,Helvetica,sans-serif;
               font-size: 10px; padding-right: 5px;"><?php echo "Welcome ". ucfirst($_SESSION['username'])?>  <a href="logout.php"><img src="assets/img/logout.png" title="Logout"/></a></span>
         </h2>
      </div>
      <div class="menu">
         <ul class="nav nav-pills">
            <li class="active"><a href="setpassword.php">To Set User Password</a></li>
         </ul>
      </div>
      <div class="fo_rm" style="width: 700px;">
      </div>
      <div class="container">
         <div class="row">
            <form method="post" name="success" action="export.php">
               <label>From:</label><input type="text" id="datepicker" name="datepicker"/>
               <label>To:</label><input type="text" id="datepicker1" name="datepicker1"/>
               <input type="submit" name="submit" value="Download"/>
            </form>
         </div>
         <table class="user-lists table">
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Position Applied</th>
                  <th>Interview Date</th>
                  <th>Uploads</th>
               </tr>
            </thead>
            <tfoot>
            </tfoot>
         </table>
      </div>
      <?php
         }
         else
         {
           header('location:index.php');
         }
         ?>
      <style type="text/css">
         .content{padding: 10px;}
         .content a{padding:5px 10px;color: #ffffff;
         background-color: #0088cc;padding-top: 8px;
         padding-bottom: 8px;
         margin-top: 2px;
         margin-bottom: 2px;
         -webkit-border-radius: 5px;
         -moz-border-radius: 5px;
         border-radius: 5px;}
         #brdr{
         width:270px;
         }
      </style>
      <script type="text/javascript">
         jQuery(function(){
          $( "#datepicker,#datepicker1" ).datepicker({dateFormat: 'yy-mm-dd'});

          jQuery(document.body).on('click', 'a.file', function(e){ e.preventDefault(); $(this).parent().find('input[type=file]').attr('name','up_file').click();});
          jQuery(document.body).on('click', 'a.resume',  function(e){ e.preventDefault(); $(this).parent().find('input[type=file]').attr('name','up_resume').click();});
          jQuery(document.body).on('change', '.content input[type=file]', function(e){ e.preventDefault(); $(this).closest('form').submit();});

          // jQuery(document.body).on("click", '.file', function(){$(this).parent().find('input').click();});

           jQuery.extend($.fn.dataTableExt.oStdClasses, {
               "sFilterInput": "form-control fix-input",
               // "sLengthSelect": "form-control yourClass"
           });
           jQuery('.user-lists').DataTable({
             "order": [[ 2, "desc" ]],
             "processing": true,
               "serverSide": true,
               "ajax": "/interviewc/evaluation/async.php",
             "dom": '<"top search-align-left"f>rt<"row view-pager"<"col-sm-12 row"<"col-md-3 row"l><"col-md-9 text-right"p>>>',
             "language": {
               "search": "",
               searchPlaceholder: "Search..."
             },
              "columnDefs": [ {
                "orderable": false,
            "targets": -1,
            "data": null,
            "defaultContent": '<form method="POST" enctype="multipart/form-data" action="upload.php"> \
            <div class="content"><input type="hidden" name="phone" id="phone" value=""/> \
            <input type="file" name="up_file" id="up_file" style="display: none" /> \
            <a href="#" class="file">Upload File</a> \
            <a href="#" class="resume">Upload Resume</a> \
            </div></form>'
              }]
           });
         });
      </script>
   </body>
</html>