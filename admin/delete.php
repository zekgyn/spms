<?php
session_start();
//Check if user is logged in
if(!isset($_SESSION['email']) || $_SESSION['email'] !=true) {
header("location:index.php?action=login&message=You are not Logged In");
exit();
}
include("inc/connect.php");

$id = $_GET['id'];
//echo $id;
$sql = "DELETE FROM employees WHERE emp_id = '$id' ";

if (mysqli_query($conn,$sql)) {
  header("location:dashboard.php");
}
else {
  echo mysqli_error($conn);
}
?>
