<?php
session_start();

	$uname = $_POST['username'];
	$pwd = $_POST['password'];
	require_once 'db_connection.php';
	$conn = dbConnect();
	
	if($uname !="" && $pwd != ""){
		//check username and password

		$sql = "SELECT * FROM users WHERE username='$uname' AND password =md5('$pwd')";
		$stmt = $conn->prepare($sql);
		$results = $stmt->execute(array($uname,$pwd));
		$rows = $stmt->fetchAll();
		$error = $stmt->errorInfo();
		//echo "valid";
		if(empty($rows)) {
	
			echo "invalid";
		}
		else {
			//print_r($rows);
			$_SESSION['userID'] = $rows[0]['userID'];
			$_SESSION['userName'] = $rows[0]['userName'];
			$_SESSION['userType'] = $rows[0]['userType'];
			
		}
		
	}
	else{
		
		echo "invalid";
		
	}


?>