
<?php

session_start();

?>
<HTML>
<HEAD>
<TITLE>Welcome</TITLE>
<link href="phppot-style.css" type="text/css" rel="stylesheet" />
<link href="user-registration.css" type="text/css" rel="stylesheet" />
</HEAD>

<BODY>
	<div class="phppot-container">
		<div class="page-header">
			<span class="login-signup"><a href="logout.php">Logout</a></span>
		</div>
		<div class="page-content">
			<?php
			if (isset($_SESSION['user_name'])) {
				echo "Welcome".' '.$_SESSION['user_name']."<br>";
			}
			else {

				header('location:index.php');
			}
		?>
		<form class="" action="" method="post">
<br>
<input type="text" name="message" class="input-box-330" placeholder="Type your Message here..." style="width:400px; height:50;"><br>
<input type="submit" name="newmessage" class="sign-up-btn" id="login-btn" value="Send" style="width:200px;">
		</form>
		<?php
		require_once('connection.php');
			if (isset($_POST['newmessage'])) {
				$message=$_POST['message'];

$today=Date('Y-m-d');
				$query = "INSERT INTO `chat` (`Username`, `Message`,`Date`)
VALUES ('".$_SESSION['user_name']."', '".$message."','".$today."')";

if(mysqli_query($con,$query)){
	//echo $_SESSION['user_name'].'<br>';
	//echo $message;

?>

<div class="viewmessage" style="text-align: left; float:left;">

	<?php


	$query2= "SELECT * FROM `chat` ORDER BY `Msg_ID` DESC";
	$run= mysqli_query($con,$query2);
	while ($row = mysqli_fetch_assoc($run)) {
		$message=$row['Message'];
		$username=$row['Username'];
		$today=$row['Date'];
		echo '<h4 style="color: red;">'.$username.' '.'<font color="#ffb932">'.$today.'</font>'.'</h4>';
		echo '<p>'.$message.' '.' '.' '.'</p>'.'<hr>';
	}
}

}
?>
</div>

	</div>
	</div>
</BODY>
</HTML>
