<!DOCTYPE html>


<?php

session_start();

/*if(!isset($_SESSION['useremail'])){
  header('Location: ./signin.php');
}*/

?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">

	<title>Seat Planning System</title>

	<link rel="shortcut icon" href="assets/images/logo.jpg">

	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<body >
  <!-- Side nav starts -->
  <!--*************************** Side nav ends **********************-->

  <div class="navbar navbar-inverse navbar-fixed-top headroom" style="height: 50px;">

    <div class="container">


			<div class="navbar-header">
				<!-- Button for smallest screens -->
        <div class="float-xs-left">
    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>


      </div>

			</div>
			<div class="navbar-collapse collapse">
      <!--  <ul id="slide-out" class="side-nav">
      </ul> -->
    <!--  <ul class="nav navbar-nav pull-left">
        <li class="active">	 <a href="#" data-activates="slide-out" class="button-collapse">Menu</a></li>

      </ul>
-->

        <ul class="nav navbar-nav pull-right">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="php/logout.php"> Signout</b></a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
	<!--*************************** Navbar ends **************************-->
	<div class="container" id="container_of_MID_area">
		<div class="row">
			<div id="mysidenav" class="col-md-3">
		  	<div id="slide-out" class="side-nav fixed custom-scrollbar">
					<div class="row">
						<a href="profile.php" class="btn btn-default">Profile</a>
					</div>
					<div class="row">
						<a href="createSeatPlan.php" class="btn btn-default">Create Seat Plan</a>
					</div>
					<div class="row">
						<a href="#" class="btn btn-default">Saved Plans</a>
					</div>
			</div>
      </div>


			<div class="row" class="col-md-9">
				<div id="recent_activities">
					Recent Activities

				</div>
			</div>

		</div>



	</div>

     <!--/. SideNav endssssssssssss -->
  	<footer id="footer">

  		<div class="footer1">
  			<div class="container">
  				<div class="row">

  					<div class="col-md-3 widget">
  						<h3 class="widget-title">Contact</h3>
  						<div class="widget-body">
  							<p>+234 23 9873237<br>
  								<a href="mailto:#">some.email@somewhere.com</a><br>
  								<br>
  								234 Hidden Pond Road, Ashland City, TN 37015

  							</p>
  						</div>
  					</div>

  					<div class="col-md-3 widget">
  						<h3 class="widget-title">Follow me</h3>
  						<div class="widget-body">
  							<p class="follow-me-icons">
  								<a href=""><i class="fa fa-twitter fa-2"></i></a>
  								<a href=""><i class="fa fa-dribbble fa-2"></i></a>
  								<a href=""><i class="fa fa-github fa-2"></i></a>
  								<a href=""><i class="fa fa-facebook fa-2"></i></a>
  							</p>
  						</div>
  					</div>

  					<div class="col-md-6 widget">
  						<h3 class="widget-title">Text widget</h3>
  						<div class="widget-body">
  							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusdam architecto voluptatem amet fugiat nesciunt placeat provident cumque accusamus itaque voluptate modi quidem dolore optio velit hic iusto vero praesentium repellat commodi ad id expedita cupiditate repellendus possimus unde?</p>
  							<p>Eius consequatur nihil quibusdam! Laborum, rerum, quis, inventore ipsa autem repellat provident assumenda labore soluta minima alias temporibus facere distinctio quas adipisci nam sunt explicabo officia tenetur at ea quos doloribus dolorum voluptate reprehenderit architecto sint libero illo et hic.</p>
  						</div>
  					</div>

  				</div> <!-- /row of widgets -->
  			</div>
  		</div>

  		<div class="footer2">
  			<div class="container">
  				<div class="row">

  					<div class="col-md-6 widget">
  						<div class="widget-body">
  							<p class="simplenav">
  								<a href="#">Home</a> |
  								<a href="about.html">About</a> |
  								<a href="sidebar-right.html">Sidebar</a> |
  								<a href="contact.html">Contact</a> |
  								<b><a href="signup.html">Sign up</a></b>
  							</p>
  						</div>
  					</div>

  					<div class="col-md-6 widget">
  						<div class="widget-body">
  							<p class="text-right">
  								Copyright &copy; 2014, Your name. Designed by <a href="http://gettemplate.com/" rel="designer">gettemplate</a>
  							</p>
  						</div>
  					</div>

  				</div> <!-- /row of widgets -->
  			</div>
  		</div>

  	</footer>





  	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
  	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  	<script src="assets/js/headroom.min.js"></script>
  	<script src="assets/js/jQuery.headroom.min.js"></script>
  	<script src="assets/js/template.js"></script>
    <script src="assets/js/mdb.min.js"></script>
    <script src="assets/js/tether.min.js"></script>

        <script>
            $(".button-collapse").sideNav();

            var el = document.querySelector('.custom-scrollbar');

            Ps.initialize(el);
        </script>
  </body>
  </html>
