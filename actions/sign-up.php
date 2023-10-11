<?php 
//  ../ - go outside the current folder 
include '../classes/User.php';

// object
$user = new User;

// $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

$user->signUp($_POST);

// print_r($_POST);