<?php
include('header.php');
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-users fa-1x"></i> Employees
						<div class="pull-right">
							<button id="addemployeebutton" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addEmployee">
                                <i class="fa fa-plus-circle"></i> Add Employee
                            </button>
                             <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#">
                                <i class="fa fa-print"></i> Print
                            </button>   

                         </div>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			
			 <!-- Modal -->
				<div class="modal fade" id="addEmployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Add Employee</h4>
							</div>
							<div class="modal-body">
							   
						<form role="form" id="form_item"> 
							<div class="form-group">
								<input type="hidden" id="eid" value="">
								
								<div class="col-lg-4 text-right">
								<label>Employee ID/Number</label>
								</div>
								<div class="col-lg-8 text-right">
								<input id="employeeno" class="form-control" value="" tabindex="1">
								</div>
								<div class="col-lg-4 text-right">
								<label>Last Name</label>
								</div>
								<div class="col-lg-8 text-right">
								<input id="lname" class="form-control" value="" tabindex="2">
								</div>
								<div class="col-lg-4 text-right">
								<label>First Name</label>
								</div>
								<div class="col-lg-8 text-right">
								<input id="fname" class="form-control" value="" tabindex="3">
								</div>
								<div class="col-lg-4 text-right">
								<label>Middle Name</label>
								</div>
								<div class="col-lg-8 text-right">
								<input id="mname" class="form-control" value="" tabindex="4">
								</div>
								<div class="col-lg-4 text-right">
								<label>Extension Name</label>
								</div>
								<div class="col-lg-8 text-right">
								<input id="ename" class="form-control" value="" tabindex="4">
								</div>
								<div class="col-lg-4 text-right">
								<label>Designation</label>
								</div>
								<div class="col-lg-8 text-right">
								<input id="designation" class="form-control" value="" tabindex="5">
								</div>                           
							</div>
							
						</form>
						<div class="row">
						</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default simplemodal-close" data-dismiss="modal">Close</button>
								<button id="saveemployee" type="button" class="btn btn-primary">Save and Close</button>
								<button id="updateemployee" type="button" class="btn btn-primary" disabled>Update</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>

			<!-- end modal-->
			
			<div class="row">
				<div class="alert alert-success hide" id="success-alert">
                                Employee Added!
                </div>
			
			</div>
			
            
            <div class="row">
				<div class="col-lg-12">
								<div class="panel panel-default">
											<div class="panel-heading">
											   Search employees
											</div>
								<div class="panel-body">
												<div class="dataTable_wrapper">
													<table class="table table-striped table-bordered table-hover" id="dataTables-example">
														<thead>
															<tr>
																<th>Employee ID</th>
																<th>Name</th>
																
																<th>Designation</th>
																
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
			<?php
						include_once("include/functions.php");			
						$emplist = selectListSQL("SELECT * FROM employee ORDER BY eid DESC");
						foreach ($emplist as $rows => $link) {
							$eid = $link['eid'];
							$empno = $link['empNo'];
							$lname = $link['lname'];
							$fname = $link['fname'];
							$mname = $link['mname'];
							$ename = $link['ename'];
							$designation = $link['designation'];
							
							echo "<tr class='odd gradeX'>";
							echo "<td>$empno</td>";
							echo "<td>$fname $lname $mname, $ename</td>";
							echo "<td>$designation</td>";
							echo "<td class='center'> 
								
								<button class='btn btn-primary' onClick='editemployee($eid)'  data-toggle='modal' data-target='#addEmployee'><i class='fa fa-edit'></i></button>
								<button class='btn btn-danger notification' id='notification' onClick='deleteemployee($eid)'><i class='fa fa-times'></i></button>
							</td>";
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
        <!-- /#page-wrapper -->

    </div>

<?php
include('footer.php');
?>