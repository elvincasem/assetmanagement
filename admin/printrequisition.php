<?php
include_once("include/functions.php");	

$conn = dbConnect();
		$reqid = $_GET['reqid'];
		$sqlselect = "SELECT reqid,requisition_no, requisition_date, CONCAT(employee.fname,' ',employee.lname) AS fullname,employee.eid , employee.designation FROM requisition_details LEFT JOIN employee 
ON requisition_details.eid = employee.eid where reqid='$reqid'";
		$stmt = $conn->prepare($sqlselect);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		//echo $sqlselect;
		$rid = $row['reqid'];
		$rno = $row['requisition_no'];
		$rdate = $row['requisition_date'];
		$efullname = $row['fullname'];
		$edesignation = $row['designation'];
		$eid = $row['eid'];
		$conn = null;




?>
<!DOCTYPE html>
<html>
  <head>
   <style>
html, body {
    font-family:arial;
}

html {
    display: table;
    margin: auto;
}

body {
	width:100%;
    display: table-cell;
    vertical-align: middle;
	font-size: 20px;
}
   </style>
	
	<script>
	
	window.print();
	
	</script>
	
	
  </head>
  
  <body>
  <div id="page-wrap">
	<div style="text-align:right;">Annex G-9</div>
	<table border="3" width="1180">
	<tr>
		<td colspan="6" style="text-align:center;">
			<h1>REQUISITION AND ISSUE SLIP</h1>
			<h3><i>Commission on Higher Education</i></h3>
		</td>
	
	</tr>
	
			
		
	
	<tr>
		<td colspan="2" style="text-align:center;"><br>
		Division:_________________________<br><br>
		Office: __________________________<br>
		</td>
		<td colspan="1" style="text-align:center;">
		Responsible Center <br><br>Code ___________
		</td>
		<td colspan="3" style="text-align:left;">
		<span style="text-align:left;">RIS NO. <strong><?php echo $rno;?> </strong></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date: <strong><?php echo $rdate;?></strong><br><br>
		SAI No. ______________   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date: ___________
		</td>
		
	
			
	
		
	</tr>
	

	
	</table>
	
	<table border="1" width="1180">
	<td colspan="6">
			<center><strong>Requisition</strong><span style="padding-left:600px;">&nbsp;</span> <strong>Issuance</strong></center>
		</td></tr>
	</div>
	</table>
	
   <table border="1" width="1180">
   
   </tr>
	
   <tr>
		
		
		<td colspan="1" style="text-align:center;vertical-align:top;">
		Stock No:
		</td>
		<td colspan="1" style="text-align:center;">
		Unit
		</td>
		<td colspan="1" style="text-align:center;">
		Description
		</td>
		<td colspan="1" style="text-align:center;">
		Quantity
		</td>
		<td colspan="1" style="text-align:center;">
		Quantity
		</td>
		<td colspan="1" style="text-align:center;">
		Remarks
		</td>
	

	
   
	</tr>	
	
	
<?php
								
	$item_list = selectListSQL("SELECT items.description, requisition_items.unit, requisition_items.qty, requisition_items.update_status,requisition_items.reqitemsid FROM requisition_items
INNER JOIN items ON requisition_items.itemno = items.itemNo WHERE requisition_no='$rno'");
	foreach ($item_list as $rows => $link) {
		$idescription = $link['description'];
		$iunit = $link['unit'];
		$iqty = $link['qty'];
		$reqitemsid = $link['reqitemsid'];
		
		echo "<tr>";
		echo "<td colspan='1' style='text-align:center;vertical-align:top;'>
		<h1></h1></td>";
		echo "<td colspan='1' style='text-align:center;'>
		<strong>$iunit</strong></td>";
		echo "<td colspan='1' style='text-align:center;'>
		<strong>$idescription</strong></td>";
		echo "<td colspan='1' style='text-align:center;'>
		<strong>$iqty</strong></td>";
		echo "<td colspan='1' style='text-align:center;'>
		<h1></h1></td>";
		echo "<td colspan='1' style='text-align:center;'>
		<h1></h1></td>";
		echo "</tr>";
	}
	?>
	
	
	
	
	
	
	
	
	 <tr>
		
		
		<td colspan="1" style="text-align:center;vertical-align:top;">
		<h1></h1>
		</td>
		<td colspan="1" style="text-align:center;">
		<h1></h1>
		</td>
		<td colspan="1" style="text-align:center;">
		<h1></h1>
		</td>
		<td colspan="1" style="text-align:center;">
		<h1></h1>
		</td>
		<td colspan="1" style="text-align:center;">
		<h1></h1>
		</td>
		<td colspan="1" style="text-align:center;">
		<h1></h1>
		</td>
	
	
	
   
	</tr>	
	
	</table>
	
	
	<table border="1" width="1180">
		<td colspan="6" style="text-align:left;">
		<br><br>
		Purpose:_____________________________________________________________________________________________
		</td>
	</table>
		
	<table border="1" width="1180">
	
	 <tr>
		
		
		
	
	
		
		<td colspan="2" style="text-align:center;vertical-align:top;">
		Requested by:
		<br>
		<br>
		<br>
		<strong><?php echo $efullname;?></strong>
		<br>
		<strong><?php echo $edesignation;?></strong>
		<br>
		Date: <strong><?php echo $rdate;?></strong>
		</td>
		
		
		
		<td colspan="1" style="text-align:center;vertical-align:top;">
		Approved by:
		<br>
		<br>
		<br>
		<strong>NYMPHA N. BUENNIO</strong>
		<br>
		Chief Admin. Officer
		</td>
		
		
		<td colspan="1" style="text-align:center;vertical-align:top;">
		Issued by:
		<br>
		<br>
		<br>
		<strong>ROGELIO T. GALERA, JR.</strong>
		<br>
		ES II/Supply Officer Designate
		</td>
		
		
		<td colspan="1" style="text-align:center;vertical-align:top;">
		Received by:
		</td>
		
	
	
	
   
	</tr>	
	
	
	</table>		
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		</td></tr>
	
		</table>
   
   
   
   
   </p>
  </body>
</html>