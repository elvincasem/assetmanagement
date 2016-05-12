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
	
	
	//save supplier
	if($_POST['action'] == "savesupplier"){

		$conn = dbConnect();
		$suppliername = $_POST['suppliername'];
		$address = $_POST['address'];
		$contactno = $_POST['contactno'];
		//return "ok";
		$sqlinsert = "INSERT INTO suppliers(supName,address,contactNo) VALUES('$suppliername','$address',$contactno)";
		$save = $conn->prepare($sqlinsert);
		$save->execute();
		$conn = null;

	}
	//get single supplier
	if($_POST['action'] == "getsupplier"){

		$conn = dbConnect();
		$supplierno = $_POST['supplierno'];
		$sqlselect = "SELECT * FROM suppliers where supplierID=$supplierno";
		$stmt = $conn->prepare($sqlselect);
		$stmt->execute();
		$rows = $stmt->fetchAll();
		//print_r($rows[0]);
		echo json_encode($rows[0]);
		//echo $sqlselect;
		$conn = null;
	}
	//update item
	if($_POST['action'] == "updatesupplier"){

		$conn = dbConnect();
		$supplierid = $_POST['supplierid'];
		$suppliername = $_POST['suppliername'];
		$address = $_POST['address'];
		$contactno = $_POST['contactno'];
		
		$sqlupdate = "UPDATE suppliers set supName = '$suppliername', address = '$address', contactno = '$contactno' where supplierID=$supplierid";
		//echo $sqlupdate;
		$update = $conn->prepare($sqlupdate);
		$update->execute();
		$conn = null;
	}
	//delete supplier
	if($_POST['action'] == "deletesupplier"){
		$conn = dbConnect();
		$supplierid = $_POST['supplierid'];
		$sqldelete = "DELETE FROM suppliers where supplierID='$supplierid'";
		$delete = $conn->prepare($sqldelete);
		$delete->execute();
		$conn = null;

	}
	
?>