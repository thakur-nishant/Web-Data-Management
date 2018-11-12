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

	$bname = $_POST['bname'];
	$service = $_POST['service'];
	$bid = NULL;
	if ($_POST['bname'] != ""){
		// add business name 
		$sql = "INSERT INTO business (bname) VALUES (?);";
		// prepare and bind
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $bname);
		// execute
		$stmt->execute();

		$bid = $conn->insert_id;
	}

	if ($_POST['service'] != ""){
		// add business name 
		$sql = "INSERT INTO service (service_description) VALUES (?);";
		// prepare and bind
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $service);
		// execute
		$stmt->execute();

		$sid = $conn->insert_id;

		$sql = "INSERT INTO business_service (businessid, userid, serviceid) VALUES (?, ?, ?);";

		// prepare and bind
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("iii", $bid, $_SESSION['userid'], $sid);

		// execute
		if($stmt->execute()){
			$message = "Added Successful!";
		}
		else
			$message = "Error! Please try again.";
	} else {
		$s_error = "<i style='color: red;'>Required!<i>";
	}

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
		<h1> Business's Pet Store </h1>
	</header>
	<div id="container">
		<nav role="navigation">
			<p><a href="Change_password.php">Change Password</a></p>
			<p><a href="Logout.php">Logout</a></p>
		</nav>
		<div id = "main-content">
			<img src="petstorebanner5.png">
			<section id = "main-section">
				
				<h2>My Business</h2>
				<?php
					echo "<i style='color: red;'>".$message."</i>";
				?>

				<p>Required information is marked with an asterisk (*)</p>
				<br>
				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
					<table id="form_table">
						<tr>
							<td> Business Name: </td>
							<td>
								<input type="text" name="bname"> 
							</td>
						</tr>
						<tr>
							<td> *Service: </td>
							<td>
								<input type="text" name="service" required>
								<?php if (isset($s_error)) echo $s_error; ?>  
							</td>
						</tr>
					</table>
					<input type="submit" name="submit" value="Add New One">
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