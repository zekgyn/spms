<?php
if (isset($_POST['submit'])) {
      $fname=$_POST['firstname'];
      $lname=$_POST['lastname'];
      $email=$_POST['email'];
      $password=$_POST['password'];
      $dob=$_POST['birthday'];
      $address=$_POST['address'];
      $country=$_POST['country'];
      $region=$_POST['region'];
      $gender=$_POST['gender'];

      // We need to check if the account with that username exists.
      $stmt = mysqli_stmt_init($conn);
      if (mysqli_stmt_prepare($stmt, 'SELECT emp_email, emp_password FROM employees WHERE emp_fname = ? OR emp_lname = ? OR emp_email = ?')) {
      	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
      	mysqli_stmt_bind_param($stmt,'sss', $fname,$lname,$email);
      	mysqli_stmt_execute($stmt);
      	$result = mysqli_stmt_store_result($stmt);
      	// Store the result so we can check if the account exists in the database.
      	if (mysqli_num_rows($stmt,$result) > 0) {
      		// Username already exists
      		echo 'Employee with that email already exists, please choose another!';
      	}
        else {

                  $sql="INSERT INTO `employees` (`emp_fname`, `emp_lname`, `emp_gender`, `emp_dob`, `emp_email`, `emp_password`, `emp_address`, `emp_country`, `emp_region`)VALUES ($fname, $lname, $gender, $dob, $email, MD5($password), $address, $country, $region)";
                  if ($query=mysqli_query($conn,$sql)) {
                    echo '<div class="alert alert-success alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Good news!</strong> User added successfully.
                          </div>';
                  }
                  else {
                    echo '<div class="alert alert-danger alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Danger!</strong> Failed to add Employee.
                          </div>';
                  }
      	}
      	mysqli_stmt_close($stmt);
      } else {
      	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        echo '<div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Danger!</strong> Could not prepare statement!
              </div>';
      }
      mysqli_close($conn);
}

 ?>
