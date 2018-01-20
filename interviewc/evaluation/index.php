<?php include_once('db.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Interview Evaluation System</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]><script src="js/vendor//html5.js"></script><![endif]-->    
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/prefixfree.min.js"></script>
    <style>
	* {
  font-family: 'Open Sans', sans-serif;
}

html, body{
  text-align: center;
  background-color:#D7FAFF;
}

.container{
  padding: 20px;
  background-color: white;
  box-shadow: 0 0 4px 1px white;
  width: 400px;
  height: 350px;
  margin: auto;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  text-align: center;
}

.wrap_new{  
  position: relative;
  width: 80px;
  height: 80px;
  margin: 10px auto 15px auto;
}

.clicker{
  background-color: white;
  outline: none;  
  font-weight: 600;
	  position:absolute;
  cursor: pointer;
  padding: 0;
	  border: none;
	  height: 64px;
	  width: 64px;
  left: 8px;
  top: 8px;
	  border-radius: 100px;
	  z-index: 2;
}

.clicker:active{
	  transform: translate(0, 1px);
  height: 63px;
	  box-shadow: 0px 1px 0 0 rgb(190,190,190) inset;
}

.circle{
	  position: relative;
  border-radius:40px;
	  width: 80px;
	  height: 80px;
	  z-index: 1;
}

.circle.third{
  border-radius: 0;
}

.clicker.faster:hover + .circle, .clicker.faster:active + .circle {
	  animation: rotator linear .4s infinite;
}

.clicker.fast:hover + .circle, .clicker.fast:active + .circle {
	  animation: rotator linear .5s infinite;
}

.clicker:hover + .circle, .clicker:active + .circle {
	  animation: rotator linear .8s infinite;
}

@keyframes rotator{
	  from{ transform: rotate(0deg); }
	  to{ transform: rotate(360deg); }
}

		
.angled {
			background-image: linear-gradient(45deg, 
                white 0%,
                white 30%,
                rgb(20,190,235) 30%,
								rgb(20,190,235) 70%, 
                white 70%, 
                white 100%);
		}



	</style>
  </head>
  <body id="login">
    <div class="container">
<div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="http://adda.2adpro.com/"><img src="bootstrap/img/logo.png" alt="2adpro" />Interview Evaluation System</a>                    
                    
                </div>
            </div>
        </div>	
      <form class="form-signin" action="login.php" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
		
        
        <input type="text" class="input-block-level" placeholder="User Name" id="name" name="name">
        <input type="password" class="input-block-level" placeholder="Password" id="password" name="password">        
      <!--  <select id="type" name="type">
		<option value="0">Employee</option>		
		<option value="1">TL/PL</option>		
		<option value="2">Manager</option>
        <option value="3">Admin</option>								
		</select>-->
      
        <div class="wrap_new">	
  		<button class="clicker" type="submit">Login</button>
    		<div class="circle angled"></div>
  		</div
        ><p id="mesE"></p>
        <script type="text/javascript">
		$(document).ready(function(e) {
			
        <?php 
		if(isset($_REQUEST['msg'])){
		if(@$_REQUEST['msg']=="e"){?>
			$("#mesE").append('<p id="msg_e" style="color:#F00">Invalid Login Details</p>').slideDown("slow");
			setTimeout(function () {$('#msg_e').slideUp(function(){$(this).remove()});}, 3000);

		<?php } }?>
    
        });
        

				</script>
      </form>
	  <div >
     
		
	  </div>

    </div>
  
  </body>
</html>