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
				<h2>Contact Us</h2>

				<p>Required information is marked with an asterisk (*)</p>
				<br>
				<form id="contactus">
					<table id="form_table">
						<tr>
							<td> * First Name: </td>
							<td><input type="text" name="fname"></td>
						</tr>
						<tr>
							<td> * Last Name: </td>
							<td><input type="text" name="lname"></td>
						</tr>
						<tr>
							<td> * E-mail: </td>
							<td><input type="text" name="email"></td>
						</tr>
						<tr>
							<td> Phone: </td>
							<td><input type="text" name="phone"></td>
						</tr>
						<tr>
							<td> * Comments: </td>
							<td><textarea form="contactus" name="comments"></textarea></td>
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