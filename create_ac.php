<?php

session_start();


$login = $_POST['login'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$email = $_POST['email'];
$first_name = $_POST['first_name'];



$xml = simplexml_load_file('db/output.xml');

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

$error_fields = [];

if ($login === '') {
    $error_fields[] = 'login';
}

if ($password === '') {
    $error_fields[] = 'password';
}

if ($first_name === '') {
    $error_fields[] = 'full_name';
}

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_fields[] = 'email';
}

if ($confirm_password === '') {
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




if ($password===$confirm_password){

	//Создание бд и таблицы
/*
		$xml = new XMLWriter(); //создаем новый экземпляр класса XMLWriter
		$xml->openUri('file:/output.xml');
		$xml->startDocument('1.0', 'utf-8');
		$xml->startElement("User"); //создание корневого узла
		$xml->writeElement("id", "1");
		$xml->writeElement("login", $login); //запись элемента
		$xml->writeElement("password", $password);
		$xml->writeElement("email", $email);
		$xml->writeElement("name", $first_name);
		$xml->endElement(); //закрытие корневого элемента
		echo $xml->outputMemory(); //завершение записи в XML
		*/
		$password = md5($password);

 		$xml = simplexml_load_file('db/output.xml');
	

		//Добавим новый узел в имеющийся XML
		$newchild = $xml->addChild("User");
		//Добавление параметров записи
		
		$newchild->addChild("id", "1");
		$newchild->addChild("login", $login);
		$newchild->addChild("password", $password);
		$newchild->addChild("email", $email);
		$newchild->addChild("name", $first_name);
		file_put_contents('db/output.xml', $xml->asXML());
		
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














?>