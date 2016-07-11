<?php
include('header.php');
include_once("include/functions.php");
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-briefcase fa-1x"></i> Inventory
						<div class="pull-right">
							<button id="addinventorybutton" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addInventory">
                                <i class="fa fa-plus-circle"></i> Add Inventory
                            </button>
                             <button class="btn btn-primary btn-lg hidden" data-toggle="modal" data-target="#addItem">
                                <i class="fa fa-print"></i> Print
                            </button>   

                         </div>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			
			<!--modal -->
			
			
                            <!-- Button trigger modal -->
                            
                            <!-- Modal -->
                            <div class="modal fade" id="addInventory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add Inventory</h4>
                                        </div>
                                        <div class="modal-body">
                                           
                                    <form role="form" id="form_item"> 
                                        <div class="form-group">
											<input type="hidden" id="itemno" value="">
                                            <label>Select Item</label>
											<select id="itemdescription" class="form-control" tabindex="4" onclick="selectunit()">
											<?php
											$itemlist = selectListSQL("SELECT * FROM items ORDER BY description ASC");
											foreach ($itemlist as $rows => $link) {
												$itemNo = $link['itemNo'];
												$description = $link['description'];
												echo "<option value='$itemNo'>$description</option>";
											}
											?>
	
											</select>
											
                                            
											<label>Unit</label>
                                            <input id="unit" class="form-control" value="" tabindex="2">
                                            <label>Quantity</label>
											<div class="form-group input-group">
												
												<input id="qty" class="form-control" value="" tabindex="3">
											</div>
											
                                            
                                        </div>
										
									</form>
			
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default simplemodal-close" data-dismiss="modal">Close</button>
                                            <button id="saveinventory" type="button" class="btn btn-primary">Save and Close</button>
											<button id="update" type="button" class="btn btn-primary" disabled>Update</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

			<!-- end modal-->
			
			<div class="row">
				<div class="alert alert-success hide" id="success-alert">
                                Iventory Added!
                </div>
			
			</div>
			
			
            
            <div class="row">
					<div class="col-lg-12">
					<div class="panel panel-default">
								<div class="panel-heading">
								   Search Inventory
								</div>
					<div class="panel-body">
									<div class="dataTable_wrapper">
										<table class="table table-striped table-bordered table-hover" id="dataTables-example">
											<thead>
												<tr>
													<th>Item Name</th>
													<th>Unit</th>
													<th>QTY</th>
													<th>Time</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
											
											<?php
														
											$itemlist = selectListSQL("SELECT inventory.inventoryid,items.description,inventory.itemNo,inventory.unit,inventory.qty,inventory.time_stamp FROM inventory LEFT JOIN items ON inventory.itemNo = items.itemNo ORDER BY inventoryid DESC");
											//print_r($employeelist);
											foreach ($itemlist as $rows => $link) {
												$itemNo = $link['itemNo'];
												$description = $link['description'];
												$unit = $link['unit'];
												$qty = $link['qty'];
												$time = $link['time_stamp'];
												$inventoryid = $link['inventoryid'];
												
												echo "<tr class='odd gradeX'>";
												echo "<td>$description</td>";
												echo "<td>$unit</td>";
												echo "<td>$qty</td>";
												echo "<td>$time</td>";
												echo "<td class='center'> 
													
													<button class='btn btn-primary hidden' onClick='edit($inventoryid)'  data-toggle='modal' data-target='#addItem'><i class='fa fa-edit'></i></button>
													<button class='btn btn-danger notification' id='notification' onClick='deleteinventory($inventoryid)'><i class='fa fa-times'></i></button>
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