<?php
session_start();

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pet";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	if ($_POST['password'] == $_POST['cpassword']) {
		$sql = "UPDATE users SET password = '".$_POST['password']."' WHERE userid = ".$_SESSION['userid'].";";

		if ($conn->query($sql) === TRUE){
			$message = "Successfully changes the password!";
		}
	}
	else {
		$message = "Passwords did not match!";
	}
	// Update password
	
	$conn->close();

}
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<link rel="stylesheet" href="CSS/pet.css">
	<title>Pet Store</title>
</head>
<body id="wrapper">
	<header>
		<h1> Pet Store </h1>
	</header>
	<div id="container">
		<nav role="navigation">
			<?php
			if ($_SESSION['roleid'] == 1){
				echo "<p><a href='Client_login.php'>GO BACK</a></p>";

			} else {
				echo "<p><a href='Business_login.php'>GO BACK</a></p>";
			}
			?>
			<!-- <p><a href="Change_password.php">Change Password</a></p>
				<p><a href="Logout.php">Logout</a></p> -->
			</nav>
			<div id = "main-content">
				<img src="petstorebanner5.png">
				<section id = "main-section">

					<h2>Change Password</h2>
					<?php
					echo "<i style='color: red;'>".$message."</i>";
					?>
					<p>Required information is marked with an asterisk (*)</p>
					<br>
					<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
						<table id="form_table">
							<tr>
								<td> *New Password: </td>
								<td><input type="password" name="password" required></td>
							</tr>
							<tr>
								<td> *Confirm New Password: </td>
								<td><input type="password" name="cpassword" required></td>
							</tr>
						</table>
						<input type="submit" name="submit" value="Submit">
					</form>
				</section>

			</div>
			<footer>
				Copyright © 2018 Pet Store<br>
				<a href="mailto:nishant@thakur.com">nishant@thakur.com</a>
			</footer>
		</div>

	</body>
	</html>