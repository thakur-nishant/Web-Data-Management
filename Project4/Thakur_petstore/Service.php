<!DOCTYPE html>
<?php

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

	if($_POST['fname'] != ""){
		$fname = $_POST['fname'];		
	}
	else {
		$fn_error = "<i style='color: red;'>Required!<i>";
		$validation = False;
	}
	if($_POST['lname'] != ""){
		$lname = $_POST['lname'];		
	}
	else {
		$ln_error = "<i style='color: red;'>Required!<i>";
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
	$phone = $_POST['phone'];
	$bname = $_POST['bname'];
	if($validation){
		$sql = "INSERT INTO users (email, password, roleid) VALUES (?, ?, ?)";

		// prepare and bind
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ssi", $email, $password, $roleid);

		// set parameters and execute
		$password = "1234567";
		$roleid = 2;
		$stmt->execute();

		// get id of the inserted user in users table
		$user_id = $conn->insert_id;

		// send email to user which is created
		$to = $email;
		$subject = "Pet Store: Your account password!";
		$txt = "Hello ".$fname.",\n\n Your account password is '1234567'.";
		$headers = "From: nishant@thakur.com" . "\r\n" .
		"CC: thakurnishantx6@gmail.com";

		mail($to,$subject,$txt,$headers);

		if ($_POST['bname'] != ""){
			// add business name 
			$sql = "INSERT INTO business (bname) VALUES (?)";
			// prepare and bind
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("s", $bname);
			// execute
			$stmt->execute();
		}

		// add client
		$sql = "INSERT INTO clients (fname, lname, phone, email, userid) VALUES (?, ?, ?, ?, ?)";

		// prepare and bind
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ssisi", $fname, $lname, $phone, $email, $user_id);

		// execute
		if($stmt->execute()){
			$message = "Business added Successful! Please check your mail for password to login to your account!";
		}
		else
			$message = "Error! Please try again.";
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
				
				<h2>Service</h2>
				<?php
					echo "<i style='color: red;'>".$message."</i>";
				?>
				<p>Required information is marked with an asterisk (*)</p>
				<br>
				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" >
					<table id="form_table">
						<tr>
							<td> * First Name: </td>
							<td>
								<input type="text" name="fname" required>
								<?php if (isset($fn_error)) echo $fn_error; ?>
							</td>
						</tr>
						<tr>
							<td> * Last Name: </td>
							<td>
								<input type="text" name="lname" required>
								<?php if (isset($ln_error)) echo $ln_error; ?>
							</td>
						</tr>
						<tr>
							<td> * E-mail: </td>
							<td>
								<input type="email" name="email" required>
								<?php if (isset($em_error)) echo $em_error; ?>
							</td>
						</tr>
						<tr>
							<td> Phone: </td>
							<td><input type="text" name="phone"></td>
						</tr>
						<tr>
							<td> Business Name: </td>
							<td><input type="text" name="bname"></td>
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

