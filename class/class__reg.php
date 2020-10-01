<?php 
	
	include_once 'class__crud.php';


	class Register{

		public  $login_class;
		public  $password_class;
		public  $confirm_password_class;
		public  $email_class;
		public  $first_name_class;
		private $error_fields = [];



		function __construct($login,$password,$confirm_password,$email,$first_name){

			$this->email_class = htmlspecialchars($email);
			$this->login_class = htmlspecialchars($login);
			$this->password_class = htmlspecialchars($password);
			$this->confirm_password_class = htmlspecialchars($confirm_password);
			$this->first_name_class = htmlspecialchars($first_name);

		}

		public function create_accaunt(){

			$acc = new CRUD();
			$acc-> checkInDBLogin($login_class);
			$this->checkForm();
			$this->checkPassword();
			
		}


		public function checkForm(){


			if ($login_class === '') {
			    $error_fields[] = 'login';
			}

			if ($password_class === '') {
			    $error_fields[] = 'password';
			}

			if ($first_name_class === '') {
			    $error_fields[] = 'full_name';
			}

			if ($email_class=== '' ) {
			    $error_fields[] = 'email';
			}

			if ($confirm_password_class === '') {
			    $error_fields[] = 'confirm_password';
			}

			if (!empty($error_fields)) {
			    $response = [
			        "status" => false,
			        "type" => 1,
			        "message" => "Chektrue form",
			        "fields" => $error_fields
			    ];

			    echo json_encode($response);

			    die();
			}

		}

		public function checkPassword(){

			$acc1 = new CRUD();
			if ($password_class === $confirm_password_class){
				$password_class = md5($password_class);
				$acc1->update($login_class,$password_class,$email_class,$first_name_class);

				 $response = [
			        "status" => true,
			        "message" => "Registretion was successful!",
			    ];
			    echo json_encode($response);

			}else{

				$response = [
			        "status" => false,
			        "message" => "password != password_confirm",
			    ];
			    echo json_encode($response);
			}


		}

	}

?>