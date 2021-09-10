<?php
//include 'conn.php';
session_start();

//echo $_SESSION['name'];
if(!$_SESSION['email'])
{
header("location:index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="css/bootstrap.min.css" rel="stylesheet">

<script src="js/bootstrap.min.js"></script>

<script src="js/bootstrap.bundle.min.js"></script>

</head>
<body>

<div class="container">
	<div class="col-lg-12"><br>
		<div class="row">
		<h3 class="col-lg-6">Displaying Records</h3>
        <a href="insert.php" class="col-lg-3"><button class="btn btn-success col-lg-3">Add</button></a> <a href="logout.php" class="col-lg-3"><button class="btn btn-success col-lg-3" name="logout">logout</button></a>
    </div><br>
		<table class="table table-stripped table-hover table-bordered">
			<tr class="text-dark">
				<th><h5>ID</h5></th>
				<th><h5>Name</h5></th>
				<th><h5>Age</h5></th>
				<th><h5>Salary</h5></th>
				<th><h5>Qualification</h5></th>
				<th><h5>Date of Birth</h5></th>
				<th><h5>Date of Join</h5></th>
			</tr>


			<?php
include 'conn.php';


$q="select * from employee";

$query = mysqli_query($conn,$q);

while ($res = mysqli_fetch_assoc($query)) {
?>

			<tr>
				<th><?php echo $res['id'] ?></th>
				<th><?php echo $res['name'] ?></th>
				<th><?php echo $res['age'] ?></th>
				<th><?php echo $res['salary'] ?></th>
				<th><?php echo $res['qualification'] ?></th>
				<th><?php echo $res['date_of_birth'] ?></th>
				<th><?php echo $res['date_of_join'] ?></th>
				<th><a  href="update.php?id=<?php echo $res['id']; ?>" class="text-white"><button class="btn btn-success">View</button></a></th>
			</tr>
<?php }
?>

		</table>
	</div>
</div>
</body>
</html>
