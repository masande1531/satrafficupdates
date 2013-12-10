<?php
session_start();

include_once 'include/database.php';

$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);

if(isset($_POST['Submit']))
{
   

     if (Login($username, $password)) {
          $_SESSION['username'] = $username;   
          
            header('location:index.php?page=report');
     }  else {
         $_SESSION['error'] = "Username/Password Incorrect";
          header('location:index.php?page=login');
     }
}


function Login($username, $password){

     $passwordmd5 = md5($password);
     $sql = "select * from reg where binary username = '$username' and binary password = '$passwordmd5' ";
      $query = mysql_query($sql);



       $count = mysql_num_rows($query);
       
       if ($count == 1) {
           return true;
          }  else {
              
              return false;
          }
}

?>
