<?php 
	
	session_start();

	$login = $_POST['login'];
	$password =md5($_POST['password']);

	$xml = simplexml_load_file('output.xml');

	foreach ($xml as $User) {
   
   		$name = $User->login;
   		$pp = $User->password;
   		$firat_name = $User->name;

		if (($login == $name) and ($password == $pp)){

			$_SESSION['user'] = $login;
			header('Location: welcome.php');
			
			

			
		}else{

			$_SESSION['error'] = 'incorrect login or password';
			header('Location: autorisetion.php');
		}
			

		
	}
		
	


?>