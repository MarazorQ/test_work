<?php 
	
	include_once 'class__crud.php';

	class Authorization{

		//private $login_class;
		//private $password_class;
		private $error_fields = [];
		/*
		function __construct($login,$password) 
		{

		$this->login_class = htmlspecialchars($login);
		$this->password_class = htmlspecialchars($password);
		
		}
*/
		public function signin($login,$password){

			$this->checkForm($login,$password);

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

			$user = new CRUD();
			$user->read($login,$password);

		}

		public function checkForm($login,$password){


			if ($login === '') {
			    $error_fields[] = 'login';
			}

			if ($password === '') {
			    $error_fields[] = 'password';
			}

		}

	}



?>