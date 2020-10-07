<?php

session_start();

include_once '../class/class__crud.php';
include_once '../class/class__reg.php';

$login = $_POST['login'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$email = $_POST['email'];
$first_name = $_POST['first_name'];

$reg = "/[а-Я]/";
$notcorrectsymbolTwo = "!@\"#№;$%^:&?*()-_+=//|\\`'.,";
$bool = false;
$error_fields = [];

if (empty($login)) {
    $error_fields[] = 'login';
}else{
    if (strlen($login) >= 6 && strlen($login)<= 12){
        for($i = 0; $i < strlen($login); $i++){
            for($j = 0; $j < strlen($notcorrectsymbolTwo); $j++)
                if ($login[$i] ==  $notcorrectsymbolTwo[$j])
                    $bool = true;
            }
        if ($bool != true){
            if (!preg_match($reg, $login)){
            }else{
                $error_fields[] = 'login';
            }
        }else{
            $error_fields[] = 'login';
        }
        }else{
            $error_fields[] = 'login';
        }
    }

if (empty($password)) {
    $error_fields[] = 'password';
}else{
    if(strlen($password) >= 6 && strlen($password) <= 15){
        for($i = 0; $i < strlen($password); $i++){
            for($j = 0; $j < strlen($notcorrectsymbolTwo); $j++)
                if ($password[$i] == $notcorrectsymbolTwo[$j])
                    $bool = true;
            }
        if ($bool != ture){
            if (!preg_match($reg, $password)){
            }else{
                $error_fields[] = 'password';
            }
        }else{
            $error_fields[] = 'password';
        }
    }else{
        $error_fields[] = 'password';
    }
}

if (empty($first_name)) {
    $error_fields[] = 'first_name';
}else{
    if (strlen($first_name) >= 2 && strlen($login)<= 12){
        for($i = 0; $i < strlen($first_name); $i++){
            for($j = 0; $j < strlen($notcorrectsymbolTwo); $j++)
                if ($first_name[$i] ==  $notcorrectsymbolTwo[$j])
                    $bool = true;
            }
        if ($bool != true){
            if (!preg_match($reg, $first_name)){
            }else{
                $error_fields[] = 'first_name';
            }
        }else{
            $error_fields[] = 'first_name';
        }
        }else{
            $error_fields[] = 'first_name';
        }
    }

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_fields[] = 'email';
}

if (empty($confirm_password)) {
    $error_fields[] = 'confirm_password';
}else{
    if(strlen($confirm_password) >= 6 && strlen($confirm_password) <= 15){
        for($i = 0; $i < strlen($confirm_password); $i++){
            for($j = 0; $j < strlen($notcorrectsymbolTwo); $j++)
                if ($confirm_password[$i] == $notcorrectsymbolTwo[$j])
                    $bool = true;
            }
        if ($bool != ture){
            if (!preg_match($reg, $confirm_password)){
            }else{
                $error_fields[] = 'confirm_password';
            }
        }else{
            $error_fields[] = 'confirm_password';
        }
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

$acc = new CRUD();
$acc-> checkInDBLogin($login);


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