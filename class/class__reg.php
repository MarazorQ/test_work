<?php 
	
	include_once 'class__crud.php';

	class Register{

		public function create_accaunt($login,$password,$confirm_password,$email,$first_name){
			$this->check_form($login,$password,$confirm_password,$email,$first_name);
			$checkInDB = new CRUD();
			$checkInDB-> check_in_db_login($login);
			$this->check_password($login,$password,$confirm_password,$email,$first_name);
		}

		public function check_form($login,$password,$confirm_password,$email,$first_name){
			$valid_login = "/^[a-z0-9]{6,12}$/i";
			$valid_name = "/^[a-z0-9]{2,12}$/i";
			$valid_password = "/^[a-z0-9-_]{6,12}$/i";// p.s. в тз написано: использовать "спец символы". Не понял какие именно, поэтому выбрад "-" и "_"))
			$error_fields = [];

            if (empty($login)){
            	$error_fields[] = 'login';
            }else{
            	if (preg_match($valid_login, $login)){
            	 }else{
            	 	$error_fields[] = 'login';
            	 	}
            }

			if (empty($password)){
				$error_fields[] = 'password';
			}else{
				if (preg_match($valid_password, $password)){
				}else{
					$error_fields[] = 'password';
					}
			}

			if (empty($first_name)){
            	 $error_fields[] = 'first_name';
            }else{
            	 if (preg_match($valid_name, $first_name)){
            	 }else{
            	 	$error_fields[] = 'first_name';
            	 	}
            }

			if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			    $error_fields[] = 'email';
			}

    		if (empty($confirm_password)){
				$error_fields[] = 'confirm_password';
			}else{
				if (preg_match($valid_password, $confirm_password)){
				}else{
					$error_fields[] = 'confirm_password';
					}
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

		public function check_password($login,$password,$confirm_password,$email,$first_name){
			$acc1 = new CRUD();

			if ($password === $confirm_password){
				$password = md5($password);
				$acc1->update($login,$password,$email,$first_name);

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