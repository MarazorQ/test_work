<?php 
	session_start();
	if ($_SESSION['user']){
		header('Location: welcome.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Registretion</title>
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<form action="create_ac.php" class="profile" method="POST">
		<h1> Registretion</h1>	
		<div class="item">
			<label for=""> login: </label>
			<input type="text" name="login" placeholder="input your login">
		</div>
		<div class="item"> 
			<label for=""> password: </label>
			<input type="password" name="password" placeholder="input your password">
		</div>
		<div class="item">
			<label for=""> confirm_password: </label>
			<input type="password" name="confirm_password" placeholder="input the password again">
		</div>
		<div class="item"
			<label for=""> email: </label>
			<input type="email" name="email" placeholder="input your email">
		</div>
		<div class="item">
			<label for=""> name: </label>
			<input type="text" name="first_name" placeholder="input your name">
		</div>
		<div class="item">
			<button type="submit" class="register-btn">CREATE</button>
			<p>Alredy have an account?-<a href="index.php">log in</a></p>
		</div>
		<p class="msg none">dfdff</p>
	</form>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/mai.js"></script>
</body>
</html>