<?php
session_start();
include_once 'include/class.phpmailer.php';
include_once 'include/database.php';



$confirmcode = $_GET['code'];

if ($_GET['code']) {

    if (empty($_GET['code']) || strlen($_GET['code']) <= 10) {
       
       $_SESSION['error'] =   "Please provide the confirm code";
      header("location:index.php?page=confirm");
      echo '<script> window.location="http://satrafficupdates.co.za/index.php?page=confirm"; </script>';
      exit;
      
        return false;
    }

    if (!UpdateDBRecForConfirmation($confirmcode)) {
      $_SESSION['error'] =   "Error occured please try again";
      header("location:index.php?page=confirm");
      echo '<script> window.location="http://satrafficupdates.co.za/index.php?page=confirm"; </script>';
      exit;
      
        return false;
    }


   header("location:index.php?page=thank_you");
   echo '<script> window.location="http://satrafficupdates.co.za/index.php?page=thank_you"; </script>';
    return true;
}

function UpdateDBRecForConfirmation($confirmcode) {

    $result = mysql_query("Select name, email from reg where confirmcode='$confirmcode'");
    if (!$result || mysql_num_rows($result) <= 0) {
       
      $_SESSION['error'] =   "Wrong confirm code";
      header("location:index.php?page=confirm");
      exit;
        return false;
    }
    $row = mysql_fetch_assoc($result);
    $fullname = $row['name'];
    $email = $row['email'];

    $qry = "Update reg Set confirmcode='y' Where  confirmcode='$confirmcode'";

    if (!mysql_query($qry)) {
      
     $_SESSION['error'] =   "Error inserting data to the table\n";
      header("location:index.php?page=confirm");
      exit;
        return false;
    }
    SendUserWelcomeEmail($email, $fullname);

    SendAdminIntimationOnRegComplete($email, $fullname);
    return true;
}

function SendUserWelcomeEmail( $email, $fullname) {
    
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

     // $mailer = new PHPMailer();


  //  $mailer->AddAddress($email, $fullname);

   $subject = "Welcome to www.satrafficupdates.co.za";

    //$mailer->From = "info@satrafficupdates.co.za";



  
    $message = "Hello " . $fullname . "<br/>" .
            "Welcome! Your registration  with www.satrafficupdates.co.za is completed.<br/>" .
            "<br/><br/>" .
            "Regards,<br/>n" .
            "Webmaster <br/>" .
            'www.satrafficupdates.co.za';

    //$mailer->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

   // $mailer->MsgHTML($message);

   $mailer = mail($email, $subject, $message, $headers);
    if (!$mailer) {
        $_SESSION['error'] =  "Mail was not sent.";
        return false;
    }
    return true;
}

function SendAdminIntimationOnRegComplete($email, $fullname) {

    $headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    //$mailer = new PHPMailer();

    //$mailer->CharSet = 'utf-8';

    //$mailer->AddAddress('masande@globalimsa.com', 'Masande Mbondwana');

    $subject = "Registration Completed: " . $fullname;

   // $mailer->From = "info@satrafficupdates.co.za";

    $message = "A new user registered at www.satrafficupdates.co.za" . "<br/>" .
            "Name: " . $fullname . "<br/>" .
            "Email address: " . $email . "<br/>";
    $mailer = mail('masande@globalimsa.com', $subject, $message, $headers);
    if (!$mailer->Send()) {
        return false;
    }
    return true;
}
?>


