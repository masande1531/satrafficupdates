<!-- include style -->
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<?php
//open database
include 'config/db_connect.php';
//include our awesome pagination
//class (library)
include 'libs/ps_pagination.php';

try {
	$conn = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}catch(PDOException $exception){ //to handle connection error
	echo "Connection error: " . $exception->getMessage();
}
//query all data anyway you want
$sql = "select * from reports ORDER BY r_id DESC";

//now, where gonna use our pagination class
//this is a significant part of our pagination
//i will explain the PS_Pagination parameters
//$conn is a variable from our config_open_db.php
//$sql is our sql statement above
//3 is the number of records retrieved per page
//4 is the number of page numbers rendered below
//null - i used null since in dont have any other
//parameters to pass (i.e. param1=valu1&param2=value2)
//you can use this if you're gonna use this class for search
//results since you will have to pass search keywords
$pager = new PS_Pagination( $conn, $sql, 5, 4, null );

//our pagination class will render new
//recordset (search results now are limited
//for pagination)
$rs = $pager->paginate(); 

//get retrieved rows to check if
//there are retrieved data
$num = $rs->rowCount();

if($num >= 1 ){     
	//creating our table header
	
	while ($row = $rs->fetch(PDO::FETCH_ASSOC)){
	
		  
		echo "<h3><a href='#'> {$row['r_subject']} </a></h3>";
		echo "{$row['r_location']}<br/>";
		echo "{$row['r_details']}<br/>";
                echo "{$row['r_date']} <br/>";
		echo '<div style="border-bottom : 1px solid grey;"></div>';
	}       
	
	
}else{
	//if no records found
	echo "No records found!";
}
//page-nav class to control
//the appearance of our page 
//number navigation
echo "<div class='page-nav'>";
	//display our page number navigation
	echo $pager->renderFullNav();
echo "</div>";

?>