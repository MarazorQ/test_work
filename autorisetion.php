<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Autorisetion</title>
	<link rel="stylesheet" href="index.css">
</head>
<body>
	<form action="log_in.php" method="post" class="profile">
		<h1> Log in</h1>
		<div class="item">
			<label for=""> login: </label>
			<input type="text" name="login" placeholder="input your login">
		</div>
		<div class="item"> 
			<label for=""> password: </label>
			<input type="password" name="password" placeholder="input your password">
		</div>
		<div class="item">
			<button type="submit">LOG IN</button>
		</div>
		<p>Don't have an account?-<a href="register.php">registretion</a></p>

			<?php 
					if ($_SESSION['error']){
						echo '<p class="error">' . $_SESSION['error'] . '</p>' ;
					}
					
  					unset($_SESSION['error']);	
				?>
	</form>
</body>
</html>