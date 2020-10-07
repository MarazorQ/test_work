<?php 
	
	include_once 'class__crud.php';

	class Authorization{

		public $error_fields = [];
		
		public function signin($login,$password){
			$this->checkForm($login,$password);
			
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
		}
	}

?>