<?php
include('header.php');
include_once("include/functions.php");	

		$conn = dbConnect();
		$equipmentid = $_GET['id'];
		echo "<input type='hidden' value='$equipmentid' id='equipmentid'>";
		$sqlselect = "SELECT * FROM equipments left join suppliers on equipments.supplierID = suppliers.supplierID left join equipments_details on equipments.equipNo = equipments_details.equipNo WHERE equipments.equipNo='$equipmentid'";
		//echo $sqlselect;
		$stmt = $conn->prepare($sqlselect);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		//echo $sqlselect;
		$equipno = $row['equipNo'];
		$equipname = $row['equipName'];
		$tagno = $row['tagno'];
		$propertyno = $row['propertyno'];
		$serial = $row['serialno'];
		$unitcost = $row['unitcost'];
		$dateacquired = $row['dateacquired'];
		$category = $row['category'];
		$dateacquired = $row['dateacquired'];
		$suppliername = $row['supName'];
		$details_eid = $row['eid'];
		$details_processor = $row['processor'];
		$details_ram = $row['ram'];
		$details_hd = $row['hd'];
		$details_os = $row['operatingsystem'];
		$details_brand = $row['brand'];
		$details_color = $row['color'];
		$details_others = $row['others'];
		
		
		
		
		
		
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
									<label class="itemvalues"><?php echo $equipname;?></label>
									</div>
									
									
									<div class="col-lg-4 text-right">
									<label>Tag No.</label>
									</div>
									<div class="col-lg-8">
									<label class="itemvalues"><?php echo $tagno;?></label>
									</div>
									
									
									<div class="col-lg-4 text-right">
									<label>Property No.</label>
									</div>
									<div class="col-lg-8">
									<label class="itemvalues"><?php echo $propertyno;?></label>
									</div>
									
									
									<div class="col-lg-4 text-right">
									<label>Serial</label>
									</div>
									<div class="col-lg-8">
									<label class="itemvalues"><?php echo $serial;?></label>
									</div>
									
									
									<div class="col-lg-4 text-right">
									<label>Cost:</label>
									</div>
									<div class="col-lg-8">
									<label class="itemvalues"><?php echo $unitcost;?></label>
									</div>
									
									
									
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-4">
								<div class="col-lg-4 text-right">
                                            <label>Date Acquired:</label>
											</div>
											<div class="col-lg-8">
                                            <label class="itemvalues"><?php echo $dateacquired;?></label>
											</div>
											<div>&nbsp;</div>
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
                                            <label class="itemvalues"><?php echo $suppliername;?></label>
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
							Other Details 
							
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						
						<div class="row">
						<div class="col-lg-8">
						  <input type="hidden" id="itemno" value="">
						  
						  <div class="col-lg-4 text-right">
							<label>Employee</label>
							</div>
							<div class="col-lg-8">
							<select id="eid" class="form-control" tabindex="5">
							<option></option>
										<?php
										
								$suplist = selectListSQL("SELECT eid, CONCAT(fname,' ',lname) AS fullname FROM employee order by fname");
								//print_r($employeelist);
								foreach ($suplist as $rows => $link) {
									$eid = $link['eid'];
									$fullname = $link['fullname'];
									
									if($details_eid==$eid){
										$selected = "selected='selected'";
									}else{
										$selected = "";
									}
									echo "<option value='$eid' $selected>$fullname</option>";
								}
								?>
									
									
								</select>
								<script>
								$('#eid').prop('disabled',true);
								</script>
							</div>
						  
							<div class="col-lg-4 text-right">
							<label>Processor</label>
							</div>
							<div class="col-lg-8">
							<input id="processor" class="form-control" value="<?php echo $details_processor;?>" tabindex="1" disabled>
							</div>
							
							
							<div class="col-lg-4 text-right">
							<label>Ram</label>
							</div>
							<div class="col-lg-8">
							<input id="ram" class="form-control" value="<?php echo $details_ram;?>" tabindex="1" disabled>
							</div>
							
							
							<div class="col-lg-4 text-right">
							<label>Hard Disk</label>
							</div>
							<div class="col-lg-8">
							<input id="hd" class="form-control" value="<?php echo $details_hd;?>" tabindex="1" disabled>
							</div>
							
							
							<div class="col-lg-4 text-right">
							<label>Operating System</label>
							</div>
							<div class="col-lg-8">
							<input id="os" class="form-control" value="<?php echo $details_os;?>" tabindex="1" disabled>
							</div>

						</div>
						<!-- /.col-lg-6 (nested) -->
						<div class="col-lg-4">
						<div class="col-lg-4 text-right">
									<label>Brand</label>
									</div>
									<div class="col-lg-8">
									<input id="brand" class="form-control" value="<?php echo $details_brand;?>" tabindex="1" disabled>
									</div>
									<div>&nbsp;</div>
							<div class="col-lg-4 text-right">
									<label>Color</label>
									</div>
									<div class="col-lg-8">
									<input id="color" class="form-control" value="<?php echo $details_color;?>" tabindex="1" disabled>
									</div>
							<div class="col-lg-4 text-right">
									<label>Others:</label>
									</div>
									<div class="col-lg-8">
									<textarea id="others"  class="form-control" disabled><?php echo $details_others;?></textarea>
									</div>
							
							
									
									
						
							
						
						</div>
						<!-- /.col-lg-6 (nested) -->

				<!-- /.panel-heading -->

					</div>
						

                        
                        <!-- /.panel-body -->
                    </div>
					
                    <!-- /.panel -->
					
					<div class="panel-footer">
					<div>
							<button id="editequipdetails" class="btn btn-info btn-sm">
								<i class="fa fa-edit"></i> Edit Details
							</button>
							
							<button id="saveequipdetails" class="btn btn-primary btn-sm" disabled>
								<i class="fa fa-save"></i> Save
							</button>
							
							</div>	
					</div>
					
					
					
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
	
	$(document).ready(function() {
        $('#dataTables-example3').DataTable({
                responsive: true
        });
    });
	
    </script>
	
	
<?php
include('footer.php');
?>