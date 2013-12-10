<?php
$host = "localhost";
$db_name = "live_traffic";
$username = "root";
$password = "mapapa1531";

try {
	$conn = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}catch(PDOException $exception){ //to handle connection error
	echo "Connection error: " . $exception->getMessage();
}
?>