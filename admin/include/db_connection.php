<?php 

function dbConnect (){
 	$conn =	null;
 	$host = 'localhost';
 	$db = 	'supply_office';
 	$user = 'root';
 	$pwd = 	's3b@ysurfc3ntr@l';
	try {
	   	$conn = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pwd);
		//echo 'Connected succesfully.<br>';
	}
	catch (PDOException $e) {
		echo '<p>Cannot connect to database !!</p>';
		echo '<p>'.$e.'</p>';
	    exit;
	}
	return $conn;
 }

?>