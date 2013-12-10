<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * /Author Masande Mbondwana
 * Validator class
 * 
 */

Class Validater {

private $name;
private $surname;
private $email;
private $cell_no;
private $username;
private $password;
private $c_password;
public $confirmcode;



if(empty($name)){
$_SESSION['error'] = " name fied required";
header("location:index.php?page=register");
exit;
}
if (empty($surname)) {
$_SESSION['error'] = "Surname fied required";
header("location:index.php?page=register");
exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$_SESSION['error'] = "Valid email fied required";
header("location:index.php?page=register");
exit;
}
if (GetEmail($email) == true) {
$_SESSION['error'] = "Email already exist in the website";
header("location:index.php?page=register");
exit;
}

if (empty($cell_no)) {
$_SESSION['error'] = "Ccll number fied required";
header("location:index.php?page=register");
exit;
}



if (!is_numeric($cell_no)) {
$_SESSION['error'] = "Only numbers are required in cell No";
header("location:index.php?page=register");
exit;
}

if (empty($username) ) {
$_SESSION['error'] = "Username fied required";
header("location:index.php?page=register");
exit;
}
if (GetUsername($username) == true ) {
$_SESSION['error'] = "Username already exist un the website choose another one";
header("location:index.php?page=register");
exit;
}


if (empty($password)) {
$_SESSION['error'] = "Password fied required";
header("location:index.php?page=register");
exit;
}
if ($password != $c_password) {
$_SESSION['error'] = "Passwords do not match";
header("location:index.php?page=register");
exit;
}
if (strlen($password) < 6) {
$_SESSION['error'] = "Atleast 6 characters required in password";
header("location:index.php?page=register");
exit;
}
?>
