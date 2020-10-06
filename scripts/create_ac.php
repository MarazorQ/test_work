<?php

session_start();

include_once '../class/class__crud.php';
include_once '../class/class__reg.php';

$login = $_POST['login'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$email = $_POST['email'];
$first_name = $_POST['first_name'];

$acc = new CRUD();
$acc-> checkInDBLogin($login);

$error_fields = [];

if ($login === '') {
    $error_fields[] = 'login';
}
if ($password === '') {
    $error_fields[] = 'password';
}
if ($first_name === '') {
    $error_fields[] = 'first_name';
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
		$password = md5($password);
		$acc->update($login,$password,$email,$first_name);
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