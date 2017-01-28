<?php
include('header.php');

$reportid = $_GET['rpt'];

if($reportid==1){
	$reporttitle = "Inventory with Zero Stock Qty";
}
if($reportid==2){
	$reporttitle = "Asset Assignment List";
}

if($reportid==3){
	$reporttitle = "Requisition by Employee";
}

if($reportid==4){
	$reporttitle = "Most Requested Item";
}



?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-print fa-1x"></i> <?php echo $reporttitle;?>
						<div class="pull-right">
							
							<a href="printreport.php?reportid=<?php echo $reportid;?>" target="_blank">
                             <button class="btn btn-primary btn-lg">
                                <i class="fa fa-print"></i> Print
                            </button>   
							</a>
							
							<a href="xls.php?reportid=<?php echo $reportid;?>" target="_blank">
                             <button class="btn btn-primary btn-lg">
                                <i class="fa fa-download"></i> Download XLS
                            </button>   
							</a>
                         </div>
					</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			
            
            <div class="row">
				<div class="col-lg-12">
								<div class="panel panel-default">
											<div class="panel-heading">
											   
											</div>
								<div class="panel-body">
												<div class="dataTable_wrapper">
													<table class="table table-striped table-bordered table-hover" id="dataTables-example2">
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
							echo "<th>Total Qty Requested</th><th>Item</th>";
						}
						if($reportid==5){
							$reportsql = "SELECT * from items";
							echo "<th>Total Qty</th><th>Unit</th><th>Item</th>";
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
												</div>
								
								
								
								
											</div>
											
											</div><!-- table end -->
											</div><!-- panel default end-->
											
											</div> <!-- row end-->
			
			
			
			
			
        </div>
        <!-- /#page-wrapper -->

    </div>

<?php
include('footer.php');
?>