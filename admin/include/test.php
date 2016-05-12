<?php
require 'db_connection.php';

$conn = dbConnect();
		$itemno = $_GET['itemno'];
		$sqlselect = "SELECT * FROM items where itemNo=$itemno";
		$stmt = $conn->prepare($sqlselect);
		$stmt->execute();
		$rows = $stmt->fetchAll();
		//print_r($rows[0]);
		
		//$result = $stmt->get_result();
		echo json_encode($rows[0]);
		//$row = $result->fetch_row();
		//print_r($row);

?>