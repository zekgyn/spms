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
      <div class="d-flex justify-content-center flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 border-bottom">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap pt-3 pb-2 mb-3">
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

      <div class="d-flex justify-content-center flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 border-bottom">
            <h4><b>Employee Evaluation</b></h4>
      </div>



      <div class="alert alert-info">
       <span>
       <strong>Instructions:</strong><br>
      <i>Search for a user to start evaluating them.</i>
      </span>
       </div>


                  <!-- Eval Start-->
                  <hr class="mb-4">
                           <div class="container-fluid"><!--d-flex justify-content-center col-md-8 order-md-1 -->
                             <div class="d-flex justify-content-center flex-wrap flex-md-nowrap mb-3 border-bottom">
                                   <h5><strong>General Information</strong></h5>
                             </div>
                             <?php
                              $emp_id = $_GET['id'];
                               $sql="SELECT * FROM employees WHERE emp_id=$emp_id";
                               $query=mysqli_query($conn,$sql);

                             $row = mysqli_fetch_array($query);

                                     $emp_fname = $row[1];
                                     $emp_lname = $row[2];
                                     $emp_depat = $row[11];
                            ?>

                   <div class="d-flex justify-content-center">
                         <h4 class="mb-3"></h4>
                         <form class="needs-validation" action="" method="post" >
                           <!-- General info Start-->
<!--Start -->
                           <div class="row">

                             <div class="col-md-6 mb-3">
                               <label for="firstName">First name</label>
                               <input type="text" class="form-control" id="firstName" name="firstname" placeholder="Firsname" value="<?php echo $emp_fname; ?>" disabled required data-error="Please enter your full name.">
                               <div class="invalid-feedback">
                                 First name is required.
                               </div>
                             </div>
                             <div class="col-md-6 mb-3">
                               <label for="lastName">Last name</label>
                               <input type="text" class="form-control" id="lastName" name="lastname" placeholder="Lastname" value="<?php echo $emp_lname; ?>" disabled required>
                               <div class="invalid-feedback">
                                 Last name is required.
                               </div>
                             </div>
                           </div>


<!--End-->

<!--Start -->

                             <div class="mb-3">
                               <label for="department">Department</label>
                               <input type="text" class="form-control" id="department" name="department" placeholder="Department" value="<?php echo $emp_depat; ?>" disabled required>
                             </div>


<!--End-->

<!--Start -->
                            <div class="mb-3">
                              <div class="row">
                                <div class="col-md-6 mb-3">
                                  <label for="firstName">Start Date</label>
                                  <input type='date' name="startdate" class="form-control" required/>
                                  <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                                  <div class="invalid-feedback">
                                  </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                  <label for="lastName">End Date</label>
                                  <input type='date' name="enddate" class="form-control" required/>
                                  <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                                </div>
                              </div>
                            </div>
<!--End-->


                </div>
                <!-- General Info End-->

      <!-- <div class="container-fluid">
         ...
       </div>-->
         <hr class="mb-4">
                  <div class="container-fluid"><!--d-flex justify-content-center col-md-8 order-md-1 -->
                    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap mb-3 border-bottom">
                          <h5><strong>Productivity</strong></h5>
                    </div>

