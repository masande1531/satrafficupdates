<?php
session_start();

include_once 'include/class.phpmailer.php';
include_once 'include/database.php';

$name = mysql_real_escape_string($_POST['name']);
$surname = mysql_real_escape_string($_POST['surname']);
$email = mysql_real_escape_string($_POST['email']);
$cell_no = mysql_real_escape_string($_POST['cell_no']);

$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);
$c_password = mysql_real_escape_string($_POST['c_password']);
$confirmcode = MakeConfirmationMd5($email);

// To Do Check the username and Email if they are not registered 
if (isset($_POST['submitted'])) {
    
    if (empty($name)) {
      $_SESSION['error'] =   " name fied required";
      header("location:index.php?page=register");
      exit;
    }
    if (empty($surname)) {
      $_SESSION['error'] =   "Surname fied required";
      header("location:index.php?page=register");
      exit;
    }
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['error'] =   "Valid email fied required";
      header("location:index.php?page=register");
      exit;
    }
     if (GetEmail($email) == true) {
      $_SESSION['error'] =   "Email already exist in the website";
      header("location:index.php?page=register");
      exit;
    }
     
     if (empty($cell_no)) {
      $_SESSION['error'] =   "Ccll number fied required";
      header("location:index.php?page=register");
      exit;
    }
    
    
    
     if (!is_numeric($cell_no)) {
      $_SESSION['error'] =   "Only numbers are required in cell No";
      header("location:index.php?page=register");
      exit;
    }
    
    if (empty($username) ) {
      $_SESSION['error'] =   "Username fied required";
      header("location:index.php?page=register");
      exit;
    }
     if (GetUsername($username) == true ) {
      $_SESSION['error'] =   "Username already exist un the website choose another one";
      header("location:index.php?page=register");
      exit;
    }
    
    
     if (empty($password)) {
      $_SESSION['error'] =   "Password fied required";
      header("location:index.php?page=register");
      exit;
    }
    if ($password != $c_password) {
      $_SESSION['error'] =   "Passwords do not match";
      header("location:index.php?page=register");
      exit;
    }
     if (strlen($password) < 6) {
      $_SESSION['error'] =   "Atleast 6 characters required in password";
      header("location:index.php?page=register");
      exit;
    }
    
    if (register($name, $surname, $email, $cell_no, $username, $password, $confirmcode)) {
        header("location:index.php?page=register_m");
        exit;
    } else {
       $_SESSION['error'] =   "Technical error occured please try again later";
      header("location:index.php?page=register");
      exit;
    }
}

function register($name, $surname, $email, $cell_no, $username, $password, $confirmcode) {



    $md5password = md5($password);

    $sql = " insert into reg values(NULL, '$name','$surname','$email','$cell_no','$username','$md5password', '$confirmcode') ";
    $query = mysql_query($sql);
    $send = SendUserConfirmationEmail($email, $name, $confirmcode);
    if ($query && $send) {
        return true;
    } else {
        return false;
    }
}

function MakeConfirmationMd5($email) {
    $randno1 = rand();
    $randno2 = rand();
    return md5($email . $randno1 . '' . $randno2);
}

function ConfirmUser() {
    if (empty($_GET['code']) || strlen($_GET['code']) <= 10) {
        $this->HandleError("Please provide the confirm code");
        return false;
    }
    $user_rec = array();
    if (!$this->UpdateDBRecForConfirmation($user_rec)) {
        return false;
    }

    $this->SendUserWelcomeEmail($user_rec);

    $this->SendAdminIntimationOnRegComplete($user_rec);

    return true;
}

function GetUserFromEmail($email, &$user_rec) {
    if (!$this->DBLogin()) {
        $this->HandleError("Database login failed!");
        return false;
    }
    $email = $this->SanitizeForSQL($email);

    $result = mysql_query("Select * from $this->tablename where email='$email'", $this->connection);

    if (!$result || mysql_num_rows($result) <= 0) {
        $this->HandleError("There is no user with email: $email");
        return false;
    }
    $user_rec = mysql_fetch_assoc($result);


    return true;
}

function IsFieldUnique($formvars, $fieldname) {
    $field_val = $this->SanitizeForSQL($formvars[$fieldname]);
    $qry = "select username from $this->tablename where $fieldname='" . $field_val . "'";
    $result = mysql_query($qry, $this->connection);
    if ($result && mysql_num_rows($result) > 0) {
        return false;
    }
    return true;
}

function SendUserConfirmationEmail($email, $name, $confirmcode) {
    
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//$mailer = new PHPMailer();


    //$mailer->IsSMTP();
    //$mailer->Host = "mail.gmims.co.za";
    //$mailer->SMTPAuth = true;                  // enable SMTP authentication
   // $mailer->Host = "mail.gmims.co.za"; // sets the SMTP server
   // $mailer->Port = 25;                    // set the SMTP port for the GMAIL server
   // $mailer->Username = "admin@gmims.co.za"; // SMTP account username
    //$mailer->Password = "minda2011";        // SMTP account password


   //$mailer->AddAddress($email, $name);

    $subject = "Your registration with www.satrafficupdates.co.za ";

   // $mailer->From = "webmaster@satrafficupdates.co.za";



    $confirm_url = GetAbsoluteURLFolder().'/index.php?page=confirm&code=' . $confirmcode;

    $message = "Hello " . $name . "<br/>" .
            "Thanks for your registration with www.satrafficupdates.co.za <br/>" .
            "Please click the link below to confirm your registration.<br/>" .
            "$confirm_url<br/>" .
            "<br/>" .
            "Regards,<br/>" .
            "Webmaster <br/>
                 www.satrafficupdates.co.za 
                 ";
    //$mailer->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

    //$mailer->MsgHTML($message);
    $mailer = mail($email, $subject, $message, $headers);
    if (!$mailer) {
        $_SESSION['error'] =  "Mail was not sent.";
      header("location:index.php?page=register");
      exit;
        return false;
    }
    return true;
    
}  
    function GetEmail($email) {


    $result = mysql_query("Select email from reg where email='$email'");

    if (!$result || mysql_num_rows($result) <= 0) {
        
        return false;
    }
    return true;
    }
    
    function GetUsername($username) {


    $result = mysql_query("Select username from reg where username='$username'");

    if (!$result || mysql_num_rows($result) <= 0) {
        
        return false;
    }
   return true;
    
}

function GetAbsoluteURLFolder() {
    $scriptFolder = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';
    $scriptFolder .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']);
    return $scriptFolder;
}
    

    


?>
