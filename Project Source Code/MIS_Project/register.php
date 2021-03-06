<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">

	<title>Sign up - Progressus Bootstrap template</title>

	<link rel="shortcut icon" href="assets/images/logo.jpg">

	<link rel="stylesheet" media="screen" href="assets/css/fonts(googleapiscssopenSans).css">
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

<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.html"><img src="assets/images/home.png"  height="35px" width="100px"  style="padding-top: 5px;" alt="IIT Logo"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php">About</a></li>


					<li class="active"><a class="btn" href="signin.php">Sign In</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">



		<div class="row">

			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Registration</h1>
				</header>

				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Register a new account</h3>
							<p class="text-center text-muted">If you have already registered the you can sign in from this <a href="signin.html">Login</a> link. </p>
							<hr>

							<form action="php/registrationcheck.php" method="post" name="registerForm" onsubmit="return validateForm()" id="registerForm">
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
								</div>
							</form>
						</div>
					</div>

				</div>

			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->


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


<script>
function validateForm() {
    var user_Name = document.forms["registerForm"]["username"].value;
		var user_Password =document.forms["registerForm"]["userpass"].value;
		var conf_Password =document.forms["registerForm"]["confpass"].value;
		var user_Email =document.forms["registerForm"]["useremail"].value;

		if (user_Name == null || user_Name == "") {
				document.getElementById("errusername").style.color = "red";
      	document.getElementById('errusername').innerHTML="Please Enter a Name.";
				return false;
    }

		if (user_Email == null || user_Email == "") {
				document.getElementById("erruseremail").style.color = "red";
				document.getElementById('erruseremail').innerHTML="Please Enter a Email.";
				return false;
		}

		if (user_Password == null || user_Password == "") {
			document.getElementById("erruserpass").style.color = "red";
			document.getElementById('erruserpass').innerHTML="Please Enter a Password.";
			return false;
		}


		if (user_Password.length<6) {
						document.getElementById("erruserpass").style.color = "red";
						document.getElementById('erruserpass').innerHTML="Please Enter a 6 character password.";
						return false;
			}

			if (user_Password !== conf_Password) {
							document.getElementById("errconfpass").style.color = "red";
							document.getElementById('errconfpass').innerHTML="Password does not match.";
							return false;
				}

}



</script>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>
