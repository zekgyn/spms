<?php
$conn = mysqli_connect("localhost","root","12345","test");
// Check connection
if (mysqli_connect_error())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
