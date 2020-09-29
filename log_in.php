<?php 
	
	session_start();

	$login = $_POST['login'];
	$password =$_POST['password'];




	$error_fields = [];

	if ($login === '') {
	    $error_fields[] = 'login';
	}

	if ($password === '') {
	    $error_fields[] = 'password';
	}

	if (!empty($error_fields)) {
	    $response = [
	        "status" => false,
	        "type" => 1,
	        "message" => "Check if the fields are correct",
	        "fields" => $error_fields
	    ];

	    echo json_encode($response);

	    die();
	}

	$password = md5($password);

	$xml = simplexml_load_file('db/output.xml');

	foreach ($xml as $User) {
   
   		$name = $User->login;
   		$pp = $User->password;
   		$firat_name = $User->name;

		if (($login == $name) and ($password == $pp)){

			$_SESSION['user'] = $login;

			$response = [
        "status" => true
    ];

   		    echo json_encode($response);
			header('Location: welcome.php');
			
			

			
		}else{

			
    $response = [
        "status" => false,
        "message" => 'Не верный логин или пароль'
    ];

    echo json_encode($response);
		}
			

		
	}
		
	


?>