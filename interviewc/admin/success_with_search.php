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
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet" type="text/css">
      <link href="assets/css/admin.css" rel="stylesheet" type="text/css">
      <link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="assets/css/jquery-ui.css">
      <script src="../evaluation/js/jquery-1.8.3.min.js"></script>
      <script src="assets/js/plupload.full.min.js"></script>
      <script src="assets/js/jquery-ui.js"></script>
      <script src="jquery.uploadfile.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
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
        function triggerUploader() {
          jQuery('.wr').each(function(ev) {
            var ele = jQuery(this);
            var button = ele.find('button').first();
            var uploader = new plupload.Uploader({       
              multi_selection: false,
              runtimes: 'html5',
              browse_button: button[0],
              url: '/interviewc/admin/async_upload.php',
              chunk_size: '20mb',
              unique_names: true,
              preinit: {                            
                Init: function(up, info) {},
                UploadFile: function(up, file) {}
              },
              init: {
                PostInit: function() {},
                Browse: function(up) {},
                Refresh: function(up) {},
                StateChanged: function(up) {},
                QueueChanged: function(up) {
                  up.start();
                },
                OptionChanged: function(up, name, value, oldValue) {},
                BeforeUpload: function(up, file) {
                  up.settings.multipart_params = {
                    'phone': ele.attr('data-phone'),
                    'type': ele.attr('data-type')
                  };
                  button.prop('disabled', true);
                  button.find('.spinner-loading').removeClass('hidden');
                  button.find('.spinner-done').addClass('hidden');
                  button.find('.upload-text').html('Uploading...');
                },
                UploadProgress: function(up, file) {},
                FileFiltered: function(up, file) {},
                FilesAdded: function(up, files) {},
                FilesRemoved: function(up, files) {},
                FileUploaded: function(up, file, info) {    
                  console.log(file);
                  button.prop('disabled', false);
                  button.find('.spinner-loading').addClass('hidden');
                  button.find('.spinner-done').removeClass('hidden');
                  button.find('.upload-text').html(ele.attr('data-type') == 'file' ? 'Upload File' : 'Upload Resume');

                  // jQuery.toast({
                  //   loader: false,
                  //   heading: 'Success',
                  //   text: 'Your ' + ele.attr('data-type') + ' ' + file.name + ' is successfully uploaded!',
                  //   showHideTransition: 'slide',
                  //   icon: 'success'
                  // })

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

                  toastr["success"]('Your ' + ele.attr('data-type') + ' ' + file.name + ' is successfully uploaded!')

                  return this;
                },
                ChunkUploaded: function(up, file, info) {},
                UploadComplete: function(up, files) {},
                Destroy: function(up) {},
                Error: function(up, args) {}        
              }    
            });    
            uploader.init();
          });
        }
         jQuery(function(){
          $( "#datepicker,#datepicker1" ).datepicker({dateFormat: 'yy-mm-dd'});
          //
          // jQuery(document.body).on('click', '.file', function(e){ e.preventDefault(); $(this).parent().find('input[type=file]').attr('name','up_file').click();});
          // jQuery(document.body).on('click', '.resume',  function(e){ e.preventDefault(); $(this).parent().find('input[type=file]').attr('name','up_resume').click();});
          // jQuery(document.body).on('change', '.content input[type=file]', function(e){ e.preventDefault(); $(this).closest('form').submit();});

          // jQuery(document.body).on("click", '.file', function(){$(this).parent().find('input').click();});

           jQuery.extend($.fn.dataTableExt.oStdClasses, {
               "sFilterInput": "form-control fix-input",
               // "sLengthSelect": "form-control yourClass"
           });
           jQuery('.user-lists').DataTable({
              "fnDrawCallback": function (oSettings) {
                triggerUploader();
              },
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
            "render": function ( data, type, row ) {
              return '<span class="wr" data-phone="'+row[3]+'" data-type="file"> \
                <button href="#" class="btn btn-primary file"><i class="fa fa-spinner fa-spin hidden spinner-loading"></i> <span class="upload-text">Upload File</span> <i class="fa fa-check  hidden spinner-done"></i></button></span> \
                <span class="wr" data-phone="'+row[3]+'" data-type="resume"> \
                <button href="#" class="btn btn-primary resume"><i class="fa fa-spinner fa-spin hidden" spinner-loading></i> <span class="upload-text">Upload Resume</span> <i class="fa fa-check  hidden spinner-done"></i></button></span>'
            },
            // "defaultContent": '<form method="POST" enctype="multipart/form-data" action="upload.php"> \
            // <div class="content"><input type="hidden" name="phone" id="phone" value=""/> \
            // <input type="file" name="up_file" id="up_file" style="display: none" /> \
            // <a href="#" class="file">Upload File</a> \
            // <a href="#" class="resume">Upload Resume</a> \
            // </div></form>'
              }]
           });
         });
      </script>
   </body>
</html>
