<?php
include('header.php');
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="color:green;"><i class="fa fa-money fa-1x"></i> Purchase Request
						<div class="pull-right">
                                <button id="addemployeebutton" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addEmployee">
                                <i class="fa fa-plus-circle"></i> Add Purchase Request
                            </button>
                             <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#">
                                <i class="fa fa-print"></i> Print
                            </button> 
                        </div>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
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
															<th>PR Number</th>
															<th>Request Date</th>
															<th>Department</th>
															<th>Requested By</th>
															<th>Status</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
                                                <?php
						include_once("include/functions.php");			
						$prlist = selectListSQL("SELECT * FROM pr_list ORDER BY transID DESC");
						foreach ($prlist as $rows => $link) {
							$transID = $link['transID'];
							$prNo = $link['prNo'];
							$department = $link['department'];
							$section = $link['section'];
							$prDate = $link['prDate'];
							$purpose = $link['purpose'];
							$requestedbyeid = $link['requestedbyeid'];
							$requestedby = $link['requestedBy'];
							$designation = $link['designation'];
							$status = $link['status'];
							
							echo "<tr class='odd gradeX'>";
							echo "<td>$prNo</td>";
							echo "<td>$prDate</td>";
							echo "<td>$department</td>";
							echo "<td>$requestedby</td>";
							echo "<td>$status</td>";
							
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
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                
                            </div>
                            <!-- /.row -->
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