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
				
				<h2>Login</h2>
				<p>Required information is marked with an asterisk (*)</p>
				<br>
				<form action="" method="POST" novalidate>
					<table id="form_table">
						<tr>
							<?php if (isset($e_message)) echo $e_message; ?>
							<td> * E-mail: </td>
							<td>
								<?php echo form_error('email'); ?>
								<input type="email" name="email" required>
							</td>
						</tr>
						<tr>
							<td> * Password: </td>
							<td>
								<?php echo form_error('password'); ?>
								<input type="password" name="password" required>
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
