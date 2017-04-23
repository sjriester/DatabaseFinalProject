 <?php 
 	//Check if we need to be here
 	if (!isset($_COOKIE["loggedin"])) {
		header("Location: login.php");
	}
 	
 	//Check if department code has been selected and navigate
 	if (isset($_POST['pickDepCode'])) {
 		$dep_value = $_POST['pickDepCode'];
        	setcookie('dep', $dep_value);
        	header("Location: depcourses.php");
	}
	
	//Check if student Id has been selected and navigate
	if (isset($_POST['pickStuId'])) {
 		$stu_value = $_POST['pickStuId'];
        	setcookie('stu', $stu_value);
        	header("Location: stucourses.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title>Student EC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
      background-color: #2d2d30;
  }
  h3, h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 10px;      
      font-size: 20px;
      color: #111;
  }
  .row.login {
  	margin-top: 300px;
  	margin-bottom: 300px;
  	background-color: #2d2d30;
  	opacity: 0.9;
  }
  .row.top {
  	margin-top: 150px;
  	margin-bottom: 70px;
  
  }
  .row.bottom {
  	margin-bottom: 70px;
  
  }
  .row.error {
  	margin-bottom: 390px;
  }
  .btn {
  	width: 80%;
  }
  .container {
      background-image: url("hogs.jpg");
      background-repeat: no-repeat;
      background-size: 100%;
      width: 100%;
      min-height: 100%;
      background-color: #2d2d30;
  }
  .dropdown {
  	border: none;
  	content: none;
  }
  .person {
      border: 10px solid transparent;
      margin-bottom: 25px;
      width: 80%;
      height: 80%;
      opacity: 0.7;
  }
  .person:hover {
      border-color: #f1f1f1;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none;
    }
  }
  .bg-1 {
      background: #2d2d30;
      color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
      border-top-right-radius: 0;
      border-top-left-radius: 0;
  }
  .list-group-item:last-child {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail p {
      margin-top: 15px;
      color: #555;
  }
  .btn {
      padding: 10px 20px;
      background-color: #333;
      color: #f1f1f1;
      border-radius: 0;
      transition: .2s;
  }
  .btn:hover, .btn:focus {
      border: 1px solid #333;
      background-color: #fff;
      color: #000;
  }
  .modal-dialog.Db {
  	width: 75%;
	  	
  }
  .modal-header, h4, .close {
      background-color: #333;
      color: #fff !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-header, .modal-body {
      padding: 40px 50px;
  }
  .modal-body.Db {
  	font-family: Courier New, monospace;
  	font-size: 18px;
  	color: #292929;
  	width: 1000px;
  }
  .nav-tabs li a {
      color: #777;
  }  
  .navbar {
      font-family: Montserrat, sans-serif;
      margin-bottom: 0;
      background-color: #2d2d30;
      border: 0;
      font-size: 11px !important;
      letter-spacing: 4px;
      opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand { 
      color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
      color: #fff !important;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
      
      border-color: transparent;
  }
  .open .dropdown-toggle {
      color: #333;
      background-color: #555 !important;
      
  }
  .dropdown-menu li a {
      color: #000 !important;
    
  }
  .dropdown-menu li a:hover {
      background-color: red !important;
  }
  .footer {
      background-color: #2d2d30;
      color: #f5f5f5;
      padding: 60px;
  }c
  footer a {
      color: #f5f5f5;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  }  
  .form-control {
      border-radius: 0;
  }
  textarea {
      resize: none;
  }
  input[type=submit] {
  	background: #292929;
  	width: 20%;
  	color: white;
  }
  .loginForm {
  	color: #f5f5f5;
  	font-size: 20px;
  	font-family: Tahoma, sans-serif;
  	font-weight: 900;
  }
  .alert.alert-warning {
  	color: #f5f5f5;
  	background: #2d2d30;
  	opacity: 0.9;
  	border: #2d2d30;
  
  }
  #loginText {
  	color: #000000;
  }
  #passText {
  	color: #000000;
  }
  #LogoutButton {
  	width: 100%;
  }
  </style>
  
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>                        
	      </button>
	      <a class="navbar-brand" href="#myPage">Student Enrollment Center</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav navbar-right">
		      	<a class="btn btn-small" href="login.php">Logout</a>
		</li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<!-- Container-->
	<div id="database" class="container text-center">
	 <br>
	  <div class="row top">
	  
	  <!--Menu Buttons-->
	    <div class="col-sm-4">
	      <div class="btn btn-large" data-toggle="modal" data-target="#AddStudent">Add Student</div>
	    </div>
	    
	    <div class="col-sm-4">
	      <div class="btn btn-large" data-toggle="modal" data-target="#AddCourse">Add Course</div>
	    </div>
	    
	    <div class="col-sm-4">
	      <div class="btn btn-large" data-toggle="modal" data-target="#AddApplication">Add Application</div>
	    </div>
	    
	  </div>
	  <div class="row bottom">
	   
	    <div class="col-sm-4">
	      <a class="btn btn-large" href="students.php">View Students</a>
	    </div>
	    
	    <div class="col-sm-4">
	      <div class="btn btn-large" data-toggle="modal" data-target="#PickDepartment">View Department Courses</div>
	    </div>
	    
	    <div class="col-sm-4">
	      <div class="btn btn-large" data-toggle="modal" data-target="#PickStudent">View Student Courses</div>
	    </div>
	    
	    </div>
	    <div class = "row error">
	    	<div class="col-sm-2 col-md-offset-5">
	    	
	    	
	    	<!--|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||\-->
	    	<!--|||||||||||||||||||||||| Checking for succesful database changes and notification to the user |||||||||||||||||||||||||||||||||||||||||||||||||||||||||\-->
	    	<!--|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||\-->
	    	
	    	<?php
	    		if(isset($_POST['firstname'])) {
		  		$validStudent = shell_exec('java -cp .:mysql-connector-java-5.1.40-bin.jar RegistrationDbManager A ' . $_POST['studentId'] . ' ' . $_POST['firstname'] . ' ' . $_POST['lastname'] . ' ' . $_POST['major']);
		  		
		  		if ($validStudent == "false") {
		?>
			  		<div class="alert alert-warning">
	    					<strong>Invalid Input!</strong> The student was not added.
	  				</div>
		<?php
		  		}
		  		if($validStudent == "true") {
		?>
			  		<div class="alert alert-warning">
	    					<strong>The student was added.</strong>
	  				</div>
		<?php	
		  		}
		  	}
		  	
		  	if(isset($_POST['title'])) {
		  	
		  		$title = escapeshellarg($_POST['title']);
		  		$validCourse = shell_exec('java -cp .:mysql-connector-java-5.1.40-bin.jar RegistrationDbManager B ' . $_POST['cStudentId'] . ' ' . $_POST['cCourseNumber'] . ' ' . $title . ' ' . $_POST['creditHours']);
		  		
		  		if ($validCourse == "false") {
		?>
			  		<div class="alert alert-warning">
	    					<strong>Invalid Input!</strong> The course was not added.
	  				</div>
		<?php
		  		}
		  		if($validCourse == "true") {
		?>
			  		<div class="alert alert-warning">
	    					<strong>The course was added.</strong>
	  				</div>
		<?php	
		  		}
		  	}
		  	
		  	if(isset($_POST['aCourseNumber'])) {
		  		$validApp = shell_exec('java -cp .:mysql-connector-java-5.1.40-bin.jar RegistrationDbManager C ' . $_POST['aStudentId'] . ' ' . $_POST['aDepCode'] . ' ' . $_POST['aCourseNumber']);
		  		
		  		if ($validApp == "false") {
		?>
		  		<div class="alert alert-warning">
    					<strong>Invalid Input!</strong> The application was not added.
  				</div>
		  		
		<?php
		  		}
		  		if($validApp == "true") {
		?>
		  		<div class="alert alert-warning">
    					<strong>The application was added.</strong>
  				</div>	
		<?php	
		  		}
		  	}
		?>
		 </div>
	  </div>
	  
	  <!--|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||\-->
	    
	  <!-- Add Student Modal -->
	  <div class="modal fade" id="AddStudent" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title">Add a Student</h4>
		</div>
		<div class="modal-body">
		  <form method="post" action="enrollment.php">
		  	Student ID<br>
	  	  	<input type="text" name="studentId">
		  	<br><br>
	  	  	First name<br>
	  	  	<input type="text" name="firstname">
		  	<br><br>
	  	  	Last name<br>
	  	  	<input type="text" name="lastname">
	  		<br><br>
	  		Major<br>
	  	  	<input type="text" name="major">
		  	<br><br>
		  	<br>
	  		<input type="submit" value="Submit">
		  </form>
		</div>
		
	      </div>
	      
	    </div>
	  </div> <!-- End Modal-->
	  
	  <!-- Add Course Modal -->
	  <div class="modal fade" id="AddCourse" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title">Add a Course</h4>
		</div>
		<div class="modal-body">
		  <form method="post" action="enrollment.php">
		  	Department Code<br>
	  	  	<input type="text" name="cStudentId">
		  	<br><br>
	  	  	Course Number<br>
	  	  	<input type="text" name="cCourseNumber">
		  	<br><br>
	  	  	Title<br>
	  	  	<input type="text" name="title">
	  		<br><br>
	  		Credit Hours<br>
	  	  	<input type="text" name="creditHours">
		  	<br><br>
		  	<br>
	  		<input type="submit" value="Submit">
		  </form>
		</div>
		
	      </div>
	      
	    </div>
	  </div> <!-- End Modal-->
	  
	  <!-- Add Application Modal -->
	  <div class="modal fade" id="AddApplication" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title">Add an Application</h4>
		</div>
		<div class="modal-body">
		  <form method="post" action="enrollment.php">
		  	Student ID<br>
	  	  	<input type="text" name="aStudentId">
		  	<br><br>
	  	  	Department Code<br>
	  	  	<input type="text" name="aDepCode">
	  		<br><br>
	  		Course Number<br>
	  	  	<input type="text" name="aCourseNumber">
		  	<br><br>
		  	<br>
	  		<input type="submit" value="Submit">
		  </form>
		</div>
		
	      </div>
	      
	    </div>
	  </div> <!-- End Modal-->
	  
	  <!-- Department Selection Modal -->
	  <div class="modal fade" id="PickDepartment" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title">Select Department</h4>
		</div>
		<div class="modal-body">
		  <form method="post" action="enrollment.php">
	  	  	Department Code<br>
	  	  	<input type="text" name="pickDepCode">
		  	<br><br>
		  	<br>
	  		<input type="submit" value="Submit">
		  </form>
		</div>
		
	      </div>
	      
	    </div>
	  </div> <!-- End Modal-->
	  
	  <!-- Student Selection Modal -->
	  <div class="modal fade" id="PickStudent" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title">Select Student</h4>
		</div>
		<div class="modal-body">
		  <form method="post" action="enrollment.php">
	  	  	Student ID<br>
	  	  	<input type="text" name="pickStuId">
		  	<br><br>
		  	<br>
	  		<input type="submit" value="Submit">
		  </form>
		</div>
		
	      </div>
	      
	    </div>
	  </div> <!-- End Modal-->
	  
	</div>  
	    
	  
	</div>

<div class="footer text-center">
<p>Samuel Riester | Pearson Wade
   <br><br>Contact Us
   <br>P : (479)-575-2905
   <br>E : helpdesk@uark.edu</p>
</div>

</body>
</html>
