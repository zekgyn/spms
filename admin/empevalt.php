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



                      <form class="needs-validation" action="" method="post">

          <table class="table table-striped table-sm">
            <tr class="form-matrix-tr form-matrix-header-tr">
              <th class="form-matrix-th" style="border:none">

              </th>
              <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_0">
                <label id="label_14_col_0"> Very Poor </label>
              </th>
              <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_1">
                <label id="label_14_col_1"> Not Satisfactory </label>
              </th>
              <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_2">
                <label id="label_14_col_2"> Average </label>
              </th>
              <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_3">
                <label id="label_14_col_3"> Satisfactory </label>
              </th>
              <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_4">
                <label id="label_14_col_4"> Excellent </label>
              </th>
            </tr>
            <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_0">
              <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                <label id="label_14_row_0"> Knowledge/Skill Set </label>
              </th>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_0_0" class="form-radio" name="q14_Evaluation of Skills[0]" value="Very Poor" aria-labelledby="label_14_col_0" />
                <label for="input_14_0_0" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_0_1" class="form-radio" name="q14_Evaluation of Skills[0]" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
                <label for="input_14_0_1" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_0_2" class="form-radio" name="q14_Evaluation of Skills[0]" value="Average" aria-labelledby="label_14_col_2" />
                <label for="input_14_0_2" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_0_3" class="form-radio" name="q14_Evaluation of Skills[0]" value="Satisfactory" aria-labelledby="label_14_col_3" />
                <label for="input_14_0_3" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_0_4" class="form-radio" name="q14_Evaluation of Skills[0]" value="Excellent" aria-labelledby="label_14_col_4" />
                <label for="input_14_0_4" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
            </tr>
            <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_1">
              <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                <label id="label_14_row_1"> Quality of Work </label>
              </th>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_1_0" class="form-radio" name="q14_Evaluation of Skills[1]" value="Very Poor" aria-labelledby="label_14_col_0" />
                <label for="input_14_1_0" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_1_1" class="form-radio" name="q14_Evaluation of Skills[1]" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
                <label for="input_14_1_1" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_1_2" class="form-radio" name="q14_Evaluation of Skills[1]" value="Average" aria-labelledby="label_14_col_2" />
                <label for="input_14_1_2" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_1_3" class="form-radio" name="q14_Evaluation of Skills[1]" value="Satisfactory" aria-labelledby="label_14_col_3" />
                <label for="input_14_1_3" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_1_4" class="form-radio" name="q14_Evaluation of Skills[1]" value="Excellent" aria-labelledby="label_14_col_4" />
                <label for="input_14_1_4" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
            </tr>
            <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_2">
              <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                <label id="label_14_row_2"> Attitude </label>
              </th>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_2_0" class="form-radio" name="q14_Evaluation of Skills[2]" value="Very Poor" aria-labelledby="label_14_col_0" />
                <label for="input_14_2_0" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_2_1" class="form-radio" name="q14_Evaluation of Skills[2]" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
                <label for="input_14_2_1" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_2_2" class="form-radio" name="q14_Evaluation of Skills[2]" value="Average" aria-labelledby="label_14_col_2" />
                <label for="input_14_2_2" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_2_3" class="form-radio" name="q14_Evaluation of Skills[2]" value="Satisfactory" aria-labelledby="label_14_col_3" />
                <label for="input_14_2_3" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_2_4" class="form-radio" name="q14_Evaluation of Skills[2]" value="Excellent" aria-labelledby="label_14_col_4" />
                <label for="input_14_2_4" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
            </tr>
            <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_3">
              <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                <label id="label_14_row_3"> Productivity and Efficiency </label>
              </th>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_3_0" class="form-radio" name="q14_Evaluation of Skills[3]" value="Very Poor" aria-labelledby="label_14_col_0" />
                <label for="input_14_3_0" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_3_1" class="form-radio" name="q14_Evaluation of Skills[3]" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
                <label for="input_14_3_1" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_3_2" class="form-radio" name="q14_Evaluation of Skills[3]" value="Average" aria-labelledby="label_14_col_2" />
                <label for="input_14_3_2" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_3_3" class="form-radio" name="q14_Evaluation of Skills[3]" value="Satisfactory" aria-labelledby="label_14_col_3" />
                <label for="input_14_3_3" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_3_4" class="form-radio" name="q14_Evaluation of Skills[3]" value="Excellent" aria-labelledby="label_14_col_4" />
                <label for="input_14_3_4" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
            </tr>
            <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_4">
              <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                <label id="label_14_row_4"> Reliability and Dependability </label>
              </th>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_4_0" class="form-radio" name="q14_Evaluation of Skills[4]" value="Very Poor" aria-labelledby="label_14_col_0" />
                <label for="input_14_4_0" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_4_1" class="form-radio" name="q14_Evaluation of Skills[4]" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
                <label for="input_14_4_1" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_4_2" class="form-radio" name="q14_Evaluation of Skills[4]" value="Average" aria-labelledby="label_14_col_2" />
                <label for="input_14_4_2" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_4_3" class="form-radio" name="q14_Evaluation of Skills[4]" value="Satisfactory" aria-labelledby="label_14_col_3" />
                <label for="input_14_4_3" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_4_4" class="form-radio" name="q14_Evaluation of Skills[4]" value="Excellent" aria-labelledby="label_14_col_4" />
                <label for="input_14_4_4" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
            </tr>
            <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_5">
              <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                <label id="label_14_row_5"> Collaboration and Teamwork </label>
              </th>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_5_0" class="form-radio" name="q14_Evaluation of Skills[5]" value="Very Poor" aria-labelledby="label_14_col_0" />
                <label for="input_14_5_0" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_5_1" class="form-radio" name="q14_Evaluation of Skills[5]" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
                <label for="input_14_5_1" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_5_2" class="form-radio" name="q14_Evaluation of Skills[5]" value="Average" aria-labelledby="label_14_col_2" />
                <label for="input_14_5_2" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_5_3" class="form-radio" name="q14_Evaluation of Skills[5]" value="Satisfactory" aria-labelledby="label_14_col_3" />
                <label for="input_14_5_3" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_5_4" class="form-radio" name="q14_Evaluation of Skills[5]" value="Excellent" aria-labelledby="label_14_col_4" />
                <label for="input_14_5_4" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
            </tr>
            <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_6">
              <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                <label id="label_14_row_6"> Communication </label>
              </th>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_6_0" class="form-radio" name="q14_Evaluation of Skills[6]" value="Very Poor" aria-labelledby="label_14_col_0" />
                <label for="input_14_6_0" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_6_1" class="form-radio" name="q14_Evaluation of Skills[6]" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
                <label for="input_14_6_1" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_6_2" class="form-radio" name="q14_Evaluation of Skills[6]" value="Average" aria-labelledby="label_14_col_2" />
                <label for="input_14_6_2" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_6_3" class="form-radio" name="q14_Evaluation of Skills[6]" value="Satisfactory" aria-labelledby="label_14_col_3" />
                <label for="input_14_6_3" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_6_4" class="form-radio" name="q14_Evaluation of Skills[6]" value="Excellent" aria-labelledby="label_14_col_4" />
                <label for="input_14_6_4" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
            </tr>
            <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_7">
              <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                <label id="label_14_row_7"> Leadership </label>
              </th>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_7_0" class="form-radio" name="q14_Evaluation of Skills[7]" value="Very Poor" aria-labelledby="label_14_col_0" />
                <label for="input_14_7_0" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_7_1" class="form-radio" name="q14_Evaluation of Skills[7]" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
                <label for="input_14_7_1" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_7_2" class="form-radio" name="q14_Evaluation of Skills[7]" value="Average" aria-labelledby="label_14_col_2" />
                <label for="input_14_7_2" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_7_3" class="form-radio" name="q14_Evaluation of Skills[7]" value="Satisfactory" aria-labelledby="label_14_col_3" />
                <label for="input_14_7_3" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
              <td class="form-matrix-values">
                <input type="radio" id="input_14_7_4" class="form-radio" name="q14_Evaluation of Skills[7]" value="Excellent" aria-labelledby="label_14_col_4" />
                <label for="input_14_7_4" class="matrix-choice-label matrix-radio-label">  </label>
              </td>
            </tr>
          </table>

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
