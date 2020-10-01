<?php
	session_start();
	if (!$_SESSION['user']){
		header('Location: autorisetion.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Welcome</title>
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<form >
		<h2>Hello <?= $_SESSION['user']?></h2>
		<a href="scripts/exit.php" class="exit"> Exit</a>
	</form>
</body>
</html>