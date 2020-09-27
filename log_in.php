<?php 
	
	session_start();

	$login = $_POST['login'];
	$password =md5($_POST['password']);

	$xml = simplexml_load_file('output.xml');

	foreach ($xml as $User) {
   
   		$name = $User->login;
   		$pp = $User->password;

		if (($login == $name) and ($password == $pp)){

			header('Location: register.php');
			

			
		}else{

			$_SESSION['error'] = 'incorrect login or password';
			header('Location: autorisetion.php');
		}
			

		
	}
		
	


?>