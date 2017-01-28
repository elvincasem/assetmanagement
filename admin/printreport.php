<?php
include('include/functions.php');
$reportid = $_GET['reportid'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	 <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	
	<!-- DataTables CSS -->
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
	
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
	<style>
	td{
		padding:2px !important;
	}
	</style>
</head>
	
<body>
	
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
					<?php
									
						if($reportid==1){
							$reportsql = "SELECT description,inventory_qty,unit from items where inventory_qty<=0";
							echo "<th>Description</th><th>QTY</th><th>unit</th>";
						}
						if($reportid==2){
							$reportsql = "SELECT COUNT(*) AS noofequip, CONCAT(fname,' ',lname) AS fullname FROM equipments LEFT JOIN employee ON 
equipments.eid = employee.eid GROUP BY equipments.eid";
							echo "<th>Employee</th><th>QTY</th>";
						}						
						if($reportid==3){
							$reportsql = "SELECT CONCAT(employee.fname, ' ', employee.lname) AS cname, COUNT(*) AS requisition FROM requisition_details LEFT JOIN employee ON requisition_details.eid = employee.eid GROUP BY requisition_details.eid";
							echo "<th>Employee</th><th>No. of Requisition</th>";
						}
						if($reportid==4){
							$reportsql = "SELECT SUM(qty) AS total, description FROM requisition_items LEFT JOIN items ON requisition_items.itemno = items.itemNo GROUP BY items.itemNo ORDER BY total desc";
							echo "<th width='250'>Total Qty Requested</th><th>Item</th>";
						}
						if($reportid==5){
							$reportsql = "SELECT * from items";
							echo "<th width='150' class='center'>Total Qty</th><th>Unit</th><th>Item</th>";
						}
					?>
									
									
								</tr>
							</thead>
														<tbody>
			<?php
						include_once("include/functions.php");			
						$emplist = selectListSQL($reportsql);
						foreach ($emplist as $rows => $link) {
							
							if($reportid ==1){
								echo "<tr class='odd gradeX'>";
								echo "<td>".$link['description']."</td>";
								echo "<td>".$link['inventory_qty']."</td>";
								echo "<td>".$link['unit']."</td>";
								echo "</tr>";	
							}
							if($reportid ==2){
								echo "<tr class='odd gradeX'>";
								echo "<td>".$link['noofequip']."</td>";
								echo "<td>".$link['fullname']."</td>";
								echo "</tr>";	
							}
							if($reportid ==3){
								echo "<tr class='odd gradeX'>";
								echo "<td>".$link['cname']."</td>";
								echo "<td>".$link['requisition']."</td>";
								echo "</tr>";	
							}
							if($reportid ==4){
								echo "<tr class='odd gradeX'>";
								echo "<td>".$link['total']."</td>";
								echo "<td>".$link['description']."</td>";
								echo "</tr>";	
							}
							if($reportid ==5){
								echo "<tr class='odd gradeX'>";
								echo "<td>".$link['inventory_qty']."</td>";
								echo "<td>".$link['unit']."</td>";
								echo "<td>".$link['description']."</td>";
								echo "</tr>";	
							}
							
						}
						?>
															
														</tbody>
													</table>


</body>
</html>
<script>
	window.print();
</script>