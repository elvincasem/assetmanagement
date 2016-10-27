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
                                <li class="active"><a href="#home" data-toggle="tab">Requisition</a>
                                </li>
                                <li><a href="#profile" data-toggle="tab">Inventory</a>
                                </li>
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <div class="row">
				<div class="col-lg-12">
				<div class="panel panel-default">
						<div class="panel-heading">
						 Requisition Transactions
						</div>
				<div class="panel-body">
                                    <div class="dataTable_wrapper">
													<table class="table table-striped table-bordered table-hover" id="dataTables-example">
														<thead>
															<tr>
																<th>Description</th>
																<th>Unit</th>
																<th>Cost</th>
																<th>QTY</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															
															
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
											<div class="panel-heading">
											  Inventory Transactions
											</div>
								<div class="panel-body">
												<div class="dataTable_wrapper">
													<table class="table table-striped table-bordered table-hover" id="dataTables-example2">
														<thead>
															<tr>
																<th>Description</th>
																<th>Unit</th>
																<th>Cost</th>
																<th>QTY</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															
															
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
        $('#dataTables-example2').DataTable({
                responsive: true
        });
    });
	
    </script>
	
	
<?php
include('footer.php');
?>