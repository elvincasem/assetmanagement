<?php
	require 'db_connection.php';

//logout user
	if($_GET['action'] == "logout"){
		
		session_unset();
		session_destroy();
		echo "loggedout";
	}

//list rows and columns sql
function selectListSQL($q){
	
	$conn = dbConnect();
	$stmt = $conn->prepare($q);
	$stmt->execute();
	$rows = $stmt->fetchAll();
	return $rows;
	$conn = null;
	
}
	
	
	//save item
	if($_POST['action'] == "saveitem"){

		$conn = dbConnect();
		$description = $_POST['description'];
		$unit = $_POST['unit'];
		$unitcost = $_POST['unitcost'];
		//return "ok";

		$sqlinsert = "INSERT INTO items(description,unit,unitcost) VALUES('$description','$unit',$unitcost)";
		$save = $conn->prepare($sqlinsert);
		$save->execute();
		
		$conn = null;

	}
	
	//delete item
	if($_POST['action'] == "deleteitem"){
		$conn = dbConnect();
		$itemno = $_POST['itemno'];
		$sqldelete = "DELETE FROM items where itemNo='$itemno'";
		$delete = $conn->prepare($sqldelete);
		$delete->execute();
		$conn = null;

	}
	
	//update item
	if($_POST['action'] == "updateitem"){

		$conn = dbConnect();
		$itemno = $_POST['itemno'];
		$desc = $_POST['description'];
		$unit = $_POST['unit'];
		$cost = $_POST['unitcost'];
		$category = $_POST['category'];
		$sqlupdate = "UPDATE items set description = '$desc', unit = '$unit', unitCost = $cost, category='$category' where itemNo=$itemno";
		echo $sqlupdate;
		$update = $conn->prepare($sqlupdate);
		$update->execute();
		$conn = null;
	}
	
	//get single item
	if($_POST['action'] == "getitem"){

		$conn = dbConnect();
		$itemno = $_POST['itemno'];
		$sqlselect = "SELECT * FROM items where itemNo=$itemno";
		$stmt = $conn->prepare($sqlselect);
		$stmt->execute();
		$rows = $stmt->fetchAll();
		//print_r($rows[0]);
		echo json_encode($rows[0]);
		
		$conn = null;
	}
	
	
	
?>