<!--Start Table-->
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
                  <label id="label_14_col_4"> Exceptional </label>
                </th>
              </tr>
              <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_0">
                <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                  <label id="label_14_row_0"> Makes realistic goals </label>
                </th>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_0_0" class="form-radio" name="proskill1" value="Very Poor" aria-labelledby="label_14_col_0" />
                  <label for="input_14_0_0" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_0_1" class="form-radio" name="proskill1" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
                  <label for="input_14_0_1" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_0_2" class="form-radio" name="proskill1" value="Average" aria-labelledby="label_14_col_2" />
                  <label for="input_14_0_2" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_0_3" class="form-radio" name="proskill1" value="Satisfactory" aria-labelledby="label_14_col_3" />
                  <label for="input_14_0_3" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_0_4" class="form-radio" name="proskill1" value="Exceptional" aria-labelledby="label_14_col_4" />
                  <label for="input_14_0_4" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
              </tr>
              <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_1">
                <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                  <label id="label_14_row_1"> Meets dealines </label>
                </th>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_1_0" class="form-radio" name="proskill2" value="Very Poor" aria-labelledby="label_14_col_0" />
                  <label for="input_14_1_0" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_1_1" class="form-radio" name="proskill2" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
                  <label for="input_14_1_1" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_1_2" class="form-radio" name="proskill2" value="Average" aria-labelledby="label_14_col_2" />
                  <label for="input_14_1_2" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_1_3" class="form-radio" name="proskill2" value="Satisfactory" aria-labelledby="label_14_col_3" />
                  <label for="input_14_1_3" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_1_4" class="form-radio" name="proskill2" value="Exceptional" aria-labelledby="label_14_col_4" />
                  <label for="input_14_1_4" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
              </tr>
              <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_2">
                <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                  <label id="label_14_row_2"> Works smarter not harder </label>
                </th>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_2_0" class="form-radio" name="proskill3" value="Very Poor" aria-labelledby="label_14_col_0" />
                  <label for="input_14_2_0" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_2_1" class="form-radio" name="proskill3" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
                  <label for="input_14_2_1" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_2_2" class="form-radio" name="proskill3" value="Average" aria-labelledby="label_14_col_2" />
                  <label for="input_14_2_2" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_2_3" class="form-radio" name="proskill3" value="Satisfactory" aria-labelledby="label_14_col_3" />
                  <label for="input_14_2_3" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_2_4" class="form-radio" name="proskill3" value="Exceptional" aria-labelledby="label_14_col_4" />
                  <label for="input_14_2_4" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
              </tr>
              <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_3">
                <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                  <label id="label_14_row_3"> Looks for efficiency </label>
                </th>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_3_0" class="form-radio" name="proskill4" value="Very Poor" aria-labelledby="label_14_col_0" />
                  <label for="input_14_3_0" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_3_1" class="form-radio" name="proskill4" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
                  <label for="input_14_3_1" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_3_2" class="form-radio" name="proskill4" value="Average" aria-labelledby="label_14_col_2" />
                  <label for="input_14_3_2" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_3_3" class="form-radio" name="proskill4" value="Satisfactory" aria-labelledby="label_14_col_3" />
                  <label for="input_14_3_3" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_3_4" class="form-radio" name="proskill4" value="Exceptional" aria-labelledby="label_14_col_4" />
                  <label for="input_14_3_4" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
              </tr>
              <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_4">
                <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                  <label id="label_14_row_4"> Completes tasks </label>
                </th>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_4_0" class="form-radio" name="proskill5" value="Very Poor" aria-labelledby="label_14_col_0" />
                  <label for="input_14_4_0" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_4_1" class="form-radio" name="proskill5" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
                  <label for="input_14_4_1" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_4_2" class="form-radio" name="proskill5" value="Average" aria-labelledby="label_14_col_2" />
                  <label for="input_14_4_2" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_4_3" class="form-radio" name="proskill5" value="Satisfactory" aria-labelledby="label_14_col_3" />
                  <label for="input_14_4_3" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_4_4" class="form-radio" name="proskill5" value="Exceptional" aria-labelledby="label_14_col_4" />
                  <label for="input_14_4_4" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
              </tr>
              <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_5">
                <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                  <label id="label_14_row_5"> Shows good judgement </label>
                </th>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_5_0" class="form-radio" name="proskill6" value="Very Poor" aria-labelledby="label_14_col_0" />
                  <label for="input_14_5_0" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_5_1" class="form-radio" name="proskill6" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
                  <label for="input_14_5_1" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_5_2" class="form-radio" name="proskill6" value="Average" aria-labelledby="label_14_col_2" />
                  <label for="input_14_5_2" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_5_3" class="form-radio" name="proskill6" value="Satisfactory" aria-labelledby="label_14_col_3" />
                  <label for="input_14_5_3" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
                <td class="form-matrix-values">
                  <input type="radio" id="input_14_5_4" class="form-radio" name="proskill6" value="Exceptional" aria-labelledby="label_14_col_4" />
                  <label for="input_14_5_4" class="matrix-choice-label matrix-radio-label">  </label>
                </td>
              </tr>
            </table>
  <!--End Table-->

  <hr class="mb-4">
           <div class="container-fluid"><!--d-flex justify-content-center col-md-8 order-md-1 -->
             <div class="d-flex justify-content-center flex-wrap flex-md-nowrap mb-3 border-bottom">
                   <h5><strong>Communication</strong></h5>
             </div>

