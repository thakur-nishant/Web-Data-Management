<!DOCTYPE html>
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

	$validation = True;
	if($_POST['password'] == ""){
		$p_error = "<i style='color: red;'>Required!<i>";
		$validation = False;
	}
	if($_POST['email'] != ""){
		$email = $_POST['email'];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $em_error = "<i style='color: red;'>Invalid email format</i> "; 
		  $validation = False;
		}			
	}
	else {
		$em_error = "<i style='color: red;'>Required!<i>";
		$validation = False;
	}
	if ($validation){
		$sql = "SELECT userid, roleid, email FROM users WHERE email='".$_POST['email']."' AND password='".$_POST['password']."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$sql = "SELECT fname, lname from clients where userid='".$row['userid']."';";
			$result = $conn->query($sql);
			$row1 = $result->fetch_assoc();

			// set the session variables
			$_SESSION['roleid'] = $row['roleid'];
			$_SESSION['userid'] = $row['userid'];
			$_SESSION['fname'] = $row1['fname'];
			$_SESSION['lname'] = $row1['lname'];
			$_SESSION['email'] = $row['email'];

			if ($row['roleid'] == 1){

				header('Location: /Thakur_petstore/Client_login.php');
			}
			else {
				header('Location: /Thakur_petstore/Business_login.php');
			}
		}
		else{
			$message = "E-mail or password did not match. Please try again!";
		}
	}
	$conn->close();
}

?>
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
			<p><a href="index.php">Home</a></p>
			<p><a href="AboutUs.php">About Us</a></p>
			<p><a href="ContactUs.php">Contact Us</a></p>
			<p><a href="Client.php">Client</a></p>
			<p><a href="Service.php">Service</a></p>
			<p><a href="Login.php">Login</a></p>
		</nav>
		<div id = "main-content">
			<img src="petstorebanner5.png">
			<section id = "main-section">
				
				<h2>Login</h2>
				<?php
					if(!(isset($em_error)) or !(isset($p_error)))
						echo "<i style='color: red;'>".$message."</i>";
				?>
				<p>Required information is marked with an asterisk (*)</p>
				<br>
				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" >
					<table id="form_table">
						<tr>
							<td> * E-mail: </td>
							<td>
								<input type="email" name="email" required>
								<?php if (isset($em_error)) echo $em_error; ?>
							</td>
						</tr>
						<tr>
							<td> * Password: </td>
							<td>
								<input type="password" name="password" required>
								<?php if (isset($p_error)) echo $p_error; ?>
							</td>
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
