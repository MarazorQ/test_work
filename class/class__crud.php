<?php 
	
	Class CRUD{

		public function create($login,$password,$email,$first_name){

			//Создание бд и таблицы
			$xml = new XMLWriter(); //создаем новый экземпляр класса XMLWriter
			$xml->openUri('file:db/output.xml');
			$xml->startDocument('1.0', 'utf-8');
			$xml->startElement("User"); //создание корневого узла
			$xml->writeElement("id", "1");
			$xml->writeElement("login", $login); //запись элемента
			$xml->writeElement("password", $password);
			$xml->writeElement("email", $email);
			$xml->writeElement("name", $first_name);
			$xml->endElement(); //закрытие корневого элемента
			echo $xml->outputMemory(); //завершение записи в XML
			
		}

		public function read($login,$password){

			$xml = simplexml_load_file('../db/output.xml');

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
					//header('Location: welcome.php');
					
				}else{

		    		$response = [
		       		 "status" => false,
		        		"message" => 'Не верный логин или пароль'
		   						 ];

		    		echo json_encode($response);
				}
					
			}

		}

		public function update($login,$password,$email,$first_name){

	 		$xml = simplexml_load_file('../db/output.xml');

			//Добавим новый узел в имеющийся XML
			$newchild = $xml->addChild("User");
			//Добавление параметров записи
			
			$newchild->addChild("id", "1");
			$newchild->addChild("login", $login);
			$newchild->addChild("password", $password);
			$newchild->addChild("email", $email);
			$newchild->addChild("name", $first_name);
			file_put_contents('../db/output.xml', $xml->asXML());

		}

		

		public function checkInDBLogin($login){


			$xml = simplexml_load_file('../db/output.xml');

			foreach ($xml as $User) {
			   
			   		$name = $User->login;
			   		
					if ($login == $name){

						$response = [
			        "status" => false,
			        "type" => 1,
			        "message" => "That login is alredy regist",
			        "fields" => ['login']
			    ];

			    echo json_encode($response);
			    die();
						
					}
						
				}

		}

	}
?>