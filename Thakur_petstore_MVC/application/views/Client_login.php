<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo(base_url()) ?>assets/CSS/pet.css">
	<title>Pet Store</title>
</head>
<body id="wrapper">
	<header>
		<h1> Client's Pet Store </h1>
	</header>
	<div id="container">
		<nav role="navigation">
			<!-- <p><a href="Change_password.php">Change Password</a></p> -->
			<p>Welcome, <?php echo($_SESSION['fname']);?></p>
			<p><a href="<?php echo(base_url()); ?>index.php/Login/logout">Logout</a></p>
		</nav>
		<div id = "main-content">
			<img src="<?php echo(base_url()); ?>/assets/img/petstorebanner5.png">
			<section id = "main-section">
				
				<h2>My Pet</h2>
				<p>Required information is marked with an asterisk (*)</p>
				<br>
				<form action="" method="POST">
					<table id="form_table">
						<tr>
							<td> Client Name: </td>
							<td>
								<input type="text" name="bname"> 
							</td>
						</tr>
						<tr>
							<td> *My Pet: </td>
							<td>
								<input type="text" name="service" required>
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