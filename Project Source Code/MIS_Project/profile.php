<?php session_start();
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
		<div class="row col-md-push-3 col-sm-6">

			<div class="row">
				<div id="recent_activities">

          <div class="row">
  				<b>Profile</b>
					<?php
					$email=$_SESSION['useremail'];
					$name=$_SESSION['username'];
/*
					include('config.php');
					$useremail=$_SESSION['useremail'];
					$row = $result->fetch_assoc();
					$dbquery = ("SELECT * FROM user WHERE email='$useremail'");
					$result =$conn->query($dbquery);
					$usernameValue = $row['username'];
					$userpass=$row['password'];
					$useremailValue=$row['email'];*/
					 ?>
          <form action="php/changeinfo.php"  method="POST" name='changeform' id="changeform" onsubmit="return validateForm()">
              <div class="row top-space5" style="padding-top:10px;">
                    <div class="col-md-4">
                        <label >Name <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="username" id ="username" value="<?php echo $name?>"disabled>

                    </div>

                    <div class="col-md-1">
                        <a  id="changeName" class="btn ">Change</a>
                    </div>
              </div>


                <div class="row top-space5" style="padding-top:5px;">
                    <div class="col-md-4">
                          <label >Email Address <span class="text-danger">*</span></label>
                    </div>

                    <div class="col-md-4">
                          <input type="email" name="useremail" id ="useremail" value="<?php echo $email?>" disabled>
                    </div>
										  <div class="col-md-1">

											</div>


                </div>

                <div class="row top-space5" style="padding-top:15px;">
                      <div class="col-md-4">
                          <label>Password <span class="text-danger">*</span></label>
                      </div>
                      <div class="col-md-4" >
                          <input type="password" name="userpass" id="userpass" value="*******" disabled>
                      </div>
                      <div  class="col-md-1">
                        <a  id="changePassword" class="btn ">Change</a>
                      </div>

                </div>
                <div class="col-md-push-8 col-md-1 top-space5" style="padding-top:15px;">
                    <button type="button" name="buttonSubmit" value="submit" id="formsubmit">Submit</button>
                </div>


              </form>

              <!--
             <div class="top-margin">
                <label>Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="username" id="username">
                <div id="errusername">	</div>
              </div>
              <div class="top-margin">
                <label>Email Address <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="useremail" id ="useremail">
                <div id="erruseremail">	</div>
              </div>

              <div class="row top-margin">
                <div class="col-sm-6">
                  <label>Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" name="userpass" id="userpass" >
                    <div id="erruserpass">	</div>
                </div>
                <div class="col-sm-6">
                  <label>Confirm Password <span class="text-danger" >*</span></label>
                  <input type="password" class="form-control" id="confpass" name="confpass">
                    <div id="errconfpass">	</div>
                </div>
              </div>

              <hr>

              <div class="row">

                <div class="col-lg-4 text-right">
                  <button class="btn btn-action" type="submit" name="submit" value="submit">Register</button>
                </div>
              </div> -->



          </div>

				</div>
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
  	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
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

            $('#formsubmit').click(function(){
              var user_Name =$("#username").val();
              var user_Password =$("#userpass").val();
              var attr1=$("#username").attr('disabled');
              var attr2=$("#userpass").attr('disabled');


              if (user_Name == null || user_Name == "") {
                  alert("Please Enter a valid Username.")

                  return;
              }

              if (user_Password == null || user_Password == "") {
                  alert("Please Enter a valid Password.")
                return;
              }

                document.getElementById("changeform").submit();

            });


          });
        </script>





  </body>
  </html>
