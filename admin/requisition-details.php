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
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" style="color:green;"><i class="fa fa-money fa-1x"></i> REQUISITION DETAILS
						<div class="pull-right">
								<button id="addreq" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addRequisition">
								<i class="fa fa-plus-circle"></i> Add Requisition
							</button>

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
                                            
                                            <select class="form-control" disabled>
                                                <?php
												echo "<option value='$eid'>$efullname;</option>";
												
												
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
								<button id="addreq" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addRequisition">
								<i class="fa fa-plus-circle"></i> Add Item
							</button>

                            </div>
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Username</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Mark</td>
										<td>Otto</td>
										<td>@mdo</td>
									</tr>
									<tr>
										<td>2</td>
										<td>Jacob</td>
										<td>Thornton</td>
										<td>@fat</td>
									</tr>
									<tr>
										<td>3</td>
										<td>Larry</td>
										<td>the Bird</td>
										<td>@twitter</td>
									</tr>
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