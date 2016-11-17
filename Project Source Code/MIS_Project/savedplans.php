<?php session_start();
include('php/config.php');
if(!isset($_SESSION['useremail'])){
  header('Location: ./signin.php');
}



?>
<!DOCTYPE html>
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
  <script>

  </script>

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

				<ul class="nav navbar-nav pull-left">
					<li>	<a href="profile.php"  style="color:white;">Profile</a></li>
					<li>	<a href="createseatplan.php" >Create Seat Plan</a></li>
					<li>	<a href="savedPlans.php" >Saved Plans</a></li>
					

				</ul>

        <ul class="nav navbar-nav pull-right">

					<li><a href="php/logout.php"> Signout</b></a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
	<!--*************************** Navbar ends **************************-->
	<div class="container" id="container_of_MID_area" style="height:650px;">
		<div class="row col-sm-push-1 col-sm-8" style="padding-top:50px;">

			<div class="row">
        <?php
        $userID=$_SESSION['id'];
        $sql = "SELECT * FROM roomplan WHERE user_id=$userID";
        $result = mysqli_query($conn,$sql);


        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='row'><a href='#' onclick='detailfunction(".$row["room_id"].");'>Room Number ".$row["room_number"];
                echo " has ".$row["room_rows"]." rows";
                echo " and ".$row["room_cols"]." columns</a></div>";


            }
        } else {
            echo "0 results";
        }



        ?>
			</div>

		</div>
</div>




     <!--/. SideNav endssssssssssss -->

 			<footer id="footer" class="top-space">

 				<div class="footer1">
 					<div class="container">
 						<div class="row">

 							<div class="col-md-push-5 col-md-3 widget">
 								<h3 class="widget-title">Contact</h3>
 								<div class="widget-body">
 									<p>Phone Number : 8801779482994<br>
 										<a href="#"> Email address: iit@du.ac.bd</a><br>
 									IIT,University of Dhaka
 									</p>
 								</div>
 							</div>





 						</div> <!-- /row of widgets -->
 					</div>
 				</div>

 				<div class="footer2">
 					<div class="container">
 						<div class="row">

 							<div class="col-md-6 widget">

 							</div>

 							<div class="col-md-6 widget">
 								<div class="widget-body">
 									<p class="text-right">
 										Copyright &copy; 2016, IIT.
 									</p>
 								</div>
 							</div>

 						</div> <!-- /row of widgets -->
 					</div>
 				</div>

 			</footer>




  	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
  	<script src="assets/js/jquery.min.js"></script>
  	<script src="assets/js/bootstrap.min.js"></script>
  	<script src="assets/js/headroom.min.js"></script>
  	<script src="assets/js/jQuery.headroom.min.js"></script>
  	<script src="assets/js/template.js"></script>
    <script src="assets/js/mdb.min.js"></script>
    <script src="assets/js/tether.min.js"></script>

        <script>

        $(document).ready(function(){
              $('#changePassword').click(function(){
								var attr=$('#userpass').attr('disabled');
								if (typeof attr !== typeof undefined && attr !== false) {
  									$('#userpass').removeAttr("disabled");
								}
								else $('#userpass').attr('disabled',true);
            });

            $('#changeName').click(function(){

							var attr=$('#username').attr('disabled');
							if (typeof attr !== typeof undefined && attr !== false) {
									$('#username').removeAttr("disabled");
							}
							else $('#username').attr('disabled',true);


          });

            $('#changeEmail').click(function(){
							var attr=$('#useremail').attr('disabled');
							if (typeof attr !== typeof undefined && attr !== false) {
									$('#useremail').removeAttr("disabled");
							}
							else $('#useremail').attr('disabled',true);

            });
          });
        </script>

        <script>
        function detailfunction(room_id){

          var url = 'detailseatplan.php';
          var form = $('<form action="' + url + '" method="post">' +
            '<input type="text" name="room_id" value="' + room_id + '" />' +
            '</form>');
          $('body').append(form);
          form.submit();

        }


        </script>


  </body>
  </html>
