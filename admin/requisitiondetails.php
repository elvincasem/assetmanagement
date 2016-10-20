<?php
include('header.php');
include_once("include/functions.php");	

		$conn = dbConnect();
		$reqid = $_GET['id'];
		$sqlselect = "SELECT reqid,requisition_no, requisition_date, CONCAT(employee.fname,' ',employee.lname) AS fullname,employee.eid FROM requisition_details LEFT JOIN employee 
ON requisition_details.eid = employee.eid where reqid='$reqid'";
		$stmt = $conn->prepare($sqlselect);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		//echo $sqlselect;
		$rid = $row['reqid'];
		$rno = $row['requisition_no'];
		$rdate = $row['requisition_date'];
		$efullname = $row['fullname'];
		$eid = $row['eid'];
		$conn = null;
		//print_r($row);
?>
<div id="page-wrapper">

<!-- Modal -->
	<div class="modal fade" id="additemdetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					<div class="col-lg-8 text-right">
					
					<select class="form-control" id="item-list" onchange="displayitemunit(this.value);">
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
					<label>Unit</label>
					</div>
					<div class="col-lg-8 text-right">
					<input id="iunit" class="form-control" value="" tabindex="2">
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
					<button id="saveitem" type="button" class="btn btn-primary">Save and Add</button>
					<button id="update" type="button" class="btn btn-primary" disabled>Update</button>
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
								<!--<button id="addreq" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addRequisition">
								<i class="fa fa-plus-circle"></i> Add Requisition
							</button> -->

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
                                    <form role="form" method="post" action="addprequestitem.php">
                                        <div class="form-group">
											<input type="hidden" value="<?php echo $reqid;?>" id="reqid">
                                            <label>Requisition No.</label>
                                            <input class="form-control" value="<?php echo $rno;?>" tabindex="1" disabled>
                                            
                                        </div>
									<div class="form-group">
                                            <label>Request Date</label>
                                            <input disabled type="date" class="form-control" tabindex="4" value="<?php echo $rdate;?>">
                                            
                                        </div>
									<div class="form-group">
                                            <label>Requested By</label>
                                            
                                            <select class="form-control" id="requester_id" disabled>
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
									<button type="submit" class="btn btn-warning" onClick="javascript: history.go(-1);">Cancel</button>	
									<button type="reset" class="btn btn-default">Edit</button>
                                    <button type="submit" class="btn btn-success">Save</button>
                                    
									</form>	
                                    
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
								</tbody>
							</table>
						</div>
						<!-- /.table-responsive -->
					</div>
					<!-- /.panel-body -->
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