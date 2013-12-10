<?php
session_start();

include_once 'include/class.phpmailer.php';
include_once 'include/database.php';


$email = $_POST['email'];

if (isset($_POST['Submit'])) {
    
      
    
    if (empty($email)) {
        $_SESSION['error'] = ("Email is empty!");
        
        header('location:index.php?page=reset');
        exit;
     
    }
    
        $sql = mysql_query("Select * from reg where email='$email'");
        $user_rec = mysql_fetch_array($sql);
        
    if (false == GetUserFromEmail($email, $user_rec['name'] )) {
      $_SESSION['error'] = ("Email does not exist");
        
        header('location:index.php?page=reset');
        exit;
    }
    if (false == SendResetPasswordLink($email, $user_rec['name'])) {
          $_SESSION['error'] = ("Email not esnt");
        
        header('location:index.php?page=reset');
   exit;
    }
     
        
        header('location:index.php?page=reset_m');
   exit;
   
}



if ($_GET['email'] && $_GET['code']) {
    
    if (empty($_GET['email'])) {
          $_SESSION['error'] = ("Email is empty!");
           header('location:index.php?page=reset');
        exit;
        return false;
    }
    if (empty($_GET['code'])) {
          $_SESSION['error'] = ("reset code is empty!");
           header('location:index.php?page=reset');
        exit;
        return false;
    }
    $email = trim($_GET['email']);
    $code = trim($_GET['code']);

    if (GetResetPasswordCode($email) != $code) {
         $_SESSION['error'] = ("Bad reset code! Enter your email again");
          header('location:index.php?page=reset');
        exit;
       
    }
    
    $user_rec = array();
    if (!GetUserFromEmail($email, $user_rec)) {
        return false;
    }

    $new_password = ResetUserPasswordInDB($email);
    if (false === $new_password || empty($new_password)) {
          $_SESSION['error'] = ("Error updating new password");
           header('location:index.php?page=reset');
        exit;
        return false;
    }

    if (false == SendNewPassword($email, $new_password)) {
          $_SESSION['error'] =  ("Error sending new password");
           header('location:index.php?page=reset');
        exit;
        return false;
    }
    header('location:index.php?page=reset_m');
    return true;
}

function ResetUserPasswordInDB($email) {
     $sql = mysql_query("Select * from reg where email='$email'");
        $user_rec = mysql_fetch_array($sql);
        
    $new_password = substr(md5(uniqid()), 0, 10);

    if (false == ChangePasswordInDB($user_rec['id_user'], $new_password)) {
        return false;
    }
    return $new_password;
}

function ChangePasswordInDB($user_rec, $newpwd) {
   

    $qry = "Update reg Set password='" . md5($newpwd) . "'  where  id_user=".$user_rec."";

    if (!mysql_query($qry)) {
         $_SESSION['error'] = ("Error updating the password \nquery:$qry");
          header('location:index.php?page=reset');
        exit;
        return false;
    }
    return true;
}

 function GetUserFromEmail($email, $user_rec) {
   

        $result = mysql_query("Select * from reg where email='$email'");

        if (!$result || mysql_num_rows($result) <= 0) {
        $_SESSION['error'] = ("Email does not exist");
        
        header('location:index.php?page=reset');
        exit;
        }
        


        return $user_rec = mysql_fetch_assoc($result);;
    }

function GetResetPasswordCode($email) {
   
    return substr(md5($email . GetAbsoluteURLFolder()), 0, 10);
}

function SendResetPasswordLink($email, $user_rec) {

     GetInfo($email);
    $mailer = new PHPMailer();
    $mailer->IsSMTP();
    $mailer->Host = "mail.gmims.co.za";
    $mailer->SMTPAuth = true;                  // enable SMTP authentication
    $mailer->Host = "mail.gmims.co.za"; // sets the SMTP server
    $mailer->Port = 25;                    // set the SMTP port for the GMAIL server
    $mailer->Username = "admin@gmims.co.za"; // SMTP account username
    $mailer->Password = "minda2011";        // SMTP account password


    $mailer->CharSet = 'utf-8';

    $mailer->AddAddress($email, $user_rec);

    $mailer->Subject = "Your reset password request at " . 'www.satrafficupdates.co.za';

    $mailer->From = "info@satrafficupdates.co.za";

    $link = GetAbsoluteURLFolder().
            '/index.php?page=reset&email=' .
            $email. '&code=' .
            urlencode(GetResetPasswordCode($email));

    $mailer->Body = "Hello " .$user_rec. "\r\n\r\n" .
            "There was a request to reset your password at " . 'www.satrafficupdates.co.za' . "\r\n" .
            "Please click the link below to complete the request: \r\n" . $link . "\r\n" .
            "Regards,\r\n" .
            "Webmaster\r\n" .
            'www.satrafficupdates.co.za';

    if (!$mailer->Send()) {
       
        return false;
    }
    return true;
}

function SendNewPassword($email, $new_password) {
    
       $sql = mysql_query("Select * from reg where email='$email'");
        $user_rec = mysql_fetch_array($sql);
        
    $mailer = new PHPMailer();
    $mailer->IsSMTP();
    $mailer->Host = "mail.gmims.co.za";
    $mailer->SMTPAuth = true;                  // enable SMTP authentication
    $mailer->Host = "mail.gmims.co.za"; // sets the SMTP server
    $mailer->Port = 25;                    // set the SMTP port for the GMAIL server
    $mailer->Username = "admin@gmims.co.za"; // SMTP account username
    $mailer->Password = "minda2011";        // SMTP account password


    $mailer->CharSet = 'utf-8';

    $mailer->AddAddress($email, $user_rec['name']);

    $mailer->Subject = "Your new password for www.satrafficupdates.co.za" ;

    $mailer->From = "info@satrafficupdates.co.za";

    $mailer->Body = "Hello " . $user_rec['name']. "\r\n\r\n" .
            "Your password is reset successfully. " .
            "Here is your updated login:\r\n" .
            "username:" . $user_rec['username'] . "\r\n" .
            "password:$new_password\r\n" .
            "\r\n" .
            "Login here: " . GetAbsoluteURLFolder() . "/index.php?page=login\r\n" .
            "\r\n" .
            "Regards,\r\n" .
            "Webmaster\r\n" .
            'www.satrafficupdates.co.za';

    if (!$mailer->Send()) {
        $_SESSION['error'] = ("Error the message was not sent to: $email");
          
        exit;
        return false;
    }
     header('location:index.php?page=reset_m');
    return true;
}

function GetAbsoluteURLFolder() {
    $scriptFolder = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';
    $scriptFolder .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']);
    return $scriptFolder;
}

  function UserEmail() {
        return isset($_SESSION['email_of_user']) ? $_SESSION['email_of_user'] : '';
    }
    
    function GetInfo($email){
        
        $sql = mysql_query("Select * from reg where email='$email'");
        $user_rec = mysql_fetch_array($sql);
        
       
        
    }
?>
