<?php
include("inc/connect.php");

 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap <link href="css/custom.css" type="text/css" rel="stylesheet" />core CSS -->
		<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="css/dashboard.css" type="text/css" rel="stylesheet" />


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-4" href="#">SES ADMIN Dashboard</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!--<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <form class="form-inline my-2 my-lg-0">
        <input class="btn btn-outline-primary my-2 my-sm-0"  name="signout" type="submit" value="Sign Out"></input>
      </form>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-white sidebar collapse">
        <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column account-tab-stap">



          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              <h1>Dashboard</h1> <span class="sr-only">(current)</span>
            </a>
          </li>



          <li id="step1" class="active">
            <a class="btn btn-inline-primary btn-block" href="javascript:void(0)">
              <span data-feather="shopping-cart"></span>
              Employees
            </a>
          </li>
          <li id="step2">
            <a class="btn btn-inline-primary btn-block" href="javascript:void(0)">
              <span data-feather="users"></span>
              Add New Employees
            </a>
          </li>
          <li id="step3">
            <a class="btn btn-inline-primary btn-block" href="javascript:void(0)">
              <span data-feather="bar-chart-2"></span>
              Employee Report
            </a>
          </li>
          <li id="step4">
            <a class="btn btn-inline-primary btn-block" href="javascript:void(0)">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li>







        </ul>


      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
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
      <h2>List Of All Employees</h2>

      <div class="table-responsive">
        <?php
        echo '<table class="table table-striped table-sm">';

        echo '<thead>
          <tr>
            <th>Emp-ID</th>
              <th>Emp_Fname</th>
              <th>Emp_Lname</th>
              <th>Emp_Email</th>
              <th>DOB</th>
              </tr>
              </thead>
              <tbody>';

              while ($row = mysqli_fetch_array($query)) {
                $field1name = $row[0];
                $field2name = $row["emp_fname"];
                $field3name = $row["emp_lname"];
                $field4name = $row["emp_email"];
                $field5name = $row["emp_dob"];


                echo
                '<tr>
                <td>'.$field1name.'</td>
                <td>'.$field2name.'</td>
                <td>'.$field3name.'</td>
                <td>'.$field4name.'</td>
                <td>'.$field5name.'</td>
                </tr>';
              }
              echo '</tbody>

              </table>';

              ?>
      </div>
    </main>






<!-- Add an Employee-->
    <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" id="username" placeholder="Username" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" id="country" required>
                  <option value="">Choose...</option>
                  <option>United States</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select class="custom-select d-block w-100" id="state" required>
                  <option value="">Choose...</option>
                  <option>California</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="same-address">
              <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="save-info">
              <label class="custom-control-label" for="save-info">Save this information for next time</label>
            </div>
            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Credit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="debit">Debit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="paypal">PayPal</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-cvv">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
          </form>
        </div>
        <!-- Add Employee End-->
      </div>





  </div>

</div>
				<script src="bootstrap.min.js"></script>
				<script src="js/jquery-3.5.1.slim.min.js"></script>
				<script src="js/vendor/jquery.slim.min.js"></script>
				<script src="js/bootstrap.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script>
      </body>
</html>