<!--Start Table-->
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
           <label id="label_14_col_4"> Exceptional </label>
         </th>
       </tr>
       <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_0">
         <th scope="row" class="form-matrix-headers form-matrix-row-headers">
           <label id="label_14_row_0"> Process received information </label>
         </th>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_0_0" class="form-radio" name="commskill1" value="Very Poor" aria-labelledby="label_14_col_0" />
           <label for="input_14_0_0" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_0_1" class="form-radio" name="commskill1" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
           <label for="input_14_0_1" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_0_2" class="form-radio" name="commskill1" value="Average" aria-labelledby="label_14_col_2" />
           <label for="input_14_0_2" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_0_3" class="form-radio" name="commskill1" value="Satisfactory" aria-labelledby="label_14_col_3" />
           <label for="input_14_0_3" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_0_4" class="form-radio" name="commskill1" value="Exceptional" aria-labelledby="label_14_col_4" />
           <label for="input_14_0_4" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
       </tr>
       <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_1">
         <th scope="row" class="form-matrix-headers form-matrix-row-headers">
           <label id="label_14_row_1"> Listens to others </label>
         </th>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_1_0" class="form-radio" name="commskill2" value="Very Poor" aria-labelledby="label_14_col_0" />
           <label for="input_14_1_0" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_1_1" class="form-radio" name="commskill2" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
           <label for="input_14_1_1" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_1_2" class="form-radio" name="commskill2" value="Average" aria-labelledby="label_14_col_2" />
           <label for="input_14_1_2" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_1_3" class="form-radio" name="commskill2" value="Satisfactory" aria-labelledby="label_14_col_3" />
           <label for="input_14_1_3" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_1_4" class="form-radio" name="commskill2" value="Exceptional" aria-labelledby="label_14_col_4" />
           <label for="input_14_1_4" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
       </tr>

       <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_2">
         <th scope="row" class="form-matrix-headers form-matrix-row-headers">
           <label id="label_14_row_2"> Communicates effectively </label>
         </th>
         <td class="form-matrix-values" colspan="5">

         </td>

       </tr>

       <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_3">
         <td scope="row" class="form-matrix-headers form-matrix-row-headers">
           <label id="label_14_row_3"> Verbal communications </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_3_0" class="form-radio" name="commskill3" value="Very Poor" aria-labelledby="label_14_col_0" />
           <label for="input_14_3_0" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_3_1" class="form-radio" name="commskill3" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
           <label for="input_14_3_1" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_3_2" class="form-radio" name="commskill3" value="Average" aria-labelledby="label_14_col_2" />
           <label for="input_14_3_2" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_3_3" class="form-radio" name="commskill3" value="Satisfactory" aria-labelledby="label_14_col_3" />
           <label for="input_14_3_3" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_3_4" class="form-radio" name="commskill3" value="Exceptional" aria-labelledby="label_14_col_4" />
           <label for="input_14_3_4" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
       </tr>
       <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_4">
         <td scope="row" class="form-matrix-headers form-matrix-row-headers">
           <label id="label_14_row_4"> Written communication <br> ie.reports, documents etc </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_4_0" class="form-radio" name="commskill4" value="Very Poor" aria-labelledby="label_14_col_0" />
           <label for="input_14_4_0" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_4_1" class="form-radio" name="commskill4" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
           <label for="input_14_4_1" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_4_2" class="form-radio" name="commskill4" value="Average" aria-labelledby="label_14_col_2" />
           <label for="input_14_4_2" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_4_3" class="form-radio" name="commskill4" value="Satisfactory" aria-labelledby="label_14_col_3" />
           <label for="input_14_4_3" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_4_4" class="form-radio" name="commskill4" value="Exceptional" aria-labelledby="label_14_col_4" />
           <label for="input_14_4_4" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
       </tr>
       <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_5">
         <th scope="row" class="form-matrix-headers form-matrix-row-headers">
           <label id="label_14_row_5"> Collaboration and Teamwork </label>
         </th>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_5_0" class="form-radio" name="commskill5" value="Very Poor" aria-labelledby="label_14_col_0" />
           <label for="input_14_5_0" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_5_1" class="form-radio" name="commskill5" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
           <label for="input_14_5_1" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_5_2" class="form-radio" name="commskill5" value="Average" aria-labelledby="label_14_col_2" />
           <label for="input_14_5_2" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_5_3" class="form-radio" name="commskill5" value="Satisfactory" aria-labelledby="label_14_col_3" />
           <label for="input_14_5_3" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_5_4" class="form-radio" name="commskill5" value="Exceptional" aria-labelledby="label_14_col_4" />
           <label for="input_14_5_4" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
       </tr>
       <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_6">
         <th scope="row" class="form-matrix-headers form-matrix-row-headers">
           <label id="label_14_row_6"> E-mail etiquette </label>
         </th>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_6_0" class="form-radio" name="commskill6" value="Very Poor" aria-labelledby="label_14_col_0" />
           <label for="input_14_6_0" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_6_1" class="form-radio" name="commskill6" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
           <label for="input_14_6_1" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_6_2" class="form-radio" name="commskill6" value="Average" aria-labelledby="label_14_col_2" />
           <label for="input_14_6_2" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_6_3" class="form-radio" name="commskill6" value="Satisfactory" aria-labelledby="label_14_col_3" />
           <label for="input_14_6_3" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_6_4" class="form-radio" name="commskill6" value="Exceptional" aria-labelledby="label_14_col_4" />
           <label for="input_14_6_4" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
       </tr>
       <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_7">
         <th scope="row" class="form-matrix-headers form-matrix-row-headers">
           <label id="label_14_row_7"> Telephone etiquette </label>
         </th>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_7_0" class="form-radio" name="commskill7" value="Very Poor" aria-labelledby="label_14_col_0" />
           <label for="input_14_7_0" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_7_1" class="form-radio" name="commskill7" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
           <label for="input_14_7_1" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_7_2" class="form-radio" name="commskill7" value="Average" aria-labelledby="label_14_col_2" />
           <label for="input_14_7_2" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_7_3" class="form-radio" name="commskill7" value="Satisfactory" aria-labelledby="label_14_col_3" />
           <label for="input_14_7_3" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
         <td class="form-matrix-values">
           <input type="radio" id="input_14_7_4" class="form-radio" name="commskill7" value="Exceptional" aria-labelledby="label_14_col_4" />
           <label for="input_14_7_4" class="matrix-choice-label matrix-radio-label">  </label>
         </td>
       </tr>
     </table>
