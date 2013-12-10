<?php
session_start();

include_once 'include/class.phpmailer.php';
include_once 'include/database.php';

$email = $_GET['email'];
$code = $_GET['code'];

if(empty($email)){
    $_SESSION['error'] = "email is empty please click the link again/ Enter email";
    header("location:index.php?page=reset");
    exit;
    
}
if(empty($code)){
     $_SESSION['error'] = "email is empty please click the link again/ Enter email";
    header("location:index.php?page=reset");
    exit;
}

if($email && $code){
    
   
    
}
?>
