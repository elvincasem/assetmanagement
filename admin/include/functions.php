<?php
	ob_start();
	session_start();
	require 'db_connection.php';

//logout user
	if($_GET['action'] == "logout"){
		ob_start();
		session_start();
		session_unset();
		session_destroy();
		//echo "Log";
		echo "loggedout";
	}

//list rows and columns sql
function selectListSQL($q){
	
	$conn = dbConnect();
	$stmt = $conn->prepare($q);
	$stmt->execute();
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $rows;
	$conn = null;
	
}
	
//return single value sql
function singleSQL($q){
	$conn = dbConnect();
	$stmt = $conn->prepare($q);
	$stmt->execute();
	$rows = $stmt->fetch();
	return $rows[0];
	$conn = null;
}

	//save requisition
	if($_POST['action'] == "saverequisition"){

		$conn = dbConnect();
		$rdate = $_POST['rdate'];
		$rno = $_POST['rno'];
		$requesterid = $_POST['requesterid'];
		$userid = $_SESSION['userID'];

		$sqlinsert = "INSERT INTO requisition_details(requisition_no,requisition_date,eid,userID) VALUES('$rno','$rdate','$requesterid','$userid')";
		$save = $conn->prepare($sqlinsert);
		$save->execute();
		
		//get last id
		$sqlselect = "SELECT MAX(reqid) AS lastid FROM requisition_details WHERE requisition_no='$rno'";
		$stmt = $conn->prepare($sqlselect);
		$stmt->execute();
		$lastid = $stmt->fetch(PDO::FETCH_ASSOC);
		echo $lastid['lastid'];
		//echo $sqlselect;
		$conn = null;

	}

	//delete requisition
	if($_POST['action'] == "deleterequisition"){
		$conn = dbConnect();
		$reqid = $_POST['reqid'];
		$sqldelete = "DELETE FROM requisition_details where reqid='$reqid'";
		$delete = $conn->prepare($sqldelete);
		$delete->execute();
		echo $sqldelete;
		$conn = null;

	}
	
	//save item
	if($_POST['action'] == "saveitem"){

		$conn = dbConnect();
		$description = $_POST['description'];
		$unit = $_POST['unit'];
		$unitcost = $_POST['unitcost'];
		if($unitcost == ""){
			$unitcost = 0.00;
		}
		$pcperunit = $_POST['pc_per_unit'];
		$category = $_POST['category'];
		$supplier = $_POST['supplier'];
		$brand = $_POST['brand'];
		//return "ok";

		$sqlinsert = "INSERT INTO items(description,category,unit,unitcost,supplierID,brand) VALUES('$description','$category','$unit',$unitcost,'$supplier','$brand')";
		$save = $conn->prepare($sqlinsert);
		$save->execute();
		//echo $sqlinsert;
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
		//$pcperunit = $_POST['pc_per_unit'];
		$unit = $_POST['unit'];
		$cost = $_POST['unitcost'];
		$category = $_POST['category'];
		$supplier = $_POST['supplier'];
		$brand = $_POST['brand'];
		$sqlupdate = "UPDATE items set description = '$desc', unit = '$unit', unitCost = $cost, category='$category', supplierID =$supplier, brand='$brand' where itemNo=$itemno";
		//echo $sqlupdate;
		$update = $conn->prepare($sqlupdate);
		$update->execute();
		$conn = null;
	}
	
	//get single item
	if($_POST['action'] == "getitem"){

		$conn = dbConnect();
		$itemno = $_POST['itemno'];
		$sqlselect = "SELECT itemNo,description,category,unit,unitCost,inventory_qty,items.supplierID,COALESCE(supName,'') AS supName, brand FROM items LEFT JOIN suppliers ON items.supplierID = suppliers.supplierID WHERE itemNo=$itemno";
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
		$sqlinsert = "INSERT INTO suppliers(supName,address,contactNo) VALUES('$suppliername','$address','$contactno')";
		//echo "INSERT INTO suppliers(supName,address,contactNo) VALUES('$suppliername','$address','$contactno')";
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
	//save employee
	if($_POST['action'] == "saveemployee"){

		$conn = dbConnect();
		$employeeno = $_POST['employeeno'];
		$lname = $_POST['lname'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$ename = $_POST['ename'];
		$designation = $_POST['designation'];
		//return "ok";
		$sqlinsert = "INSERT INTO employee(empNo,lname,fname,mname,ename,designation) VALUES('$employeeno','$lname','$fname','$mname','$ename','$designation')";
		$save = $conn->prepare($sqlinsert);
		$save->execute();
		$conn = null;
		echo "employee added";

	}
	//get single employee
	if($_POST['action'] == "getemployee"){

		$conn = dbConnect();
		$eid = $_POST['eid'];
		$sqlselect = "SELECT * FROM employee where eid=$eid";
		$stmt = $conn->prepare($sqlselect);
		$stmt->execute();
		$rows = $stmt->fetchAll();
		//print_r($rows[0]);
		echo json_encode($rows[0]);
		//echo $sqlselect;
		$conn = null;
	}
	//update employee
	if($_POST['action'] == "updateemployee"){

		$conn = dbConnect();
		$eid = $_POST['eid'];
		$employeeno = $_POST['employeeno'];
		$lname = $_POST['lname'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$ename = $_POST['ename'];
		$designation = $_POST['designation'];
		
		$sqlupdate = "UPDATE employee set empNo = '$employeeno', lname = '$lname', fname = '$fname', mname = '$mname', ename = '$ename', designation = '$designation' where eid=$eid";
		echo $sqlupdate;
		$update = $conn->prepare($sqlupdate);
		$update->execute();
		$conn = null;
	}
	//delete employee
	if($_POST['action'] == "deleteemployee"){
		$conn = dbConnect();
		$eid = $_POST['eid'];
		$sqldelete = "DELETE FROM employee where eid='$eid'";
		$delete = $conn->prepare($sqldelete);
		$delete->execute();
		$conn = null;

	}
	//get last pr number
	
	if($_POST['action'] == "getlastpr"){
		
		$conn = dbConnect();
		$lastprid = $conn->prepare("SELECT prNo FROM pr_list ORDER BY transID DESC limit 1");
		$lastprid->execute();
		$result = $lastprid->fetch(PDO::FETCH_ASSOC);
		$lastpriddb = $result['prNo'];
		echo $lastpriddb;
		$conn = null;

	}
	//save pr
	if($_POST['action'] == "savepr"){

		$conn = dbConnect();
		$prnumber = $_POST['prnumber'];
		$department = $_POST['department'];
		$office = $_POST['office'];
		$requestdate = $_POST['requestdate'];
		$purpose = $_POST['purpose'];
		
		//return "ok";
		$sqlinsert = "INSERT INTO pr_list(prNo,department,section,prDate,purpose) VALUES('$prnumber','$department','$office','$requestdate','$purpose')";
		$save = $conn->prepare($sqlinsert);
		$save->execute();
		$conn = null;
		echo $sqlinsert;

	}
	//save user
	if($_POST['action'] == "saveuser"){

		$conn = dbConnect();
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		//return "ok";
		$sqlinsert = "INSERT INTO users(userName,password,userType,status) VALUES('$username',MD5('$password'),'staff','1')";
		$save = $conn->prepare($sqlinsert);
		$save->execute();
		$conn = null;
		echo "user added";

	}
	
	//delete user
	if($_POST['action'] == "deleteuser"){
		$conn = dbConnect();
		$userid = $_POST['userid'];
		$sqldelete = "DELETE FROM users where userID='$userid'";
		//echo $sqldelete;
		$delete = $conn->prepare($sqldelete);
		$delete->execute();
		$conn = null;

	}
	
	//get unit in inventory module
	if($_POST['action'] == "getunitinventory"){

		$conn = dbConnect();
		$itemno = $_POST['itemno'];
		$sqlselect = "SELECT unit FROM items where itemNo=$itemno";
		$stmt = $conn->prepare($sqlselect);
		$stmt->execute();
		$rows = $stmt->fetchAll();
		//print_r($rows[0]);
		echo json_encode($rows[0]);
		//echo $sqlselect;
		$conn = null;
	}
	
	//save inventory
	if($_POST['action'] == "saveinventory"){

		$conn = dbConnect();
		$itemno = $_POST['itemno'];
		$unit = $_POST['unit'];
		$qty = $_POST['qty'];
		$datereceived = $_POST['datereceived'];
		$drno = $_POST['drno'];
		
		//return "ok";
		$sqlinsert = "INSERT INTO inventory(itemNo,unit,qty,datereceived,drno) VALUES($itemno,'$unit',$qty,'$datereceived','$drno')";
		$save = $conn->prepare($sqlinsert);
		$save->execute();
		
		
		/*
		//get current inventory
		$conn2 = dbConnect();
		$currentinventoryqty = $conn2->prepare("SELECT inventory_qty FROM items where itemNo=$itemno ");
		$currentinventoryqty->execute();
		$result = $lastqty->fetch(PDO::FETCH_ASSOC);
		$current_qty = $result['inventory_qty'];
		
		
		
		$sqlselect = "SELECT inventory_qty FROM items where itemNo=$itemno limit 1";
		$stmt = $conn->prepare($sqlselect);
		$stmt->execute();
		$rows = $stmt->fetchAll();
		//print_r($rows);
		$current_qty = $rows[0]['inventory_qty'];
		//echo $current_qty;
		
		
		$latest_qty = $current_qty + $qty;
		//update item qty
		$sqlupdate = "UPDATE items set inventory_qty = $latest_qty where itemNo=$itemno";
		$update = $conn->prepare($sqlupdate);
		$update->execute();
		
		$conn = null;
		echo "inventory added";  */

	}
	
	//delete inventory
	if($_POST['action'] == "deleteinventory"){
		$conn = dbConnect();
		$inventoryid = $_POST['inventoryid'];
		$sqldelete = "DELETE FROM inventory where inventoryid='$inventoryid'";
		$delete = $conn->prepare($sqldelete);
		$delete->execute();
		$conn = null;

	}
	
	//getselected charge
	if($_POST['action'] == "getitemunit"){
		
		$conn = dbConnect();
		$itemid = $_POST['itemid'];
		
		
		
		$sqlselect = "SELECT * FROM items where itemNo=$itemid";
		$stmt = $conn->prepare($sqlselect);
		$stmt->execute();
		$rows = $stmt->fetch(PDO::FETCH_ASSOC);
		
		
		
		
		//search if there is conversion
		$sqlselect = "SELECT count(*) as conversion FROM items_buom where itemNo=$itemid";
		$stmt = $conn->prepare($sqlselect);
		$stmt->execute();
		$conversion = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($conversion['conversion']>0){
			$sqlselect2 = "SELECT equiv_unit,base_qty,base_unit FROM items_buom where itemNo=$itemid";
			$stmt2 = $conn->prepare($sqlselect2);
			$stmt2->execute();
			$additional = $stmt2->fetchAll(PDO::FETCH_ASSOC);
			//echo json_encode($rows);
			$conn = null;
			$merge = array_merge($rows, $additional); 
			echo json_encode($merge);
		}
		else{
			echo json_encode($rows);
			//print_r($rows[0]);
			//echo json_encode($rows);
			//echo $sqlselect;
			//$conn = null;
		}
		

		
	}
	
	
	
	if($_POST['action'] == "additemtolist"){

		$conn = dbConnect();
		$reqid = $_POST['reqid'];
		$requisition_no = $_POST['requisition_no'];
		$itemno = $_POST['itemno'];
		$iunit = $_POST['iunit'];
		$qty = $_POST['qty'];
		
		//return "ok";
		$sqlinsert = "INSERT INTO requisition_items(requisition_no,itemno,unit,qty) VALUES('$requisition_no',$itemno,'$iunit',$qty)";
		$save = $conn->prepare($sqlinsert);
		$save->execute();
		echo $sqlinsert;
		
		$conn = null;
		//echo "item added";

	}
	
	
	//update item
	if($_POST['action'] == "updatereq"){

		$conn = dbConnect();
		$reqid = $_POST['reqid'];
		$reqno = $_POST['reqno'];
		$old_reqno = $_POST['old_reqno'];
		$reqdate = $_POST['reqdate'];
		$requester_id = $_POST['requester_id'];
		$req_status = $_POST['req_status'];
		
		
		//update details
		$sqlupdate = "UPDATE requisition_details set requisition_no = '$reqno', requisition_date = '$reqdate', eid = $requester_id, requisition_status='$req_status' where reqid='$reqid'";
		$update = $conn->prepare($sqlupdate);
		$update->execute();
		//echo $sqlupdate;
		//update items
		$sqlupdate2 = "UPDATE requisition_items set requisition_no = '$reqno' where requisition_no='$old_reqno'";
		$update2 = $conn->prepare($sqlupdate2);
		$update2->execute();
		
		
		$conn = null;
	}
	
	//update item inventory qty when update_status 0
	if($_POST['action'] == "updateinventory"){

		$conn = dbConnect();
		$reqno = $_POST['requisition_no'];
		
		//select all items from reqitems
		$sqlselect2 = "SELECT * FROM requisition_items WHERE requisition_no='$reqno' AND update_status=0";
		$stmt2 = $conn->prepare($sqlselect2);
		$stmt2->execute();
		$reqitems = $stmt2->fetchAll(PDO::FETCH_ASSOC);

		foreach ($reqitems as $rows => $link) {
			
			$itemno = $link['itemno'];
			$req_unit = $link['unit'];
			$req_qty = $link['qty'];
			
			//compare current unit is the same as the item base unit

			$baseunitmeasure = $conn->prepare("SELECT unit,inventory_qty FROM items WHERE itemNo=$itemno");
			$baseunitmeasure->execute();
			$result = $baseunitmeasure->fetch(PDO::FETCH_ASSOC);
			$baseunit = $result['unit'];
			$inventory = $result['inventory_qty'];
			
			if($baseunit == $req_unit){
				//no conversion of units
				
				//update items inventory
				$updatedvalue = $inventory - $req_qty;
				
				
				//update item status
			}else{
				
				//get convertion equivalent
				$convertionequiv = $conn->prepare("SELECT base_qty FROM items_buom where itemNo=$itemno and equiv_unit='$req_unit'");
				$convertionequiv->execute();
				$equiv = $convertionequiv->fetch(PDO::FETCH_ASSOC);
				$equiv_qty = $equiv['base_qty'];
				
				$subtotal = $equiv_qty * $req_qty;
				$updatedvalue = $inventory - $subtotal;
				
				
			}
				//update inventory per item
				$sqlupdate = "UPDATE items set inventory_qty=$updatedvalue where itemNo=$itemno";
				$update = $conn->prepare($sqlupdate);
				$update->execute();
				
				//update status requisition per item
				$sqlupdate = "UPDATE requisition_items set update_status=1 where itemNo=$itemno AND requisition_no='$reqno'";
				$update = $conn->prepare($sqlupdate);
				$update->execute();
			
			
			echo $sqlupdate;
			
			
			
		}
		
		
		//$sqlupdate = "UPDATE requisition_details set requisition_no = '$reqno', requisition_date = '$reqdate', eid = $requester_id where requisition_no='$reqno'";
		//echo $sqlupdate;
		
		$conn = null;
	}
	
		//deleteitemreq
	if($_POST['action'] == "deleteitemreq"){
		$conn = dbConnect();
		$reqitem = $_POST['reqitem'];
		$sqldelete = "DELETE FROM requisition_items where reqitemsid='$reqitem'";
		$delete = $conn->prepare($sqldelete);
		$delete->execute();
		$conn = null;
	}
	
	
	if($_POST['action'] == "saveuom"){

		$conn = dbConnect();
		$itemno = $_POST['itemno'];
		$uomqty = $_POST['uomqty'];
		$uomunit = $_POST['uomunit'];
		$uombaseqty = $_POST['uombaseqty'];
		$uombaseunit = $_POST['uombaseunit'];
		
		//return "ok";
		$sqlinsert = "INSERT INTO items_buom(itemNo,base_qty,base_unit,equiv_qty,equiv_unit) VALUES('$itemno','$uombaseqty','$uombaseunit','$uomqty','$uomunit')";
		$save = $conn->prepare($sqlinsert);
		$save->execute();
		echo $sqlinsert;
		
		$conn = null;
		//echo "item added";

	}
	
			//delete uom
	if($_POST['action'] == "deleteuom"){
		$conn = dbConnect();
		$uom_id = $_POST['uom_id'];
		$sqldelete = "DELETE FROM items_buom where item_buom_id='$uom_id'";
		$delete = $conn->prepare($sqldelete);
		$delete->execute();
		$conn = null;
	}
	
	//update inventory when added in inventory module
	if($_POST['action'] == "updateinventory_inv"){

		$conn = dbConnect();
		$inventoryno = $_POST['inventoryno'];
		
		
		//select all items from reqitems
		$sqlselect2 = "SELECT * FROM inventory WHERE inventoryid='$inventoryno'";
		$stmt2 = $conn->prepare($sqlselect2);
		$stmt2->execute();
		$reqitems = $stmt2->fetch(PDO::FETCH_ASSOC);
		
		//foreach ($reqitems as $rows => $link) {
			
			$itemno = $reqitems['itemNo'];
			$inv_unit = $reqitems['unit'];
			$inv_qty = $reqitems['qty'];
			
			//compare current unit is the same as the item base unit

			$baseunitmeasure = $conn->prepare("SELECT unit,inventory_qty FROM items WHERE itemNo=$itemno");
			$baseunitmeasure->execute();
			$result = $baseunitmeasure->fetch(PDO::FETCH_ASSOC);
			$baseunit = $result['unit'];
			$inventory = $result['inventory_qty'];
			
			if($baseunit == $inv_unit){
				//no conversion of units
				
				//update items inventory
				$updatedvalue = $inventory + $inv_qty;
				
				
				//update item status
			}else{
				
				//get convertion equivalent
				$convertionequiv = $conn->prepare("SELECT base_qty FROM items_buom where itemNo=$itemno and equiv_unit='$inv_unit'");
				$convertionequiv->execute();
				$equiv = $convertionequiv->fetch(PDO::FETCH_ASSOC);
				$equiv_qty = $equiv['base_qty'];
				
				$subtotal = $equiv_qty * $inv_qty;
				$updatedvalue = $inventory + $subtotal;
				
				
			}
				//update inventory per item
				$sqlupdate = "UPDATE items set inventory_qty=$updatedvalue where itemNo=$itemno";
				$update = $conn->prepare($sqlupdate);
				$update->execute();
				
				//update status requisition per item
				$sqlupdate = "UPDATE inventory set status=1 where inventoryid='$inventoryno'";
				$update = $conn->prepare($sqlupdate);
				$update->execute();
			
			
			echo $sqlupdate;
			
			
			
		//}
		
		$conn = null;
	}
	
	if($_POST['action'] == "saveequipment"){

		$conn = dbConnect();
		$propertyno = $_POST['propertyno'];
		$article = $_POST['article'];
		$particulars = $_POST['particulars'];
		$dateacquired = $_POST['dateacquired'];
		$cost = $_POST['cost'];
		$eid = $_POST['eid'];
		$classification = $_POST['classification'];
		$accountcode = $_POST['accountcode'];
		$tagno = $_POST['tagno'];
		$service = $_POST['service'];
		$whereabout = $_POST['whereabout'];
		$remarks = $_POST['remarks'];
		$supplierid = $_POST['supplierid'];
		
		$processor = $_POST['processor'];
		$ram = $_POST['ram'];
		$hd = $_POST['hd'];
		$os = $_POST['os'];
		$equipsn = $_POST['equipsn'];
		$processorsn = $_POST['processorsn'];
		$monitorsn = $_POST['monitorsn'];
		$keyboardsn = $_POST['keyboardsn'];
		$mousesn = $_POST['mousesn'];
		
		
		if($cost == ""){
			$cost = 0.00;
		}

		$sqlinsert = "INSERT INTO equipments(propertyNo,article,particulars,dateacquired,totalcost,eid,classification,accountcode,service,whereabout,remarks,inventorytag,supplierID) VALUES('$propertyno','$article','$particulars','$dateacquired','$cost','$eid','$classification','$accountcode','$service','$whereabout','$remarks','$tagno','$supplierid')";
		$save = $conn->prepare($sqlinsert);
		$save->execute();
		//echo $sqlinsert;
		
		//get last id
		$sqlselect = "SELECT MAX(equipno) AS lastid FROM equipments";
		$stmt = $conn->prepare($sqlselect);
		$stmt->execute();
		$lastid = $stmt->fetch(PDO::FETCH_ASSOC);
		$currentid = $lastid['lastid'];
		
		
		//insert details
		$sqlinsert = "INSERT INTO equipments_details(equipNo,processor,ram,hd,operatingsystem,equipsn,processorsn,monitorsn,keyboardsn,mousesn) values('$currentid','$processor','$ram','$hd','$os','$equipsn','$processorsn','$monitorsn','$keyboardsn','$mousesn')";
		$save = $conn->prepare($sqlinsert);
		$save->execute();
		
		echo $sqlinsert;
		
		
		
		
		$conn = null;

	}
	
//get last id
	if($_POST['action'] == "checkduplicaterno"){
			$rno = $_POST['rno'];
			//echo $rno;
			$conn = dbConnect();
			$sqlselect = "SELECT count(*) as duplicate FROM requisition_details WHERE requisition_no='$rno'";
			$stmt = $conn->prepare($sqlselect);
			$stmt->execute();
			$lastid = $stmt->fetch(PDO::FETCH_ASSOC);
			echo $lastid['duplicate'];
			$conn = null;
	}
	
	//delete item
	if($_POST['action'] == "deleteequip"){
		$conn = dbConnect();
		$equipno = $_POST['equipno'];
		$sqldelete = "DELETE FROM equipments where equipNo='$equipno';DELETE FROM equipments_details where equipNo='$equipno';";
		$delete = $conn->prepare($sqldelete);
		$delete->execute();
		$conn = null;

	}

if($_POST['action'] == "saveequipdetails"){

		$conn = dbConnect();
		
		
		
		
		
		$equipmentid = $_POST['equipmentid'];
		$eid = $_POST['eid'];
		$processor = $_POST['processor'];
		$ram = $_POST['ram'];
		$hd = $_POST['hd'];
		$os = $_POST['os'];
		$brand = $_POST['brand'];
		$color = $_POST['color'];
		$others = $_POST['others'];
		
		
		
		//check if with record
		$sqlselect = "SELECT count(*) AS withrecord FROM equipments_details where equipNo=$equipmentid";
		$stmt = $conn->prepare($sqlselect);
		$stmt->execute();
		$lastid = $stmt->fetch(PDO::FETCH_ASSOC);
		$withrecord = $lastid['withrecord'];
		echo $withrecord;
		if($withrecord==0){
			//insert
			$sqlinsert = "INSERT INTO equipments_details(equipNo,eid,processor,ram,hd,operatingsystem,brand,color,others) VALUES('$equipmentid','$eid','$processor','$ram','$hd','$os','$brand','$color','$others')";
			$save = $conn->prepare($sqlinsert);
			$save->execute();
			
		}else{
			//update
			//update inventory per item
				$sqlupdate = "UPDATE equipments_details set eid='$eid',processor='$processor',ram='$ram',hd='$hd', operatingsystem='$operatingsystem',brand='$brand',color='$color',others='$others' where equipNo='$equipmentid'";
				$update = $conn->prepare($sqlupdate);
				$update->execute();
				
				echo $sqlupdate;
		}
		
	
		$conn = null;

	}	
//get single equipment
	if($_POST['action'] == "getequipment"){

		$conn = dbConnect();
		$equipno = $_POST['equipno'];
		$sqlselect = "SELECT * FROM equipments LEFT JOIN suppliers ON equipments.supplierID = suppliers.supplierID LEFT JOIN equipments_details ON equipments.equipNo = equipments_details.equipNo LEFT JOIN employee ON equipments.eid = employee.eid WHERE equipments.equipNo='$equipno'";
		$stmt = $conn->prepare($sqlselect);
		$stmt->execute();
		$rows = $stmt->fetchAll();
		//print_r($rows[0]);
		echo json_encode($rows[0]);
		
		$conn = null;
	}
	
	//get last id
	if($_POST['action'] == "checkduplicatepropertyno"){
			$propertyno = $_POST['propertyno'];
			//echo $rno;
			$conn = dbConnect();
			$sqlselect = "SELECT COUNT(*) AS duplicate FROM equipments WHERE propertyNo='$propertyno'";
			$stmt = $conn->prepare($sqlselect);
			$stmt->execute();
			$lastid = $stmt->fetch(PDO::FETCH_ASSOC);
			echo $lastid['duplicate'];
			//echo $sqlselect;
			$conn = null;
	}
	
	if($_POST['action'] == "updateequipment"){

		$conn = dbConnect();
		$equipno = $_POST['equipno'];
		$propertyno = $_POST['propertyno'];
		$article = $_POST['article'];
		$particulars = $_POST['particulars'];
		$dateacquired = $_POST['dateacquired'];
		$cost = $_POST['cost'];
		$eid = $_POST['eid'];
		$classification = $_POST['classification'];
		$accountcode = $_POST['accountcode'];
		$tagno = $_POST['tagno'];
		$service = $_POST['service'];
		$whereabout = $_POST['whereabout'];
		$remarks = $_POST['remarks'];
		$supplierid = $_POST['supplierid'];
		
		$processor = $_POST['processor'];
		$ram = $_POST['ram'];
		$hd = $_POST['hd'];
		$os = $_POST['os'];
		$equipsn = $_POST['equipsn'];
		$processorsn = $_POST['processorsn'];
		$monitorsn = $_POST['monitorsn'];
		$keyboardsn = $_POST['keyboardsn'];
		$mousesn = $_POST['mousesn'];
		
		if($cost == ""){
			$cost = 0.00;
		}

		$sqlinsert = "UPDATE  equipments SET propertyNo='$propertyno',article='$article',particulars='$particulars',dateacquired='$dateacquired',totalcost='$cost',eid='$eid',classification='$classification',accountcode='$accountcode',service='$service',whereabout='$whereabout',remarks='$remarks',inventorytag='$tagno',supplierID='$supplierid' WHERE equipNo='$equipno'; UPDATE equipments_details SET processor='$processor', ram='$ram', hd='$hd',operatingsystem='$os',equipsn='$equipsn', processorsn='$processorsn',monitorsn='$monitorsn',keyboardsn='$keyboardsn',mousesn='$mousesn' WHERE equipNo='$equipno'";
		$save = $conn->prepare($sqlinsert);
		$save->execute();
		//echo $sqlinsert;
		
		/*get last id
		$sqlselect = "SELECT MAX(equipno) AS lastid FROM equipments";
		$stmt = $conn->prepare($sqlselect);
		$stmt->execute();
		$lastid = $stmt->fetch(PDO::FETCH_ASSOC);
		echo $lastid['lastid'];
		*/
		$conn = null;

	}
?>