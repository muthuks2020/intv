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
<link href="assets/css/admin.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="assets/css/jquery-ui.css">
<script src="../evaluation/js/jquery-1.8.3.min.js"></script>
<script src="assets/js/jquery-ui.js"></script>
<script src="jquery.uploadfile.js"></script>
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
<form method="post" name="success" action="export.php">
   <label>From:</label><input type="text" id="datepicker" name="datepicker"/>
   <label>To:</label><input type="text" id="datepicker1" name="datepicker1"/>
   <input type="submit" name="submit" value="Download"/>
 </form>
 <div style="clear: both"></div>
</div>
<div id="loading"></div>
        <div id="container" style="max-width: 1024px;margin:0 auto">
            <div class="data"></div>
            <div class="pagination"><ul><li p="1" class="inactive">First</li><li class="inactive">Previous</li><li p="1" style="color:#fff;background-color:#006699;" class="active">1</li><li p="2" class="active">2</li><li p="3" class="active">3</li><li p="4" class="active">4</li><li p="5" class="active">5</li><li p="6" class="active">6</li><li p="7" class="active">7</li><li p="2" class="active">Next</li><li p="170" class="active">Last</li></ul><input type="text" class="goto" size="1" style="margin-top:-1px;margin-left:60px;"><input type="button" id="go_btn" class="go_button" value="Go"><span class="total" a="170">Page <b>1</b> of <b>170</b></span></div>
        </div>
<?php
}
else
{
	header('location:index.php');
}
?>
<script type="text/javascript">
function updatescript(){

}

                function loading_show(){
                    $('#loading').html("<img src='images/loading.gif'/>").fadeIn('fast');
                }
                function loading_hide(){
                    $('#loading').fadeOut('fast');
                }
                function loadData(page){
                    loading_show();
                    $.ajax
                    ({
                        type: "POST",
                        url: "/adda/interviewc/evaluation/load_data.php",
                        data: {page:page,admin:"admin"},
                        success: function(msg)
                        {
							loading_hide();
							$("#container").html(msg);
							}
                    });
                }
                loadData(1);
				updatescript()
				$('.upload .drop a').live("click",function(){$(this).parent().find('input').click();});
				$('#container .pagination li.active').live('click',function(){var page = $(this).attr('p');loadData(page);});
				$('#go_btn').live('click',function(){
                    var page = parseInt($('.goto').val());
                    var no_of_pages = parseInt($('.total').attr('a'));
                    if(page != 0 && page <= no_of_pages){
                        loadData(page);
						updatescript()
                    }else{
                        alert('Enter a PAGE between 1 and '+no_of_pages);
                        $('.goto').val("").focus();
                        return false;
                    }
                });
        </script>
		<script>$(function() {$( "#datepicker,#datepicker1" ).datepicker({dateFormat: 'yy-mm-dd'});});</script>
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
</body>
</html>