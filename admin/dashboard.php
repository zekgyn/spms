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
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 border-bottom">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap pt-3 pb-2 mb-3">
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search"  name="searchable" placeholder="Search" aria-label="Search">
              <input class="btn btn-outline-primary my-2 my-sm-0"  name="search" type="submit" value="Search"></input>
            </form>
          </div>
         </div>
         <!-- Search one employee-->

         <?php
         if (isset($_POST['search'])) {

            $sql='SELECT * FROM employees where emp_fname="$_POST[searchable]"';
            $query=mysqli_query($conn,$sql);
          }

          ?>

          <!-- Search End-->

        <!--select all employees-->
          <?php
            $sql="SELECT * FROM employees";
            $query=mysqli_query($conn,$sql);
            ?>
            <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-centre pt-3 pb-2 mb-3">
                <h4><b>List of Employee</b></h4>
            </div>

        <div class="table-responsive">
          <?php
          echo '<table class="table table-striped table-sm">';

          echo '<thead>
            <tr>
              <th>Emp-ID</th>
                <th>Emp_Fname</th>
                <th>Emp_Lname</th>
                <th>Emp_Email</th>
                <th>Emp_Phone</th>
                <th>DOB</th>
                <th></th>
                <th></th>
                <th></th>
                </tr>
                </thead>
                <tbody>';

                while ($row = mysqli_fetch_array($query)) {
                  $field1name = $row[0];
                  $field2name = $row[1];
                  $field3name = $row[2];
                  $field4name = $row[5];
                  $field5name = $row[4];
                  $field6name = $row[6];


                  echo
                  '<tr>
                  <td>'.$field1name.'</td>
                  <td>'.$field2name.'</td>
                  <td>'.$field3name.'</td>
                  <td><a href="mailto:'.$field4name.'">'.$field4name.'</a></td>
                  <td><a href="tel:'.$field6name.'">'.$field6name.'</a></td>
                  <td>'.$field5name.'</td>
                  <td><a href="empeval.php?id='.$field1name.'" class="text-white"><button class="btn btn-success btn-sm">Evaluate</button></a></td>
                  <td><a href="empreport.php?id='.$field1name.'" class="text-white"><button class="btn btn-primary btn-sm">Report</button></a></td>
                  <td><a href="delete.php?id='.$field1name.'" class="text-white"><button class="btn btn-danger btn-sm">Delete</button></a></td>
                  </tr>';
                }
                echo '</tbody>

                </table>';

                ?>
        </div>
      </main>
        <!-- Right side main End-->
    </div>
  </div>
</div>


  <footer class="my-5 pt-5 text-muted text-center text-small">
  <p class="mb-1">&copy; 2017-2020 Company Name</p>
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
