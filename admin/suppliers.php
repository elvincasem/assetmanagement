<?php
include('header.php');
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-cubes fa-1x"></i> Suppliers
						<div class="pull-right">
							<button id="addsupplierbutton" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addSupplier">
                                <i class="fa fa-plus-circle"></i> Add Supplier
                            </button>
                             <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addItem">
                                <i class="fa fa-print"></i> Print
                            </button>   

                         </div>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
			  <!-- Modal -->
                            <div class="modal fade" id="addSupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add Supplier</h4>
                                        </div>
                                        <div class="modal-body">
                                           
                                    <form role="form" id="form_item"> 
                                        <div class="form-group">
											<input type="hidden" id="supplierid" value="">
											<div class="col-lg-4 text-right">
                                            <label>Supplier Name</label>
											</div>
											<div class="col-lg-8 text-right">
                                            <input id="suppliername" class="form-control" value="" tabindex="1">
											</div>
											<div class="col-lg-4 text-right">
											<label>Address</label>
											</div>
											<div class="col-lg-8 text-right">
                                            <input id="address" class="form-control" value="" tabindex="2">
											</div>
											<div class="col-lg-4 text-right">
                                            <label>Contact Number</label>
											</div>
											<div class="col-lg-8 text-right">
											<input id="contactno" class="form-control" value="" tabindex="3">
											</div>
											
                                        </div>
										
									</form>
									
									<div class="row">
										</div>
			
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default simplemodal-close" data-dismiss="modal">Close</button>
                                            <button id="savesupplier" type="button" class="btn btn-primary">Save and Close</button>
											<button id="updatesupplier" type="button" class="btn btn-primary" disabled>Update</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

			<!-- end modal-->
			
			<div class="row">
				<div class="alert alert-success hide" id="success-alert">
                                Supplier Added!
                </div>
			
			</div>

            <div class="row">
								<div class="col-lg-12">
								<div class="panel panel-default">
											<div class="panel-heading">
											   Search Supplier
											</div>
								<div class="panel-body">
												<div class="dataTable_wrapper">
													<table class="table table-striped table-bordered table-hover" id="dataTables-example">
														<thead>
															<tr>
																<th>Supplier Name</th>
																<th>Address</th>
																<th>Contact #</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
					<?php
						include_once("include/functions.php");			
						$supplierlist = selectListSQL("SELECT * FROM suppliers ORDER BY supplierid DESC");
						foreach ($supplierlist as $rows => $link) {
							$supplierid = $link['supplierID'];
							$suppliername = $link['supName'];
							$address = $link['address'];
							$contactno = $link['contactNo'];
							$tin = $link['TIN'];
							
							echo "<tr class='odd gradeX'>";
							echo "<td>$suppliername</td>";
							echo "<td>$address</td>";
							echo "<td>$contactno</td>";
							echo "<td class='center'> 
								
								<button class='btn btn-primary' onClick='editsupplier($supplierid)'  data-toggle='modal' data-target='#addSupplier'><i class='fa fa-edit'></i></button>
								<button class='btn btn-danger notification' id='notification' onClick='deletesupplier($supplierid)'><i class='fa fa-times'></i></button>
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