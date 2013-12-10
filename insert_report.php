<?
session_start();
if (isset($_POST['submit'])) {
// database connection
require_once 'config/database.php';
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

// new data
$id = 0;
$date = date('y-m-d  h:i:s');
$subject = trim($_POST['subject']);
$location = trim($_POST['location']);
$details = mysql_real_escape_string($_POST['details']);
$username = trim($_SESSION['username']);
$status = 0;

if($subject == null || $subject == ""){
    
     $_SESSION['error'] = 'Error the report was not sent';
    header('location:index.php?page=report');
     exit();
}
if($location == null || $location == ""){
    
     $_SESSION['error'] = 'Error the report was not sent';
    header('location:index.php?page=report');
     exit();
}
if($details == null || $details == ""){
    
     $_SESSION['error'] = 'Error the report was not sent';
    header('location:index.php?page=report');
     exit();
}

// query
$sql = "INSERT INTO reports VALUES (:id,:date,:subject,:location,:details,:username,:status)";
$q = $conn->prepare($sql);
$q->execute(array(
    ':id' => $id,
    ':date' => $date,
    ':subject' => $subject,
    ':location' => $location,
    ':details' => $details,
    ':username' => $username,
    ':status' => $status));

if ($sql == true) { 
    $_SESSION['success'] = 'The report was sent successfull';
    header('location:index.php?page=report');
    echo '<script> window.location="http://satrafficupdates.co.za/index.php?page=report"; </script>';
   
     exit();
} else {
    $_SESSION['error'] = 'Error the report was not sent';
     
    header('location:index.php?page=report');
    echo '<script> window.location="http://satrafficupdates.co.za/index.php?page=report"; </script>';
     exit();
}

}
?>