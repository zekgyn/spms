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
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-centre pt-3 pb-2 mb-3 border-bottom">
          <h4><b>Employee Evaluation</b></h4>
    </div>



    <div class="alert alert-info">
     <span>
     <strong>Instructions:</strong><br>
<i>Search for a user to start evaluating them.</i>
   </span>
     </div>


                <div class="col-md-8 order-md-1">
                      <h4 class="mb-3"></h4>
                      <form class="needs-validation" action="" method="post" >
                        <div class="row">

                          <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" name="firstname" placeholder="Firsname" required data-error="Please enter your full name.">
                            <div class="invalid-feedback">
                              First name is required.
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" name="lastname" placeholder="Lastname" required>
                            <div class="invalid-feedback">
                              Last name is required.
                            </div>
                          </div>
                        </div>

                        <div class="mb-3">
                          <label for="email">Email <span class="text-muted"></span></label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
                          <div class="invalid-feedback">
                            Please enter a valid email address.
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="username">Password</label>
                          <div class="input-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                            <div class="invalid-feedback" style="width: 100%;">
                              Your Password is required.
                            </div>
                          </div>
                        </div>


                            <div class="mb-3">
                              <label for="email">Date Of Birth <span class="text-muted"></span></label>
                                    <div class="form-group">
                                        <div class='input-group date'>
                                            <input type='date' name="birthday" class="form-control" required/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>


                        <div class="mb-3">
                          <label for="address">Address</label>
                          <input type="text" class="form-control" id="address" name="address" placeholder="Example: 1234 Main St" required>
                          <div class="invalid-feedback">
                            Please enter employee address.
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100" id="country" name="country" required>
                              <option value="">Choose...</option>
                              <option>Tanzania</option>
                              <option>Kenya</option>
                              <option>Uganda</option>
                            </select>
                            <div class="invalid-feedback">
                              Please select a valid country.
                            </div>
                          </div>
                          <div class="col-md-4 mb-3">
                            <label for="state">Region</label>
                            <select class="custom-select d-block w-100" id="region" name="region" required>
                              <option value="">Choose...</option>
                              <option>California</option>
                              <option>Dar Es Salaam</option>
                              <option>Dodoma</option>
                              <option>Tanga</option>
                              <option>Manyara</option>
                            </select>
                            <div class="invalid-feedback">
                              Please provide a Region.
                            </div>
                          </div>
                        </div>

                        <hr class="mb-4">

                        <h4 class="mb-3">Gender</h4>

                        <div class="d-block my-3">
                          <div class="control radio">
                            <input id="male" name="gender" type="radio" class="control-input" value="male" checked required>
                            <label class="control-label" for="credit">male</label>
                          </div>
                          <div class="control radio">
                            <input id="female" name="gender" type="radio" class="control-input" value="female" required>
                            <label class="control-label" for="debit">female</label>
                          </div>

                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Add User</button>
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
