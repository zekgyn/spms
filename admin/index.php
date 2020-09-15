<?php
session_start();
include 'inc/connect.php';

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

		<nav class="navbar navbar-dark sticky-top bg-dark">
		  <header>
				<h2>
					<a class="navbar-brand  mr-0 px-4" href="index.php">SPMS ADMIN PORTAL</a>

				</h2>

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


		    </ul>

		  </div>
		</nav>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-lg-12 align-items-center">
			<form action="" method="post" class="form-signin text-center">
					<br><br><br><br>
				<h1 class="h3 mb-3 font-weight-normal">Admin Logn In</h1><br><br>
				<label for="inputEmail" class="sr-only">Email address</label>
				<input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address"  autofocus>
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" >
				<div class="checkbox mb-3">
					<label>
						<input type="checkbox" name="armb" value="remember-me"> Remember me
					</label>
				</div>
				<button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>
			</form>
<?php

 if(isset($_POST["login"]))
 {
      if(empty($_POST["email"]) || empty($_POST["password"]))
      {

           echo '<div class="alert alert-warning alert-dismissible">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Warning!</strong> Both Fields are required.
             </div>';
      }
      else
      {
           $email = mysqli_real_escape_string($conn, $_POST["email"]);
           $password = mysqli_real_escape_string($conn, $_POST["password"]);
           $query = "SELECT * FROM admin WHERE admin_email = '$email'";
           $result = mysqli_query($conn, $query);
           if(mysqli_num_rows($result) > 0)
           {
                while($row = mysqli_fetch_array($result))
                {
                     if(sha1($password)== $row["admin_password"])
                     {
                          //return true;
                          $_SESSION["email"] = $row["admin_email"];
                          header("location:dashboard.php");
                     }
                     else
                     {
                          //return false;

                          echo '<div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Danger!</strong> Wrong User Details.
                                </div>';

                     }
                }
           }
           else
           {
             //return false;
             echo '<div class="alert alert-danger alert-dismissible">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>Danger!</strong> Wrong User Details.
                   </div>';
           }
      }
 }

?>

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
