 <?php if (isset($_POST['logintext'])) {
	$valid = shell_exec('java -cp .:mysql-connector-java-5.1.40-bin.jar RegistrationDbManager F ' . $_POST['logintext'] . ' ' . $_POST['passtext']);
 		//echo $valid;
 		if ($valid == "0") {
		//echo '<br>INVALID LOGIN';
		}
		elseif ($valid == "1") {
			header("Location: enrollment.php");
		}
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
  	margin-bottom: 420px;
  
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
  .carousel-inner img {
      -webkit-filter: grayscale(90%);
      filter: grayscale(90%); 
      width: 100%;
      margin: auto;
  }
  .carousel-caption h3 {
      color: #fff !important;
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
  #googleMap {
      width: 100%;
      height: 400px;
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
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
  #loginText {
  	color: #000000;
  }
  #passText {
  	color: #000000;
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
		  <span class="caret"></span></a>
		  <ul class="dropdown-menu">
		    <li><a href="#"></a></li>  
		  </ul>
		</li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<!-- Container-->
	<div id="database" class="container text-center">
		<div class= "col-md-4">
		</div>
		<div class= "col-md-4">
			<div class = "row login">
				<br>
				<form class="loginForm" method="post" action="login.php">
				  	New User<br>
			  	  	<input type="text" name="logintext" id="loginText">
				  	<br><br>
			  	  	Password<br>
			  	  	<input type="password" name="passtext" id="passText">
			  	  	<br><br>
			  	  	Repeat Password<br>
			  	  	<input type="password" name="passtext" id="passText">
				  	<br><?php if (isset($_POST['logintext'])) {
			 			if ($valid == "0") {
							echo '<br>INVALID LOGIN';
						}
					}
					?>
					<br>
			  		<input type="submit" class="btn btn-small" value="Submit">
				 </form>
				 <br>
			</div>
		</div>
	</div>

	</div>  
	    
	  
	</div>

<div class="footer text-center">
<p>Samuel Riester | Pearson Wade
   <br><br>Contact Us
   <br>P : (479)-575-2905
   <br>E : helpdesk@uark.edu</p>
</div>
 


<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

</body>
</html>
