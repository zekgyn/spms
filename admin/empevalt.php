<?php
session_start();
//Check if user is logged in
if(!isset($_SESSION['email']) || $_SESSION['email'] !=true) {
header("location:index.php?action=login&message=You are not Logged In");
exit();
}
include("inc/connect.php");
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>

		<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="css/dashboard.css" type="text/css" rel="stylesheet" />


  </head>
  <body>




<div class="wrapper" id="wrapper">
  <!-- Nav and left side bar-->
  <?php include('inc/sidebar.php'); ?>
   <!-- Nav and left side bar-->
  <div class="page-wrapper" id="page-wrapper">
    <div class="container-fluid" id="container-fluid">



      <!-- Right side main-->
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <!-- Search one employee-->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search"  name="searchable" placeholder="Search" aria-label="Search">
                  <input class="btn btn-outline-primary my-2 my-sm-0"  name="search" type="submit" value="Search"></input>
                </form>
              </div>
             </div>

             <?php
             if (isset($_POST['search'])) {

                $sql='SELECT * FROM employees where emp_fname="$_POST[searchable]"';
                $query=mysqli_query($conn,$sql);
              }

              ?>

      <!-- Search one employee End-->
    <!-- Add an Employee-->
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 border-bottom">
          <h4><b>Employee Evaluation</b></h4>
    </div>



    <div class="alert alert-info">
     <span>
     <strong>Instructions:</strong><br>
<i>Search for a user to start evaluating them.</i>
   </span>
     </div>



    <!-- <div class="container-fluid">
       ...
     </div>-->
                <div class="container-fluid"><!--d-flex justify-content-center col-md-8 order-md-1 -->
                  <div class="d-flex justify-content-center flex-wrap flex-md-nowrap mb-3 border-bottom">
                        <h5><strong>Productivity</strong></h5>
                  </div>



                      <form class="needs-validation" action="" method="post">

</form>

    <?php
    if (!isset($_POST['empadd'])) {
      echo "Something is wrong";
    }

      else {
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $dob=$_POST['birthday'];
        $address=$_POST['address'];
        $country=$_POST['country'];
        $region=$_POST['region'];
        $gender=$_POST['gender'];


        $sql="INSERT INTO `employees` (`emp_fname`, `emp_lname`, `emp_gender`, `emp_dob`, `emp_email`, `emp_password`, `emp_address`, `emp_country`, `emp_region`)VALUES ($fname, $lname, $gender, $dob, $email, MD5($password), $address, $country, $region)";
        if ($query=mysqli_query($conn,$sql)) {
          echo "Successfully added new Employee";
        }

      }



















     ?>


                    </div>
                    <!-- Add Employee End-->
          </main>
            <!-- Right side main End-->

    </div>
  </div>
</div>



</div>
<footer class="my-5 pt-5 text-muted text-center text-small">
<p class="mt-5 mb-3 text-muted">&copy; SPMS ALL RIGHTS RESERVED-2020</p>
<ul class="list-inline">
  <li class="list-inline-item"><a href="#">Privacy</a></li>
  <li class="list-inline-item"><a href="#">Terms</a></li>
  <li class="list-inline-item"><a href="#">Support</a></li>
</ul>
</footer>
        <script src="js\jquery-3.5.1.min.js"></script>
        <script src="bootstrap.min.js"></script>



      </body>
</html>