<!--End Table-->

<hr class="mb-4">
         <div class="container-fluid"><!--d-flex justify-content-center col-md-8 order-md-1 -->
           <div class="d-flex justify-content-center flex-wrap flex-md-nowrap mb-3 border-bottom">
                 <h5><strong>Leadership</strong></h5>
           </div>

<!--Start Table-->
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
         <label id="label_14_col_4"> Exceptional </label>
       </th>
     </tr>
     <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_0">
       <th scope="row" class="form-matrix-headers form-matrix-row-headers">
         <label id="label_14_row_0"> Leads by example </label>
       </th>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_0_0" class="form-radio" name="leadskill1" value="Very Poor" aria-labelledby="label_14_col_0" />
         <label for="input_14_0_0" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_0_1" class="form-radio" name="leadskill1" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
         <label for="input_14_0_1" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_0_2" class="form-radio" name="leadskill1" value="Average" aria-labelledby="label_14_col_2" />
         <label for="input_14_0_2" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_0_3" class="form-radio" name="leadskill1" value="Satisfactory" aria-labelledby="label_14_col_3" />
         <label for="input_14_0_3" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_0_4" class="form-radio" name="leadskill1" value="Exceptional" aria-labelledby="label_14_col_4" />
         <label for="input_14_0_4" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
     </tr>
     <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_1">
       <th scope="row" class="form-matrix-headers form-matrix-row-headers">
         <label id="label_14_row_1"> Finds realistic solution </label>
       </th>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_1_0" class="form-radio" name="leadskill2" value="Very Poor" aria-labelledby="label_14_col_0" />
         <label for="input_14_1_0" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_1_1" class="form-radio" name="leadskill2" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
         <label for="input_14_1_1" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_1_2" class="form-radio" name="leadskill2" value="Average" aria-labelledby="label_14_col_2" />
         <label for="input_14_1_2" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_1_3" class="form-radio" name="leadskill2" value="Satisfactory" aria-labelledby="label_14_col_3" />
         <label for="input_14_1_3" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_1_4" class="form-radio" name="leadskill2" value="Exceptional" aria-labelledby="label_14_col_4" />
         <label for="input_14_1_4" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
     </tr>
     <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_2">
       <th scope="row" class="form-matrix-headers form-matrix-row-headers">
         <label id="label_14_row_2"> Acts decisively; meets problem head-on </label>
       </th>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_2_0" class="form-radio" name="leadskill3" value="Very Poor" aria-labelledby="label_14_col_0" />
         <label for="input_14_2_0" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_2_1" class="form-radio" name="leadskill3" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
         <label for="input_14_2_1" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_2_2" class="form-radio" name="leadskill3" value="Average" aria-labelledby="label_14_col_2" />
         <label for="input_14_2_2" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_2_3" class="form-radio" name="leadskill3" value="Satisfactory" aria-labelledby="label_14_col_3" />
         <label for="input_14_2_3" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_2_4" class="form-radio" name="leadskill3" value="Exceptional" aria-labelledby="label_14_col_4" />
         <label for="input_14_2_4" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
     </tr>
     <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_3">
       <th scope="row" class="form-matrix-headers form-matrix-row-headers">
         <label id="label_14_row_3"> Brings out the best in team members </label>
       </th>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_3_0" class="form-radio" name="leadskill4" value="Very Poor" aria-labelledby="label_14_col_0" />
         <label for="input_14_3_0" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_3_1" class="form-radio" name="leadskill4" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
         <label for="input_14_3_1" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_3_2" class="form-radio" name="leadskill4" value="Average" aria-labelledby="label_14_col_2" />
         <label for="input_14_3_2" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_3_3" class="form-radio" name="leadskill4" value="Satisfactory" aria-labelledby="label_14_col_3" />
         <label for="input_14_3_3" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_3_4" class="form-radio" name="leadskill4" value="Exceptional" aria-labelledby="label_14_col_4" />
         <label for="input_14_3_4" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
     </tr>
     <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_4">
       <th scope="row" class="form-matrix-headers form-matrix-row-headers">
         <label id="label_14_row_4"> Resolves conflicts </label>
       </th>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_4_0" class="form-radio" name="leadskill5" value="Very Poor" aria-labelledby="label_14_col_0" />
         <label for="input_14_4_0" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_4_1" class="form-radio" name="leadskill5" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
         <label for="input_14_4_1" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_4_2" class="form-radio" name="leadskill5" value="Average" aria-labelledby="label_14_col_2" />
         <label for="input_14_4_2" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_4_3" class="form-radio" name="leadskill5" value="Satisfactory" aria-labelledby="label_14_col_3" />
         <label for="input_14_4_3" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_4_4" class="form-radio" name="leadskill5" value="Exceptional" aria-labelledby="label_14_col_4" />
         <label for="input_14_4_4" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
     </tr>
     <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_5">
       <th scope="row" class="form-matrix-headers form-matrix-row-headers">
         <label id="label_14_row_5"> Establishes clear expectations </label>
       </th>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_5_0" class="form-radio" name="leadskill6" value="Very Poor" aria-labelledby="label_14_col_0" />
         <label for="input_14_5_0" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_5_1" class="form-radio" name="leadskill6" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
         <label for="input_14_5_1" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_5_2" class="form-radio" name="leadskill6" value="Average" aria-labelledby="label_14_col_2" />
         <label for="input_14_5_2" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_5_3" class="form-radio" name="leadskill6" value="Satisfactory" aria-labelledby="label_14_col_3" />
         <label for="input_14_5_3" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_5_4" class="form-radio" name="leadskill6" value="Exceptional" aria-labelledby="label_14_col_4" />
         <label for="input_14_5_4" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
     </tr>
     <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_6">
       <th scope="row" class="form-matrix-headers form-matrix-row-headers">
         <label id="label_14_row_6"> Provides necessary resources </label>
       </th>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_6_0" class="form-radio" name="leadskill7" value="Very Poor" aria-labelledby="label_14_col_0" />
         <label for="input_14_6_0" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_6_1" class="form-radio" name="leadskill7" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
         <label for="input_14_6_1" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_6_2" class="form-radio" name="leadskill7" value="Average" aria-labelledby="label_14_col_2" />
         <label for="input_14_6_2" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_6_3" class="form-radio" name="leadskill7" value="Satisfactory" aria-labelledby="label_14_col_3" />
         <label for="input_14_6_3" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_6_4" class="form-radio" name="leadskill7" value="Exceptional" aria-labelledby="label_14_col_4" />
         <label for="input_14_6_4" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
     </tr>
     <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_7">
       <th scope="row" class="form-matrix-headers form-matrix-row-headers">
         <label id="label_14_row_7"> Delegates clearly </label>
       </th>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_7_0" class="form-radio" name="leadskill8" value="Very Poor" aria-labelledby="label_14_col_0" />
         <label for="input_14_7_0" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_7_1" class="form-radio" name="leadskill8" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
         <label for="input_14_7_1" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_7_2" class="form-radio" name="leadskill8" value="Average" aria-labelledby="label_14_col_2" />
         <label for="input_14_7_2" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_7_3" class="form-radio" name="leadskill8" value="Satisfactory" aria-labelledby="label_14_col_3" />
         <label for="input_14_7_3" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_7_4" class="form-radio" name="leadskill8" value="Exceptional" aria-labelledby="label_14_col_4" />
         <label for="input_14_7_4" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
     </tr>
   </table>
