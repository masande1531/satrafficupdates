<?php
session_start();
include_once 'include/class.phpmailer.php';
include_once 'include/database.php';



$confirmcode = $_GET['code'];

if ($_GET['code']) {

    if (empty($_GET['code']) || strlen($_GET['code']) <= 10) {
       
       $_SESSION['error'] =   "Please provide the confirm code";
      header("location:index.php?page=confirm");
      exit;
      
        return false;
    }

    if (!UpdateDBRecForConfirmation($confirmcode)) {
      $_SESSION['error'] =   "Error occured please try again";
      header("location:index.php?page=confirm");
      exit;
      
        return false;
    }


   header("location:index.php?page=thank_you");
    return true;
}

function UpdateDBRecForConfirmation($confirmcode) {

    $result = mysql_query("Select name, email from reg where confirmcode='$confirmcode'");
    if (!$result || mysql_num_rows($result) <= 0) {
   
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

      $mailer = new PHPMailer();


    $mailer->IsSMTP();
    $mailer->Host = "mail.gmims.co.za";
    $mailer->SMTPAuth = true;                  // enable SMTP authentication
    $mailer->Host = "mail.gmims.co.za"; // sets the SMTP server
    $mailer->Port = 25;                    // set the SMTP port for the GMAIL server
    $mailer->Username = "***********"; // SMTP account username
    $mailer->Password = "********";        // SMTP account password


    $mailer->AddAddress($email, $fullname);

   $mailer->Subject = "Welcome to www.satrafficupdates.co.za";

    $mailer->From = "info@satrafficupdates.co.za";



  
    $message = "Hello " . $fullname . "<br/>" .
            "Welcome! Your registration  with www.satrafficupdates.co.za is completed.<br/>" .
            "<br/><br/>" .
            "Regards,<br/>" .
            "Webmaster <br/>" .
            'www.satrafficupdates.co.za';

    $mailer->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

    $mailer->MsgHTML($message);

    if (!$mailer->Send()) {
        echo($mailer->ErrorInfo);
        return false;
    }
    return true;
}

function SendAdminIntimationOnRegComplete($email, $fullname) {

    $mailer = new PHPMailer();

    $mailer->CharSet = 'utf-8';

    $mailer->AddAddress('masande@globalimsa.com', 'Masande Mbondwana');

    $mailer->Subject = "Registration Completed: " . $fullname;

    $mailer->From = "info@satrafficupdates.co.za";

    $mailer->Body = "A new user registered at www.satrafficupdates.co.za" . "\r\n" .
            "Name: " . $fullname . "\r\n" .
            "Email address: " . $email . "\r\n";

    if (!$mailer->Send()) {
        return false;
    }
    return true;
}
?>


