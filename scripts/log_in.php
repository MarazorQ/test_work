<?php 
	
	session_start();

	//include_once 'class/class__crud.php';
	include_once 'class/class__autoris.php';

	$login = $_POST['login'];
	$password =$_POST['password'];


	$acc = new Authorization();
	$acc->signin($login,$password); 


	


?>