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
      <link href="assets/css/admin.css" rel="stylesheet" type="text/css">
      <link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="assets/css/jquery-ui.css">
      <script src="../evaluation/js/jquery-1.8.3.min.js"></script>
      <script src="assets/js/plupload.full.min.js"></script>
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
           var uploader = new plupload.Uploader({        
             runtimes: 'html5',
             browse_button: 'pickfiles',
                     url: BASE_URL + '/inspection/upload',
                     chunk_size: '20mb',
                     unique_names: true,
               drop_element: 'drop-target',
                     preinit: {            
               Init: function(up, info) {    
                 document.getElementById('uploadfiles').onclick = function() {
                   uploader.start();
                   return false;
                 };
               },
                    UploadFile: function(up, file) {                                 // up.setOption('url', 'upload.php?id=' + file.id);
                          // up.setOption('multipart_params', {param1 : 'value1', param2 : 'value2'});
                     }        
             },
                       // Post init events, bound after the internal events
                     init: {
               PostInit: function() {
                 // Called after initialization is finished and internal event handlers bound
               },
               Browse: function(up) {                 // Called when file picker is clicked
               },
               Refresh: function(up) {                 // Called when the position or dimensions of the picker change
                       },
              StateChanged: function(up) {                 // Called when the state of the queue is changed
                   },
              QueueChanged: function(up) {                 // Called when queue is changed by adding or removing files
                   
                 jQuery('#upload-progress').find('.progress-bar').css({
                   width: "0%"
                 });
                 jQuery('.parsing-status').addClass('hidden');
               },
               OptionChanged: function(up, name, value, oldValue) {
                 // Called when one of the configuration options is changed
               },
               BeforeUpload: function(up, file) {
                 jQuery('#upload-progress').find('.progress-bar').addClass('progress-bar-striped');
                 jQuery('#uploadfiles').prop('disabled', true);
                 jQuery('#pickfiles').addClass('disable-event').prop('disabled', true);
                 // Called right before the upload for a given file starts, can be used to cancel it if required
               },
               UploadProgress: function(up, file) {
                 jQuery('#upload-progress').find('.progress-bar').css({
                   width: up.total.percent + "%"
                 });
                 jQuery('.file-per').html(up.total.percent + "%");
               },
               FileFiltered: function(up, file) {
                 // Called when file successfully files all the filters
               },
               FilesAdded: function(up, files) {                 // Called when files are added to queue
                 //                 jQuery('')
                 $(".file-list").show();
                 // $(".parsing-status").hide();
                 $("#infoParse").hide();
                 log('[FilesAdded]');                 
                 jQuery('.file-list').removeClass('hidden');
                 jQuery('#uploadfiles').prop('disabled', false);
                 plupload.each(files, function(file) {   
                   var content = '<p><span>' + file.name + '</span> <span class="target-grey file-per">0%</span><span class="upload-status hidden pull-right">Status</span></p>';
                   jQuery('#upload-file-name').html(content);                 
                 });
               },
               FilesRemoved: function(up, files) {                        },
               FileUploaded: function(up, file, info) {    
                 // $(".parsing-status").show();
                 // jQuery('#uploadfiles').prop('disabled', false);
                 jQuery('#pickfiles').removeClass('disable-event').prop('disabled', false);
                 var stt = jQuery('.upload-status');
                 var parsing = jQuery('.parsing-status');
                 stt.removeClass('hidden');
                 parsing.removeClass('hidden');
                 try {
                   parseInfo = "";
                   parseInfo = JSON.parse(info.response);
                   if (parseInfo.status) {
                     parsing.find('.alert-success').removeClass('hidden');
                     parsing.find('.alert-danger').addClass('hidden');
                     jQuery('#uploadfiles').attr('data-file', parseInfo.data.file);
                     stt.addClass('text-success').removeClass('text-danger').html('Success!');
                     $("#infoParse").show();
                     if (parseInfo.result) {
                       $("#infoParse").show();
                       if (parseInfo.result.vendor) {
                         $("#infoParse #vendor").val(parseInfo.result.vendor + " / " + parseInfo.result.vendorId);
                       } else {
                         $("#infoParse #vendor").val("");
                       }
                       $("#infoParse #po").val(parseInfo.result.poNo);
                       $("#infoParse #inspectionDate").val(parseInfo.result.inspectionDate);
                     }
                   } else {
                     throw new Error('Parse JSON failed.');
                   }
                 } catch (err) {
                   // console.log(parseInfo);
                   if (parseInfo != "") {
                     $("#errorMessage").html(parseInfo.error);
                     if (parseInfo.result) {
                       $("#infoParse").show();
                       if (parseInfo.result.vendor) {
                         $("#infoParse #vendor").val(parseInfo.result.vendor + " / " + parseInfo.result.vendorId);
                       } else {
                         $("#infoParse #vendor").val("");
                       }
                       $("#infoParse #po").val(parseInfo.result.poNo);
                       $("#infoParse #inspectionDate").val(parseInfo.result.inspectionDate);
                     }
                   }
                   parsing.find('.alert-success').addClass('hidden');
                   parsing.find('.alert-danger').removeClass('hidden');
                   stt.removeClass('text-success').addClass('text-danger').html('Failed!');
                 }
                 jQuery('#upload-progress').find('.progress-bar').removeClass('progress-bar-striped');
               },
                            ChunkUploaded: function(up, file, info) {                 // Called when file chunk has finished uploading
                                 },
               UploadComplete: function(up, files) {
                 // Called when all files are either uploaded or failed
                                 },
               Destroy: function(up) {
                 // Called when uploader is destroyed
                                 },
                            Error: function(up, args) {                 // Called when error occurs
                                 }        
             }    
           });    
           uploader.init();

          $( "#datepicker,#datepicker1" ).datepicker({dateFormat: 'yy-mm-dd'});

          jQuery(document.body).on('click', '.file', function(e){ e.preventDefault(); $(this).parent().find('input[type=file]').attr('name','up_file').click();});
          jQuery(document.body).on('click', '.resume',  function(e){ e.preventDefault(); $(this).parent().find('input[type=file]').attr('name','up_resume').click();});
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
               "ajax": "/adda/interviewc/evaluation/async.php",
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
              return '<form method="POST" enctype="multipart/form-data" action="upload.php"> \
                <div class="content"><input type="hidden" name="phone" value="'+row[3]+'"/> \
                <input type="file" name="up_file" id="up_file" style="display: none" /> \
                <button href="#" class="btn btn-primary file">Upload File</button> \
                <button href="#" class="btn btn-primary resume">Upload Resume</button> \
                </div></form>'
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
