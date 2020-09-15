<?php
session_start();
require_once('inc/connect.php');

if (isset($_POST['submit'])) {
  $email=mysqli_real_escaape_string($conn, $_POST['email']);
  $password=mysqli_real_escaape_string($conn, $_POST['password']);
$sql= 'SELECT * FROM `employees` where `emp_email`="'.$email.'" AND `emp_password`="'.sha1($password).'"';
$run=mysqli_query($conn,$sql);


  if (mysqli_num_rows($run) > 0) {

      $_SESSION['email']= $email;
      header("location:welcome.php");
    }
else 

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>SPMS</title>
		<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
		<link href="css/custom.css" type="text/css" rel="stylesheet" />
	</head>
	<body class="text-center">

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <header>
		  	<a class="navbar-brand" href="#">Staff Performance Management System</a>
		  </header>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">About</a>
		      </li>
					<li class="nav-item">
		        <a class="nav-link" href="#">Contact</a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Account
		        </a>
		        <div class="dropdown-menu mr-sm-2" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">LogIn</a>
		          <a class="dropdown-item" href="#">Register</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="#">LogOut</a>
		        </div>
		      </li>

		    </ul>

		  </div>
		</nav>


		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 col-lg-12 align-items-center">
					<form action="" method="post" class="form-signin text-center">
							<br><br><br><br>
						<h1 class="h3 mb-3 font-weight-normal">Please Sign In</h1><br><br>
						<label for="inputEmail" class="sr-only">Email address</label>
						<input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
						<label for="inputPassword" class="sr-only">Password</label>
						<input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
						<div class="checkbox mb-3">
							<label>
								<input type="checkbox" name="armb" value="remember-me"> Remember me
							</label>
						</div>
						<button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
            <?php
            {
              echo "Your credentials do not match our database";
            }
            }?>
					</form>
				</div>

			</div>
			<br><br>
			<footer class="my-5 pt-5 text-muted text-center text-small">
		  <p class="mt-5 mb-3 text-muted">&copy; SPMS ALL RIGHTS RESERVED-2020</p>
		  <ul class="list-inline">
		    <li class="list-inline-item"><a href="#">Privacy</a></li>
		    <li class="list-inline-item"><a href="#">Terms</a></li>
		    <li class="list-inline-item"><a href="#">Support</a></li>
		  </ul>
		</footer>
		</div>

		<script src="js/jquery-3.5.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

	</body>
</html>







</BODY>
</HTML>