<!--End Table-->

<hr class="mb-4">
         <div class="container-fluid"><!--d-flex justify-content-center col-md-8 order-md-1 -->
           <div class="d-flex justify-content-center flex-wrap flex-md-nowrap mb-3 border-bottom">
                 <h5><strong>Personal Development</strong></h5>
           </div>

<!--Start Table-->
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
         <label id="label_14_col_4"> Exceptional </label>
       </th>
     </tr>
     <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_0">
       <th scope="row" class="form-matrix-headers form-matrix-row-headers">
         <label id="label_14_row_0"> Even-tempred under pressure </label>
       </th>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_0_0" class="form-radio" name="perskill1" value="Very Poor" aria-labelledby="label_14_col_0" />
         <label for="input_14_0_0" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_0_1" class="form-radio" name="perskill1" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
         <label for="input_14_0_1" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_0_2" class="form-radio" name="perskill1" value="Average" aria-labelledby="label_14_col_2" />
         <label for="input_14_0_2" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_0_3" class="form-radio" name="perskill1" value="Satisfactory" aria-labelledby="label_14_col_3" />
         <label for="input_14_0_3" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_0_4" class="form-radio" name="perskill1" value="Exceptional" aria-labelledby="label_14_col_4" />
         <label for="input_14_0_4" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
     </tr>
     <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_1">
       <th scope="row" class="form-matrix-headers form-matrix-row-headers">
         <label id="label_14_row_1"> Sets high standard for self </label>
       </th>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_1_0" class="form-radio" name="perskill2" value="Very Poor" aria-labelledby="label_14_col_0" />
         <label for="input_14_1_0" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_1_1" class="form-radio" name="perskill2" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
         <label for="input_14_1_1" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_1_2" class="form-radio" name="perskill2" value="Average" aria-labelledby="label_14_col_2" />
         <label for="input_14_1_2" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_1_3" class="form-radio" name="perskill2" value="Satisfactory" aria-labelledby="label_14_col_3" />
         <label for="input_14_1_3" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_1_4" class="form-radio" name="perskill2" value="Exceptional" aria-labelledby="label_14_col_4" />
         <label for="input_14_1_4" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
     </tr>
     <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_2">
       <th scope="row" class="form-matrix-headers form-matrix-row-headers">
         <label id="label_14_row_2"> Attitude </label>
       </th>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_2_0" class="form-radio" name="perskill3" value="Very Poor" aria-labelledby="label_14_col_0" />
         <label for="input_14_2_0" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_2_1" class="form-radio" name="perskill3" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
         <label for="input_14_2_1" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_2_2" class="form-radio" name="perskill3" value="Average" aria-labelledby="label_14_col_2" />
         <label for="input_14_2_2" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_2_3" class="form-radio" name="perskill3" value="Satisfactory" aria-labelledby="label_14_col_3" />
         <label for="input_14_2_3" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_2_4" class="form-radio" name="perskill3" value="Exceptional" aria-labelledby="label_14_col_4" />
         <label for="input_14_2_4" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
     </tr>
     <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_14 label_14_row_3">
       <th scope="row" class="form-matrix-headers form-matrix-row-headers">
         <label id="label_14_row_3"> Sets challenging goals </label>
       </th>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_3_0" class="form-radio" name="perskill4" value="Very Poor" aria-labelledby="label_14_col_0" />
         <label for="input_14_3_0" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_3_1" class="form-radio" name="perskill4" value="Not Satisfactory" aria-labelledby="label_14_col_1" />
         <label for="input_14_3_1" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_3_2" class="form-radio" name="perskill4" value="Average" aria-labelledby="label_14_col_2" />
         <label for="input_14_3_2" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_3_3" class="form-radio" name="perskill4" value="Satisfactory" aria-labelledby="label_14_col_3" />
         <label for="input_14_3_3" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
       <td class="form-matrix-values">
         <input type="radio" id="input_14_3_4" class="form-radio" name="perskill4" value="Exceptional" aria-labelledby="label_14_col_4" />
         <label for="input_14_3_4" class="matrix-choice-label matrix-radio-label">  </label>
       </td>
     </tr>


   </table>
