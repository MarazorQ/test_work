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
	<title> Autorisetion</title>
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<form  class="profile">
		<h1> Log in</h1>
		<div class="item">
			<label for=""> login: </label>
			<input type="text" name="login" placeholder="input your login">
		</div>
		<div class="item"> 
			<label for=""> password: </label>
			<input type="password" name="password" placeholder="input your password">
		</div>
		<div type="submit" class="item">
			<button class="btn">LOG IN</button>
		</div>
		<p>Don't have an account?-<a href="register.php">registretion</a></p>
		<!--	
			<?php 
					if ($_SESSION['error']){
						echo '<p class="error">' . $_SESSION['error'] . '</p>' ;
					}
					
  					unset($_SESSION['error']);	
				?>
			-->
			<p class="msg none"> ddff</p>
				
	</form>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/mai.js"></script>
</body>
</html>