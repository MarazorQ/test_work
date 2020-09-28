<?php

session_start();


$login = $_POST['login'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$email = $_POST['email'];
$first_name = $_POST['first_name'];

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

 		$xml = simplexml_load_file('output.xml');
	

		//Добавим новый узел в имеющийся XML
		$newchild = $xml->addChild("User");
		//Добавление параметров записи
		
		$newchild->addChild("id", "1");
		$newchild->addChild("login", $login);
		$newchild->addChild("password", $password);
		$newchild->addChild("email", $email);
		$newchild->addChild("name", $first_name);
		file_put_contents('output.xml', $xml->asXML());
		
		$_SESSION['error'] = 'Registration is certifiled';
		header('Location: autorisetion.php');



}else{
	$_SESSION['error']='password dont = confirm_password';
	header('Location: register.php');
}










?>