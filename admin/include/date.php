<?php

require 'db_connection.php';

	
		$conn = dbConnect();
		
		$sth = $conn->prepare("SELECT ttt FROM items WHERE itemNo=6");
		$sth->execute();
		$value = $sth->fetchColumn();
		echo "$value";
	


?>