<!--End Table-->


<!--Start Submit-->
            <hr class="mb-4">
                <div class="container">
                  <div class="d-flex justify-content-center flex-wrap flex-md-nowrap mb-3 border-bottom">
                    <button class="btn btn-success btn-block" type="submit" name="submit">Submit Evaluation</button>
                  </div>

                </div>
<!--End Submit-->

      </form>

<!--Form Processing Start-->
             <?php
             if (isset($_POST['submit'])) {

               $startdate=$_POST['startdate'];
               $enddate=$_POST['enddate'];

               $proskill1=$_POST['proskill1'];
               $proskill2=$_POST['proskill2'];
               $proskill3=$_POST['proskill3'];
               $proskill4=$_POST['proskill4'];
               $proskill5=$_POST['proskill5'];
               $proskill6=$_POST['proskill6'];
               $proskill7=$_POST['proskill7'];

               $commskill1=$_POST['commskill1'];
               $commskill2=$_POST['commskill2'];
               $commskill3=$_POST['commskill3'];
               $commskill4=$_POST['commskill4'];
               $commskill5=$_POST['commskill5'];
               $commskill6=$_POST['commskill6'];
               $commskill7=$_POST['commskill7'];

               $leadskill1=$_POST['leadskill1'];
               $leadskill2=$_POST['leadskill2'];
               $leadskill3=$_POST['leadskill3'];
               $leadskill4=$_POST['leadskill4'];
               $leadskill5=$_POST['leadskill5'];
               $leadskill6=$_POST['leadskill6'];
               $leadskill7=$_POST['leadskill7'];
               $leadskill8=$_POST['leadskill8'];

               $perskill1=$_POST['perskill1'];
               $perskill2=$_POST['perskill2'];
               $perskill3=$_POST['perskill3'];
               $perskill4=$_POST['perskill4'];
               $fname=$_POST['firstname'];
               $lname=$_POST['lastname'];


               $sql="INSERT INTO `employees` (`emp_fname`, `emp_lname`, `emp_gender`, `emp_dob`, `emp_email`, `emp_password`, `emp_address`, `emp_country`, `emp_region`)VALUES ($fname, $lname, $gender, $dob, $email, MD5($password), $address, $country, $region)";
               if ($query=mysqli_query($conn,$sql)) {
                 echo "Successfully added new Employee";
             }

               }

              ?>
<!--End Form Processing-->



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
