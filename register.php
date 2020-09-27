<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Registretion</title>
	<link rel="stylesheet" href="index.css">
</head>
<body>
	<form action="create_ac.php" class="profile" method="POST">
		<h1> Registretion</h1>	
		<div class="item">
			<label for=""> login: </label>
			<input type="text" name="login">
		</div>
		<div class="item"> 
			<label for=""> password: </label>
			<input type="password" name="password">
		</div>
		<div class="item">
			<label for=""> confirm_password: </label>
			<input type="password" name="confirm_password">
		</div>
		<div class="item"
			<label for=""> email: </label>
			<input type="email" name="email">
		</div>
		<div class="item">
			<label for=""> name: </label>
			<input type="text" name="first_name">
		</div>
		<div class="item">
			<button>CREATE</button>
		</div>
	</form>
	<script type="text/javascript" src="validation.js"></script>
</body>
</html>