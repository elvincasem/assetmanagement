<?php
include('header.php');
include_once("include/functions.php");	

		$conn = dbConnect();
		$itemid = $_GET['id'];
		
		$sqlselect = "SELECT * FROM items LEFT JOIN suppliers ON items.supplierID = suppliers.supplierID WHERE itemNo='$itemid'";
		$stmt = $conn->prepare($sqlselect);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		//echo $sqlselect;
		$itemNo = $row['itemNo'];
		$description = $row['description'];
		$category = $row['category'];
		$unit = $row['unit'];
		$unitCost = $row['unitCost'];
		$inventory_qty = $row['inventory_qty'];
		$supName = $row['supName'];
		$brand = $row['brand'];
		$conn = null;
		//print_r($row);
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" style="color:green;"><i class="fa fa-money fa-1x"></i> ITEM DETAILS
						<div class="pull-right">
						<button class="btn btn-primary btn-lg" onclick="history.go(-1);">
                                <i class="fa fa-chevron-left"></i> Back to List
                            </button>
                            </div></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
			
			<!-- Modal -->
                            <div class="modal fade" id="adduom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add Unit of Measure</h4>
                                        </div>
                                        <div class="modal-body">
                                           
                                    <form role="form" id="form_item"> 
                                        <div class="form-group">
										
											<input type="hidden" id="itemno" value="<?php echo $itemid;?>">
											<div class="col-lg-4 text-right">
                                            <label>QTY</label>
											</div>
											<div class="col-lg-8 text-right">
                                            <input id="uomqty" class="form-control" tabindex="1">
											</div>
											<div class="col-lg-4 text-right">
											<label>Unit</label>
											</div>
											<div class="col-lg-8 text-right">
												<select id="uomunit" class="form-control" tabindex="6">	
												<?php
														
												$suplist = selectListSQL("SELECT * FROM items_buom_list");
												//print_r($employeelist);
												foreach ($suplist as $rows => $link) {

													echo "<option value='".$link['unit_name']."'>".$link['unit_name']."</option>";
												}
												?>
												</select>
											</div>
											
											
											<div class="col-lg-4 text-right">
											<label>Base QTY</label>	
											</div>
											<div class="col-lg-8 text-right">
                                            <input id="uombaseqty" class="form-control" value="" tabindex="1">
											</div>
											
											<div class="col-lg-4 text-right">
											<label>Base UNIT</label>	
											</div>
											<div class="col-lg-8 text-right">
											<input id="uombaseunit" class="form-control" value="<?php echo $unit;?>" disabled tabindex="1">
                                             
											</div>
											
                                        </div>
										
									</form>
										<div class="row">
										</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default simplemodal-close" data-dismiss="modal">Close</button>
                                            <button id="saveuom" type="button" class="btn btn-primary">Save and Close</button>
											
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

			<!-- end modal-->
			
			
			
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="panel panel-green">
                        <div class="panel-heading">
                           
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                  <input type="hidden" id="itemno" value="">
									<div class="col-lg-4 text-right">
									<label>Item Description:</label>
									</div>
									<div class="col-lg-8">
									<label class="itemvalues"><?php echo $description;?></label>
									</div>
									
									
									<div class="col-lg-4 text-right">
									<label>Cost:</label>
									</div>
									<div class="col-lg-8">
									<label class="itemvalues"><?php echo $unitCost;?></label>
									</div>
									
									<div class="col-lg-4 text-right">
									<label>Base Unit of Measure:</label>
									</div>
									<div class="col-lg-8">
									<label class="itemvalues"><?php echo $unit;?></label>
									</div>
									<div class="col-lg-4 text-right">
									<label>Current QTY:</label>
									</div>
									<div class="col-lg-8">
									<label class="itemvalues"><?php echo $inventory_qty;?></label>
									</div>

                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-4">
                                    <div class="col-lg-4 text-right">
                                            <label>Category:</label>
											</div>
											<div class="col-lg-8">
                                            <label class="itemvalues"><?php echo $category;?></label>
											</div>
									<div class="col-lg-4 text-right">
                                            <label>Supplier:</label>
											</div>
											<div class="col-lg-8">
                                            <label class="itemvalues"><?php echo $supName;?></label>
											</div>
											<div>&nbsp;</div>
									<div class="col-lg-4 text-right">
                                            <label>Brand:</label>
											</div>
											<div class="col-lg-8">
                                            <label class="itemvalues"><?php echo $brand;?></label>
											</div>
									
									
									
                                    
								
                                </div>
                                <!-- /.col-lg-6 (nested) -->
								
								
								
								
                        
                        <!-- /.panel-heading -->
                        
                            
								
								
								
                            </div>
                            <!-- /.row (nested) -->
							
							<!-- start item contents -->
							
                                
							
							
							
							
                        </div>
                        <!-- /.panel-body -->
						
                    </div>
                    <!-- /.panel -->
                    
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
            <!-- /.row -->
			
			
			
			
			
			<!-- tabs-->
			
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
					
                        <div class="panel-heading">
							Transactions 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
								<li class="active"><a href="#uom" data-toggle="tab">Unit of Measure</a>
                                </li>
                                <li><a href="#home" data-toggle="tab">Requisition</a>
                                </li>
                                <li><a href="#profile" data-toggle="tab">Inventory</a>
                                </li>
                                
                            </ul>

                            <!-- Tab panes -->
		<div class="tab-content">
		
		<div class="tab-pane fade in active" id="uom">
			<div class="row">
				<div class="col-lg-12">
				<div style="margin:10px;">
								<button id="adduom" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#adduom">
								<i class="fa fa-plus-circle"></i> Add UoM
							</button>

                            </div>
				<div class="panel panel-default">
						
				<div class="panel-body">
				<div class="dataTable_wrapper">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example3">
						<thead>
							<tr>
								<th>QTY</th>
								<th>Unit</th>
								<th>Base QTY</th>
								<th>Base Unit</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						<?php
													
							$suplist = selectListSQL("SELECT * FROM items_buom WHERE itemno=$itemid");
							//print_r($employeelist);
							foreach ($suplist as $rows => $link) {
								echo "<tr>";
								echo "<td>".$link['equiv_qty']."</td>";
								echo "<td>".$link['equiv_unit']."</td>";
								echo "<td>".$link['base_qty']."</td>";
								echo "<td>".$link['base_unit']."</td>";
								echo "<td><button class='btn btn-danger notification' id='notification' onClick='deleteuom(".$link['item_buom_id'].")'><i class='fa fa-times'></i></button></td>";
								echo "</tr>";
							}
						?>	
							
						</tbody>
					</table>
				</div>
								
                                    <!-- /.table-responsive -->
					</div>
                </div>
				
				</div><!--end panel-->
			
			</div> <!-- end row-->
		</div>
		
			<div class="tab-pane fade" id="home">
			<div class="row">
				<div class="col-lg-12">
				<div class="panel panel-default">
						
				<div class="panel-body">
				<div class="dataTable_wrapper">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>Requisition No</th>
								<th>Unit</th>
								<th>QTY</th>
							</tr>
						</thead>
						<tbody>
						<?php
													
							$suplist = selectListSQL("SELECT * FROM requisition_items LEFT JOIN requisition_details ON requisition_items.requisition_no = requisition_details.requisition_no WHERE itemno=$itemid");
							//print_r($employeelist);
							foreach ($suplist as $rows => $link) {
								
								$reqid2 = $link['reqid'];
								$requisition_no2 = $link['requisition_no'];
								$unit2 = $link['unit'];
								$qty2 = $link['qty'];
								echo "<tr>";
								echo "<td><a href='requisitiondetails.php?id=$reqid2'>$requisition_no2</a></td>";
								echo "<td>$unit2</td>";
								echo "<td>$qty2</td>";
								echo "</tr>";
							}
						?>	
							
						</tbody>
					</table>
				</div>
								
                                    <!-- /.table-responsive -->
					</div>
                </div>
				
				</div><!--end panel-->
			
			</div> <!-- end row-->
		</div>
								
			<div class="tab-pane fade" id="profile">
				<div class="row">
					<div class="col-lg-12">
					<div class="panel panel-default">
								
					<div class="panel-body">
						<div class="dataTable_wrapper">
							<table class="table table-striped table-bordered table-hover" id="dataTables-example4">
								<thead>
									<tr>
										<th>Inventory Id</th>
										<th>QTY</th>
										<th>Unit</th>
										<th>Date/Time</th>
									</tr>
								</thead>
								<tbody>
						<?php
													
							$suplist = selectListSQL("SELECT * from inventory WHERE itemNo=$itemid AND status=1");
							//print_r($employeelist);
							foreach ($suplist as $rows => $link) {
								
								$inventoryid = $link['inventoryid'];
								$unit3 = $link['unit'];
								$qty3 = $link['qty'];
								$datetime = $link['time_stamp'];
								echo "<tr>";
								echo "<td><a href='#?id=$reqid2'>$inventoryid</a></td>";
								echo "<td>$qty3</td>";
								echo "<td>$unit3</td>";
								echo "<td>$datetime</td>";
								echo "</tr>";
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
                                
		</div>
                        
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
			
			<!-- end tabs-->
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
        <!-- /#page-wrapper -->

    </div>
    <script>
    $(document).ready(function() {
        $('#dataTables-example4').DataTable({
                responsive: true
        });
    });
	
	$(document).ready(function() {
        $('#dataTables-example3').DataTable({
                responsive: true
        });
    });
	
    </script>
	
	
<?php
include('footer.php');
?>