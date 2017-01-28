<?php
include('header.php');
include_once("include/functions.php");	

		$conn = dbConnect();
		$reqid = $_GET['id'];
		$sqlselect = "SELECT requisition_status,reqid,requisition_no, requisition_date, CONCAT(employee.fname,' ',employee.lname) AS fullname,employee.eid FROM requisition_details LEFT JOIN employee 
ON requisition_details.eid = employee.eid where reqid='$reqid'";
		$stmt = $conn->prepare($sqlselect);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		//echo $sqlselect;
		$rid = $row['reqid'];
		$rno = $row['requisition_no'];
		$rdate = $row['requisition_date'];
		$efullname = $row['fullname'];
		$req_status = $row['requisition_status'];
		$eid = $row['eid'];
		$conn = null;
		//print_r($row);
?>
<div id="page-wrapper">

<!-- Modal -->
	<div class="modal fade" id="additemdetails" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Add Item</h4>
				</div>
				<div class="modal-body">
				   
			<form role="form" id="form_item"> 
				<div class="form-group">
				
					<input type="hidden" id="itemno" value="">
					<div class="col-lg-4 text-right">
					<label>Item Description</label>
					</div>
					<div class="col-lg-8 text-left">
					
					<select style="width:100%;" class="form-control js-example-basic-single2" id="item-list" onchange="displayitemunit(this.value);">
					<option value="0">Select Item</option>
					 <?php
											
				$itemlist = selectListSQL("SELECT * FROM items ORDER BY description");
				//print_r($employeelist);
				foreach ($itemlist as $rows => $link) {
					
					$itemNo = $link['itemNo'];
					$description = $link['description'];
					echo "<option value='$itemNo'>$description</option>";
				}
					?>
					  
					</select>
					</div>
					
					<div class="col-lg-4 text-right">
					<label>Available QTY</label>
					</div>
					<div class="col-lg-8 text-left">
						<div class="form-control" id="inventoryqty"></div>
					</div>
					
					<div class="col-lg-4 text-right">
					<label>Unit</label>
					</div>
					<div class="col-lg-8 text-right">
						<select class="form-control"  id="iunit">
						</select>
					</div>
					<div class="col-lg-4 text-right">
					<label>QTY</label>
					</div>
					<div class="col-lg-8 text-right">
					<input id="qty" class="form-control" value="" tabindex="2">
					</div>
					
					
				</div>
				
			</form>
				<div class="row">
				</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default simplemodal-close" data-dismiss="modal">Close</button>
					<button id="additemtolist" type="button" class="btn btn-primary">Add Item</button>
					
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

<!-- end modal-->
			




            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" style="color:green;"><i class="fa fa-money fa-1x"></i> REQUISITION DETAILS
						<div class="pull-right">
								
							<a href="requisition.php"><button class="btn btn-primary btn-lg" >
                                <i class="fa fa-chevron-left"></i> Back to List
                            </button></a>
                            <a href="printrequisition.php?reqid=<?php echo $reqid;?>" target="_blank" class="btn btn-primary notification btn-lg"><i class="fa fa-print"></i> Print</a>

                            </div></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Requisition Slip/Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                   
                                        <div class="form-group">
											<input type="hidden" value="<?php echo $reqid;?>" id="reqid">
											<input type="hidden" value="<?php echo $rno;?>" id="old_requisition_no">
                                            <label>Requisition No.</label>
                                            <input class="form-control" value="<?php echo $rno;?>" tabindex="1" id="requisition_no" disabled>
                                            
                                        </div>
									<div class="form-group">
                                            <label>Request Date</label>
                                            <input disabled type="date" class="form-control" tabindex="4" value="<?php echo $rdate;?>" id="reqdate">
                                            
                                        </div>
									<div class="form-group">
                                            <label>Requested By</label>
                                            
                                            <select class="form-control js-example-basic-single" id="requester_id" disabled>
                                                <?php
												echo "<option value='$eid'>$efullname</option>";
												
												
						include_once("include/functions.php");			
						$userlist = selectListSQL("SELECT eid, CONCAT(fname, ' ', lname) AS employee_name FROM employee ORDER BY fname");
						foreach ($userlist as $rows => $link) {
							$eid = $link['eid'];
							$ename = $link['employee_name'];
							echo "<option value='$eid'>$ename</option>";
						}
						?>
                                     
                                            </select>
                                            
                                        </div>
										
						<div class="form-group">
                                            <label>Status</label>
                                            
                                            <select class="form-control js-example-basic-single" id="req_status" disabled>
											<?php
											echo "<option value='".$req_status."'>".$req_status."</option>"
											?>
                                                <option value="NONE">NONE</option>
												<option value="CANCELLED">CANCELLED</option>
                                            </select>
                                            
                                        </div>
						
									<button type="submit" class="btn btn-warning" onClick="javascript: history.go(-1);">Cancel</button>	
									<button type="reset" onclick="editreq();" class="btn btn-default">Edit</button>
                                    <button type="submit" class="btn btn-success" onclick="updatereq();">Save</button>
                                    
									
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-8">
			   <div class="panel panel-default">
					<div class="panel-heading">
						Item List
						<div class="pull-right">
								<button id="additemdetails" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#additemdetails">
								<i class="fa fa-plus-circle"></i> Add Item
							</button>

                            </div>
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table" id="itemlist">
								<thead>
									<tr>
										<th>Item Description</th>
										<th>Unit</th>
										<th>QTY</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
					
						
						<?php
						include_once("include/functions.php");			
						$item_list = selectListSQL("SELECT items.description, requisition_items.unit, requisition_items.qty, requisition_items.update_status,requisition_items.reqitemsid FROM requisition_items
INNER JOIN items ON requisition_items.itemno = items.itemNo WHERE requisition_no='$rno'");
						foreach ($item_list as $rows => $link) {
							$idescription = $link['description'];
							$iunit = $link['unit'];
							$iqty = $link['qty'];
							$reqitemsid = $link['reqitemsid'];
							if($link['update_status']==1){
								$status = "disabled";
							}else{
								$status = "";
							}
							echo "<td>$idescription</td><td>$iunit</td><td>$iqty</td><td><button onclick='deleteitemreq($reqitemsid);' class='btn btn-danger notification' id='notification' $status><i class='fa fa-times'></i></button></td></tr>";
						}
						?>
								</tbody>
							</table>
						</div>
						<!-- /.table-responsive -->
					</div>
					<!-- /.panel-body -->
					<div class="panel-footer text-right">
					<button  type="submit" class="btn btn-success" onclick="updateinventory('<?php echo $rno;?>');" <?php echo $status;?>>Update Inventory</button>
					</div>
				</div>
				<!-- /.panel -->
									
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
            <!-- /.row -->
			
			
		
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
        </div>
        <!-- /#page-wrapper -->

    </div>

<?php
include('footer.php');
?>