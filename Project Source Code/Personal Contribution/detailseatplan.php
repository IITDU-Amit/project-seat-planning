<?php session_start();
include('php/config.php');
if(!isset($_SESSION['useremail'])){
  header('Location: ./signin.php');
}
?>

<?php
include('php/config.php');

use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;

// Include Spout library
require_once 'libs/spout-2.4.3/src/Spout/Autoloader/autoload.php';


	// check file name is not empty
	if (!empty($_FILES['file1']['name']))
	{

	    // Get File extension eg. 'xlsx' to check file is excel sheet
	    $pathinfo = pathinfo($_FILES["file1"]["name"]);

	    // check file has extension xlsx, xls and also check
	    // file is not empty
	   if (($pathinfo['extension'] == 'xlsx' || $pathinfo['extension'] == 'xls')
	           && $_FILES['file1']['size'] > 0 ) {


	        // Temporary file name
	        $inputFileName = $_FILES['file1']['tmp_name'];

	        // Read excel file by using ReadFactory object.
	        $reader = ReaderFactory::create(Type::XLSX);

	        // Open file
	        $reader->open($inputFileName);
	        $count = 1;
	        $rows = array();

	        // Number of sheet in excel file
	        foreach ($reader->getSheetIterator() as $sheet) {

	            // Number of Rows in Excel sheet
	            foreach ($sheet->getRowIterator() as $row) {


	                if ($count > 1) {


	          $roll = $row[0];
						$email =$row[1];
            $sql_insert = "INSERT INTO seat (seat_id,room_plan_id,seat_row_pos,seat_col_pos,student_roll,student_email) VALUES ('','','','','$roll','$email')";
						if ($conn->query($sql_insert)){

						} else {
    						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
						}

	                }
	                $count++;
	            }

	            // Print All data
	            /*print_r($rows);*/

	            // Now, here we can insert all data into database table.

	        }

	        // Close excel file
	        $reader->close();

	    } else {

	        echo "Please Select Valid Excel File";
	    }

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

			<div class="row" id="printable">
        <?php
        $roomID=$_POST['room_id'];
        $sql = "SELECT * FROM roomplan WHERE room_id=$roomID";
        $result = mysqli_query($conn,$sql);


        if ($result->num_rows > 0) {
            // output data of each row

            while($row = $result->fetch_assoc()) {
                echo "<div class='row' align='center'>Room Number ".$row["room_number"];
                echo " has ".$row["room_rows"]." rows";
                echo " and ".$row["room_cols"]." columns</div>";
                echo " <div align='center' id=".$row["room_id"].">".$row["room_table"]."</div>";

            }
        } else {
            echo "0 results";
        }
        $sql = "SELECT * FROM teacher WHERE room_plan_id=$roomID";
        $result = mysqli_query($conn,$sql);
        if ($result->num_rows > 0) {
            // output data of each row
            echo "<div class='row' align='center'> Assigned Teachers</div>";

            while($row = $result->fetch_assoc()) {
                echo "<div class='row' align='center'>".$row["teacher_name"]."</div>";
            }



        } else {
            echo "No Teachers  are assigned";
        }



        ?>
			</div>
      <div class="row">
        

            <div class="top-margin col-md-4" style="padding-top:50px;">
              <form method="post" enctype="multipart/form-data">
                <div>
                  <p>Upload Sending Emails Excel file: <input type="file" name="file1" /> </p>
                  <input type="hidden" name="room_id" value="<?php echo $roomID?>"  />
                  <p><input type="submit" name="submit" value="submit"> </p>

                </div>
              </form>

             </div>
             <div class="top-margin col-md-3" style="padding-top:50px;">
              <button class="btn btn-action top-margin " onclick="print()" name="see" value="see" id="see">Download</button>

            </div>

            <div class="top-margin col-md-3" style="padding-top:30px;">
             <button class="btn btn-action top-margin "  name="delete" value="delete" id="delete">Delete</button>

           </div>


      </div>
      <div class="row">
      <!--  <a href="#" onclick="getValue()">CLick me to get 1st members value</a>
-->
      </div>
      <div id="tablereq"></div>


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
    	<script src="assets/js/jquery.printarea.js"></script>

    <script>
        $(document).ready(function(){

          $('#delete').click(function() {
            alert('ok');

            var url = 'php/deleteplan.php';


            var form = $('<form action="' + url + '" method="post">' +
              '<input type="text" name="room_id" value="' + "<?php echo $roomID;?>" + '" />' +
              '</form>');
                $('body').append(form);

                  form.submit();

          });


  });

  function print(){
          var mode = 'iframe';
          var close = mode == "popup";
          var options = { mode : mode, popClose : close};

          $('#printable').printArea( options );
  }

    </script>


  </body>
  </html>
