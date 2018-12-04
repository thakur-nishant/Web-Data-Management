<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo(base_url()) ?>assets/CSS/pet.css">
	<title>Pet Store</title>
</head>
<body id="wrapper">
	<header>
		<h1> Pet Store </h1>
	</header>
	<div id="container">
		<nav role="navigation">
			<p><a href="<?php echo(base_url()); ?>">Home</a></p>
			<p><a href="<?php echo(base_url()); ?>index.php/Welcome/aboutus">About Us</a></p>
			<p><a href="<?php echo(base_url()); ?>index.php/ContactUs/index">Contact Us</a></p>
			<p><a href="<?php echo(base_url()); ?>index.php/Client/index">Client</a></p>
			<p><a href="<?php echo(base_url()); ?>index.php/Service/index">Service</a></p>
			<p><a href="<?php echo(base_url()); ?>index.php/Login/index">Login</a></p>
		</nav>
		<div id = "main-content">
			<img src="<?php echo(base_url()); ?>/assets/img/petstorebanner5.png">
			<section id = "main-section">
				
				<h2>Client</h2>
				<p>Required information is marked with an asterisk (*)</p>
				<br>
				<form action="" method="POST" novalidate>
					<table id="form_table" >
						<tr>
							<td> * First Name: </td>
							<td>
								<?php echo form_error('fname'); ?>
								<input type="text" name="fname" value="<?php echo set_value('fname'); ?>" required>
							</td>
						</tr>
						<tr>
							<td> * Last Name: </td>
							<td>
								<?php echo form_error('lname'); ?>
								<input type="text" name="lname" value="<?php echo set_value('lname'); ?>" required>
							</td>
						</tr>
						<tr>
							<td> * E-mail: </td>
							<td>
								<?php echo form_error('email'); ?>
								<input type="email" name="email" value="<?php echo set_value('email'); ?>" required>
							</td>
						</tr>
						<tr>
							<td> Phone: </td>
							<td>
								<?php echo form_error('phone'); ?>
								<input type="tel" name="phone" value="<?php echo set_value('phone'); ?>" >
							</td>
						</tr>
						<tr>
							<td> Business Name: </td>
							<td><input type="text" name="bname" value="<?php echo set_value('bname'); ?>" ></td>
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
