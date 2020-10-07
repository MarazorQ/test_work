<?php

session_start();

include_once '../class/class__reg.php';

$login = $_POST['login'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$email = $_POST['email'];
$first_name = $_POST['first_name'];

$ac = new Register();
$ac-> create_accaunt($login,$password,$confirm_password,$email,$first_name);

?>