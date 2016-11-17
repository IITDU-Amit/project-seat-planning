<?php




include('config.php');

use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;

// Include Spout library 
require_once 'libs/spout-2.4.3/src/Spout/Autoloader/autoload.php';


	// check file name is not empty
	if (!empty($_FILES['file']['name']))
	{
	    echo "debug 1\n\n"; 
	    // Get File extension eg. 'xlsx' to check file is excel sheet
	    $pathinfo = pathinfo($_FILES["file"]["name"]);
	    
	    // check file has extension xlsx, xls and also check 
	    // file is not empty
	   if (($pathinfo['extension'] == 'xlsx' || $pathinfo['extension'] == 'xls') 
	           && $_FILES['file']['size'] > 0 ) {
	        
	        echo "debug 2\n\n";
	        // Temporary file name
	        $inputFileName = $_FILES['file']['tmp_name']; 
	   
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

	                // It reads data after header. In the my excel sheet, 
	                // header is in the first row. 
	                if ($count > 1) { 

	                	echo "debug 3\n\n";
	                    /*// Data of excel sheet
	                    $data['name'] = $row[0];
	                    $data['email'] = $row[1];
	                    $data['phone'] = $row[2];
	                    $data['city'] = $row[3];
	                    
	                    // Push all data into array to be insert as 
	                    // batch into MySql database.  
	                    array_push($rows, $data);*/

	                    $roll = mysqli_real_escape_string($conn, $row[0]);
						$email = mysqli_real_escape_string($conn, $row[1]);
						$sql = "INSERT INTO seat (seat_id,room_plan_id,seat_row_pos,seat_col_pos,student_roll,student_email) VALUES ('','','','','$roll','$email')";
						if (mysqli_query($conn, $sql)) {
    						echo "New record created successfully";
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

	} else {

	    echo "Please Select Excel File";
	    
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
					<li>	<a href="profile.php" >Profile</a></li>
					<li>	<a href="createSeatPlan.php" style="color:white;">Create Seat Plan</a></li>
					<li>	<a href="savedplans.php" >Saved Plans</a></li>
					<li>  <a href="recentWorks.php" >Recent Works</a></li>
				</ul>

        <ul class="nav navbar-nav pull-right">

					<li><a href="php/logout.php"> Signout</b></a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
	<!--*************************** Navbar ends **************************-->
	<div class="container" id="container_of_MID_area" style="min-height:600px;">
		<div class="row col-md-push-1 col-md-9">



			<div>
				<div id="recent_activities">

          <div class="row">
  				<b>Creating Seat Plan</b>







					<div class="row">
                    <div class="top-margin col-md-2">
                        <label>Room No<span class="text-danger" >*</span></label>
                        <input type="text" class="form-control" name="room" id="room" required="true">

                    </div>
											<div class="top-margin col-md-2">
												<label>Rows<span class="text-danger" >*</span></label>
												<input type="number"min="1" max="100" class="form-control" name="rows" id="rows" required="true">

											</div>
											<div class="top-margin col-md-2">
												<label>Columns<span class="text-danger" >*</span></label>
												<input type="number"min="1" max="100" class="form-control" name="columns" id="columns" required="true">

											</div>
											<div class="top-margin col-md-3">
												<label>Total Batches<span class="text-danger" >*</span></label>
												<input type="number"class="form-control" name="totalBatches" id="totalBatches" required="true" >

											</div>

                      <div class="top-margin col-md-1 top-margin">
                      <a href="#" class="btn btn-action top-margin" id="createBatch" style="display: block;display: inline-block;text-align: center;">Create Batch Options</a>

                      </div>


					</div>

<!--Batch choices are here are placed Here End -->
<!--Dynamic Batches  placed Here-->
          <div id="rollOption">
            <div >

            </div>
          </div>

<!--Dynamic Batches  placed Here  Ends-->


<!--Columns Config choices are here are placed Here -->

					<div class="row top-space5">
						<div class="col-sm-2" align="middle" style="padding-top:20px;">
							Configure Columns
						</div>
						<div class="col-sm-1"  style="padding-top:30px;">
							<input class="top-space5" type="radio" name="configure" value="yes" id="configureY" align="middle"> Yes
						</div>

						<div class="col-sm-1"  style="padding-top:30px;">
							<input class="top-space5" type="radio" name="configure" value="no" id="configureN" checked> No
						</div>
						<div class="col-sm-2">
							<button class="btn btn-action top-margin top-space5" name="confCols" value="confCols" id="confCols" align="middle" >Configure</button>

						</div>



					</div>
<!--Columns Config choices are here are placed Here -->

<!--Dynamic Columns are placed Here -->
				<div class="row">
						<div id="configColVals">
						</div>

				</div>
<!--Dynamic Columns are placed Here End -->

					<div class="row top-space5">
						<div class="col-sm-2" align="middle" style="padding-top:30px;">
							Assign Teachers
						</div>
						<div class="col-sm-1"  style="padding-top:30px;">
							<input class="top-space5" type="radio" name="assign" value="yes" id="assignY"> Yes
						</div>

						<div class="col-sm-1"  style="padding-top:30px;">
							<input class="top-space5" type="radio" name="assign" value="no" id="assignN" checked> No
						</div>
						<div class="col-sm-2">
							<button class="btn btn-action top-margin top-space5" name="confTeach" value="confTeach" id="confTeach" align="middle" >Configure</button>

						</div>
					</div>

					<div class="row">
							<div id="teachers">
							</div>
					</div>


					<div class="row">

						<div class="top-margin col-md-3">
							<button class="btn btn-action top-margin " name="table" value="table" id="table">Create Table</button>

						</div>
						<div class="top-margin col-md-3">
							<button class="btn btn-action top-margin " name="save" value="save" id="save">Save Table</button>

						</div>
						<div class="top-margin col-md-3">
						 <button class="btn btn-action top-margin " onclick="print()" name="see" value="see" id="see">Download</button>

					</div>

					<div class="top-margin col-md-3">
						<form method="post" enctype="multipart/form-data">
							<div align="center">
								<p>Upload Excel file: <input type="file" name="file" /> </p>
								<p><input type="submit" name="submit" value="submit"> </p>

							</div>
						</form>

					 </div>

					</div>


					<div class="row col-md-push-3 col-md-6" id="printable">

            <div id="placingroom" class="row" style="padding-top:40px;margin: .1cm;" align="center"></div>
						<div id="tablehere"  class="row" style="padding-top:40px;margin: .2cm;" align="center">


						</div>

						<div id="teachersList"  class="row" style="padding-top:40px;margin: 1cm;">


						</div>
					</div>
<!--
		      <div class="row col-md-push-2" >

          </div>
-->





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
  	<script src="assets/js/jquery.min.js"></script>
  	<script src="assets/js/bootstrap.min.js"></script>
  	<script src="assets/js/headroom.min.js"></script>
  	<script src="assets/js/jQuery.headroom.min.js"></script>
  	<script src="assets/js/template.js"></script>
    <script src="assets/js/mdb.min.js"></script>
    <script src="assets/js/tether.min.js"></script>
		<script src="assets/js/jquery.printarea.js"></script>
		<script >
		var changeison=0;
		var btnfrom;
		var btnto;
		var temp_for_exchange;
		var teacher_add=0;
    var teachers;
    var rows;
    var columns;
    var conf_column;
    var room_number;
    var table_created=false;


		function changeposition(id){
			if(!changeison){
			changeison=1;
			btnfrom= document.getElementById(id);
			}
			else {
				btnto=document.getElementById(id);
				//changing value
				temp_for_exchange=btnto.getAttribute("value");
				btnto.setAttribute("value",btnfrom.getAttribute("value"));
				btnfrom.setAttribute("value",temp_for_exchange);
				changeison=0;
				//changin button text


			}
		}

		function getRandomArbitrary(min, max) {
			//	console.log("min=sroll "+min+"max=eroll "+max);
				min = Math.ceil(min);
	  		max = Math.floor(max);
				//var rand=Math.floor(Math.random() * (max - min + 1)) + min;
			//console.log("rand "+rand);
				 return Math.floor(Math.random() * (max - min + 1)) + min;
		}


	   $(document).ready(function(){


       //*********************************Creating Batch*******************************

   $("#createBatch").click(function() {
      $( "#rollOption" ).empty();
      //checked if batches are entered
      if($("#totalBatches").val()) var totalBatches = $("#totalBatches").val();
      else alert('Please Enter Batch no');
      //create rolls for batches
      for(i=1;i<=totalBatches;i++){
      //div row
      var batchDivs = $("<div class='row' style='padding-top:10px;' id='batch "+i+"' "+">"

      +"<div class='top-margin col-md-2'>"
      +"<label>Batch Name<span class='text-danger' >*</span></label>"
      +"<input type='text' class='form-control' name='bname_"+i+"'" +"id='bname_"+i+"' "+ "required>"
      +"</div>"

        +"<div class='top-margin col-md-2'>"
        +"<label>Start roll<span class='text-danger' >*</span></label>"
        +"<input type='number'class='form-control' name='sroll_"+i+"'" +"id='sroll_"+i+"' "+ "required>"
        +"</div>"

        +"<div class='top-margin col-md-2'>"
        +"<label>End roll<span class='text-danger' >*</span></label>"
        +"<input type='number' class='form-control' name='eroll_"+i+"'" +"id='eroll_"+i+"' "+ "required>"
        +"</div>"

        +"<div class='top-margin col-md-3'>"
        +"<label>Exceptions<span class='text-danger' >*</span></label>"
        +"<input type='text' class='form-control' name='exception_"+i+"'"+ "id='exception_"+i+"' "+"required>"
        +"</div>"


        +"</div>");

        $( "#rollOption" ).append(batchDivs);

      }

   });



  //*********************************Creating Batch Ended*******************************

	//*********************************Adding Teachers option******************************

	$("#confTeach").click(function() {
		if($('#assignY').is(':checked')){

			if($("#teacher_to_add").length == 0) {
			var teacher= $("<div class='top-margin col-md-10'>"
			+"<label>Teachers Name(Comma Separated)"+"<span class='text-danger' >*</span></label>"
			+"<input type='text'class='form-control' name='teacher_to_add'" +"id='teacher_to_add'"+ "required='true'>"
			+"</div>");

			$("#teachers").append(teacher);

			}
		}
		else{
			$("#teachers").empty();
		}

	});



	//********************************Addingn Teachers option End***************************

	//********************************Configuring  columns********************************
	$("#confCols").click(function() {
	if($('#columns').val()>0){
		if($('#configureY').is(':checked')){
			var columns_number;

													columns_number=$('#columns').val();

													for(i=1;i<=columns_number;i++){
													//div row
													var cols = $("<div class='top-margin col-md-2'>"
													+"<label>Column "+i+"<span class='text-danger' >*</span></label>"
													+"<input type='text'class='form-control' name='col_no_"+i+"'" +"id='col_no_"+i+"' "+ "required='true'>"
													+"</div>");

														$( "#configColVals" ).append(cols);




												}




		}
	}else {alert('Eneter columns_number');return;}

	if($('#configureN').is(':checked')){
			$("#configColVals").empty();
	}

	});





	//***********for saving purpose************************
	/*$("button#see").click(function() {
		alert(document.getElementById('tablehere').innerHTML);
	});*/
	//***********for saving purpose************************



//*************for creating table *********************

 $("button#table").click(function() {


	 	$("#tablehere" ).empty();//clearing any table if exists

    if($("#room").val()){room_number=$("#room").val();}
    else{alert('Please Enter Room no');return;}


		if($("#rows").val())  rows = $("#rows").val();// getting row value
		else {alert('Please enter row value');return;}
		if($("#columns").val())  columns = $("#columns").val(); //getting columns value
		else {alert('Please enter column value');return;}
		if($("#totalBatches").val()) var totalBatches=$("#totalBatches").val(); //getting batches value
		else {alert('Please enter Batches');return;}
		var students_for_allocation=new Array();
		var yet_to_place_in_seat=0;

		for(i=1;i<=totalBatches;i++){ //start of for loop for getting each batch students

		var batchname,sroll,eroll,exceptions;
		if($("#bname_"+i).val()) {batchname=$("#bname_"+i).val();}
		else {alert("Batch "+i+"Name Missing. Pleae Enter Required Field");return;}//getting each batch name
		if($("#sroll_"+i).val()) {sroll=$("#sroll_"+i).val();}
		else {alert("Batch "+i+"Start Roll Missing. Pleae Enter Required Field.");return;} //getting start roll
		if($("#eroll_"+i).val()) {eroll=$("#eroll_"+i).val();}
		else {alert("Batch "+i+"End Roll Missing. Pleae Enter Required Field.");return;} //getting end roll
		if( $("#exception_"+i).val()){																									//getting exceptions
											var exceptionString = $("#exception_"+i).val();
											exceptions=exceptionString.split(",");
											for(j=0;j<exceptions.length;j++){
											exceptions[j]=parseInt(exceptions[j]);
											}
			//	students_exceptons.push(exceptions);
		}
		else var exceptions=new Array();

		var batchRolls_for_allocation=new Array();
		for(j=parseInt(sroll);j<=parseInt(eroll);j++){									//omitting exceptions
			if(exceptions.indexOf(j)>=0) continue;
			else batchRolls_for_allocation.push(batchname+" "+j);					//adding batchname and roll and pushing

		}
		yet_to_place_in_seat=yet_to_place_in_seat+parseInt(batchRolls_for_allocation.length);

		students_for_allocation.push(batchRolls_for_allocation);
		//alert("Batch "+i+" "+ totalBatches);
		//alert(i);
		//alert(students_for_allocation[0]);

	}//end of for loop for getting each batch for loop

	//alert(yet_to_place_in_seat);
		//********************creating table***************************
	  var table = $('<table></table>');
		var prevrollBatch=-1;
	//	var allocated=-1;
		if(rows*columns<yet_to_place_in_seat){
			alert("Number of Stundents to be placed is more than allocated space");
			return;
			}
		var randomized= new Array();
		var batch_selector=parseInt(0);
		//alert(students_for_allocation);
		while(yet_to_place_in_seat){
			//alert("Students left to be placed "+yet_to_place_in_seat);
			batch_selector=parseInt(batch_selector%totalBatches);
			//alert("Batch currently "+batch_selector);
			//alert("Batch Size "+students_for_allocation[batch_selector].length);
			if(students_for_allocation[batch_selector].length==0){batch_selector++;continue;}
			var rand_position=parseInt(getRandomArbitrary(0,students_for_allocation[batch_selector].length-1));
			//alert(students_for_allocation[batch_selector] +" Selected "+rand_position +" length"+students_for_allocation[batch_selector].length	);
			randomized.push(students_for_allocation[batch_selector][rand_position]);
			//alert(students_for_allocation[batch_selector].length+" after pushing");
			//students_for_allocation[batch_selector].remove(students_for_allocation[batch_selector][rand_position]);
			//alert(students_for_allocation[batch_selector].length);
			students_for_allocation[batch_selector].splice(rand_position,1);
			//alert(students_for_allocation[batch_selector]);
			batch_selector++;
			yet_to_place_in_seat--;
		}
		//	alert(randomized.length);
		//	alert(randomized);



		//******************start
		if($('#configureN').is(':checked')){
		var count=parseInt(0);

		for(i=1; i<=rows; i++){ //start of rows
			var row = $('<tr></tr>');
			for(j=1;j<=columns;j++){//start of columns


				var seatLeft="";
				var seatUP="";
				var tmp= new Array();
				var exceptions=new Array();
				//var place_in_seat=randomized[0];
				var to_place_in_seat=randomized[count];
				if(parseInt(count-columns)>=0 && parseInt(count-columns)<randomized.length){
					seatUP=randomized[count-columns];
					 tmp=seatUP.split(" ");
					 exceptions.push(""+tmp[0]+' '+(parseInt(tmp[1])-1));
					 exceptions.push(""+tmp[0]+' '+(parseInt(tmp[1])+1));
					// alert('up');
					// alert(exceptions);
				}
				if(parseInt(count-1)>=0 && parseInt(count-1)<randomized.length){
					var seatLeft=randomized[parseInt(count-1)];
					tmp=seatLeft.split(" ");
					var ins=""+tmp[0]+' '+parseInt(tmp[1])-1;
					exceptions.push(""+tmp[0]+' '+(parseInt(tmp[1])-1));
					exceptions.push(""+tmp[0]+' '+(parseInt(tmp[1])+1));
					//alert('left');
					//alert(exceptions);
				}

				if(exceptions.indexOf(randomized[count])>=0){
			//		alert(randomized[count]+" "+exceptions);
				var tmpcount=count+1;
				var currentValue=randomized[count].split(" ");
				var currentBatch=currentValue[0];

				if(tmpcount<randomized.length){
					tmp=randomized[tmpcount].split(" ");
					while((exceptions.indexOf(randomized[tmpcount])>=0 || tmp[0]!==currentBatch)&& tmpcount<randomized.length){
						tmpcount++;
						if(tmpcount<randomized.length){
						 tmp=randomized[tmpcount].split(" ");
						 }
				//		 alert(randomized[tmp]+" "+exceptions);
					}
						if(tmpcount<randomized.length){
							var exchangeTemp=randomized[count];
							randomized[count]=randomized[tmpcount];
							randomized[tmpcount]=exchangeTemp;
						}
					}
				}

				//var exclude=new Array();
			//	var k=$('#'+i+'_'+(j-1)).attr('value');
				//alert(k);
				//alert($('#'+i+"_"+j-1).attr('value'));
				//alert($("input#a"+i+"_"+(j-1)).attr('value')+" "+"input#"+i+"_"+(j-1));

				//if((parseInt(i)-1)!==0) {exclude.push();
				//alert($("#"+(i-1)+"_"+j).val()+" "+randomized);
				//}
			//	if((parseInt(j)-1)!==0) {
				//alert($("#"+i+"_"+j-1).val()+" "+ randomized);
			//}

				var data= $('<td></td>');
				if(count<randomized.length){
				var seatButton= $('<input/>').text(randomized[count]).attr({
				class:'button button-primary seatButton',
				type:'button',
				id:i+'_'+j,
				value:randomized[count],
				onclick:'changeposition(this.id)'

			//value:""+i+" "+j
				});
				} else var seatButton= $('<input/>').text(randomized[count]).attr({
					class:'button button-primary seatButton',
					type:'button',
					id:i+'_'+j,
					value:"Empty",
					onclick:'changeposition(this.id)'

				//value:""+i+" "+j
					});

				data.append(seatButton);
				row.append(data);



				count++;
			}//end of columns
				table.append(row);
		}//end of rows
	}//end of checked radio
	else{
		var array_of_cols_length= new Array();
		var countTotalInColumns=0;
		for(i=1;i<=columns;i++){
		//	alert($("#col_no_"+i).val());
		if($("#col_no_"+i).val()>=0){
			array_of_cols_length.push($("#col_no_"+i).val());
			countTotalInColumns=countTotalInColumns+parseInt($("#col_no_"+i).val());
			//alert(countTotalInColumns);
			if(countTotalInColumns>randomized.length) {alert("Sum of Column values exceeds Students numbers");return;}

		}
		else {alert("Enter value in Column "+i);return;}

		}
		if(countTotalInColumns!==randomized.length){
			alert("Studnets total and Total placed in columns does not match. Please Enter Values correctly in column");
			return;
		}

		var count=parseInt(0);

		for(i=1; i<=rows; i++){ //start of rows
			var row = $('<tr></tr>');
			for(j=1;j<=columns;j++){//start of columns


				var seatLeft="";
				var seatUP="";
				var tmp= new Array();
				var exceptions=new Array();
				var to_place_in_seat=randomized[count];
				if(parseInt(count-columns)>=0 && parseInt(count-columns)<randomized.length){
					seatUP=randomized[count-columns];
					 tmp=seatUP.split(" ");
					 exceptions.push(""+tmp[0]+' '+(parseInt(tmp[1])-1));
					 exceptions.push(""+tmp[0]+' '+(parseInt(tmp[1])+1));
				}
				if(parseInt(count-1)>=0 && parseInt(count-1)<randomized.length){
					var seatLeft=randomized[parseInt(count-1)];
					tmp=seatLeft.split(" ");
					var ins=""+tmp[0]+' '+parseInt(tmp[1])-1;
					exceptions.push(""+tmp[0]+' '+(parseInt(tmp[1])-1));
					exceptions.push(""+tmp[0]+' '+(parseInt(tmp[1])+1));

				}

				if(exceptions.indexOf(randomized[count])>=0){
				var tmpcount=count+1;
				var currentValue=randomized[count].split(" ");
				var currentBatch=currentValue[0];

				if(tmpcount<randomized.length){
					tmp=randomized[tmpcount].split(" ");
					while((exceptions.indexOf(randomized[tmpcount])>=0 || tmp[0]!==currentBatch)&& tmpcount<randomized.length){
						tmpcount++;
						if(tmpcount<randomized.length){
						 tmp=randomized[tmpcount].split(" ");
						 }
					}
						if(tmpcount<randomized.length){
							var exchangeTemp=randomized[count];
							randomized[count]=randomized[tmpcount];
							randomized[tmpcount]=exchangeTemp;
						}
					}
				}

				var data= $('<td></td>');
				if(count<randomized.length && parseInt(array_of_cols_length[j-1])>=i){
				var seatButton= $('<input/>').text(randomized[count]).attr({
				class:'button button-primary seatButton',
				type:'button',
				id:i+'_'+j,
				value:randomized[count],
				onclick:'changeposition(this.id)'

				});
			} else {var seatButton= $('<input/>').text("Empty").attr({
					class:'button button-primary seatButton',
					type:'button',
					id:i+'_'+j,
					value:"Empty",
					onclick:'changeposition(this.id)'

				});
				//alert("col "+array_of_cols_length[j-1]+"row "+i);
			}

				data.append(seatButton);
				row.append(data);


				if(parseInt(array_of_cols_length[j-1])>=i)count++;
			}//end of columns
				table.append(row);
		}


	}
//appending Teachers

  $("#placingroom").html("Room Number :"+ room_number);
  //alert(room_number)
	$('#tablehere').append(table);

	if($('#assignY').is(':checked')){
		if($('#teacher_to_add').val() == '') {alert('Please Enter Teachers Name');return;}
		teachers=$("#teacher_to_add").val().split(",");
		//alert(teachers);
		$("#teachersList").append("<div class='row' align='center'><b>Assigned Teachers</b></div>");
		for(i=0;i<teachers.length;i++){
		//	alert(teachers[parseInt(i)]);
			$("#teachersList").append("<div class='row' align='center'>"+teachers[parseInt(i)]+"</div>");
		}
	}
table_created=true;

 });


        //*********************************Saving table *******************************
        $("#save").click(function() {


          if(table_created){
          // var userId = $("").attr('id');

           var room_teachers=teachers;
           var table_req=$("#tablehere").html();
           table_req=escapeHtml(table_req);
           //alert(table_req);
           //alert(unescape(table_req));
           var userid="<?php echo $_SESSION['id'];?>";
           userid=parseInt(userid);
        //   alert(userid+" "+rows+" "+columns+" "+room_number);

           var url = 'php/saveplan.php';

           var form = $('<form action="' + url + '" method="post">' +
             '<input type="text" name="user_id" value="' + userid + '" />' +
             '<input type="text" name="room_rows" value="' + rows + '" />' +
             '<input type="text" name="room_cols" value="' + columns + '" />' +
             '<input type="text" name="room_table" value="' + table_req+ '" />' +
             '<input type="text" name="room_no" value="' + room_number + '" />' +
             '</form>');
           $('body').append(form);
           form.submit();


           //var tablehere
         }

    /*     $.post("php/saveplan.php", {
                user_id: $_SESSION['user_id'];
                rows:room_rows;
                cols:room_columns;

            }, function(data){
                var theResult = data;
        }, 'json' );
*/

        //  alert("Please Create a Table to save");
        });


        //*********************************Saving table End*******************************


});
var entityMap = {
  "&": "&amp;",
  "<": "&lt;",
  ">": "&gt;",
  '"': '&quot;',
  "'": '&#39;',
  "/": '&#x2F;'
};

function escapeHtml(string) {
  return String(string).replace(/[&<>"'\/]/g, function (s) {
    return entityMap[s];
  });
}

		 function print(){
						 var mode = 'iframe';
						 var close = mode == "popup";
						 var options = { mode : mode, popClose : close};

						 $('#printable').printArea( options );
		 }
	  </script>





  </body>
  </html>
