<?php
include('header.php');
include_once("include/functions.php");			
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-briefcase fa-1x"></i> Items
						<div class="pull-right">
							<button id="additembutton" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addItem">
                                <i class="fa fa-plus-circle"></i> Add Item
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
                            <div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                            <input id="idescription" class="form-control" value="" tabindex="1">
											</div>
											<div class="col-lg-4 text-right">
											<label>Unit</label>
											</div>
											<div class="col-lg-8 text-right">
                                            <input id="unit" class="form-control" value="" tabindex="2">
											</div>
											
											<div class="col-lg-4 text-right">
                                            <label>Cost</label>
											</div>
											<div class="col-lg-8 text-right">
											<div class="form-group input-group">
												<span class="input-group-addon">₱</span>
												<input id="cost" class="form-control" value="0.00" tabindex="4">
											</div>
											</div>
											<div class="col-lg-4 text-right">
											<label>Category</label>
											</div>
											<div class="col-lg-8 text-right">
												<select id="category" class="form-control" tabindex="5" disabled>
													<option value="Equipment">Equipment</option>
													<option value="Office Supply" selected>Office Supply</option>
												</select>
											</div>
											<div class="col-lg-4 text-right">
											<label>Supplier</label>	
											</div>
											<div class="col-lg-8 text-right">
											<select id="supplier" class="form-control" tabindex="6">	
											<option value="0"></option>
											<?php
													
											$suplist = selectListSQL("SELECT * FROM suppliers ORDER BY supName ASC");
											//print_r($employeelist);
											foreach ($suplist as $rows => $link) {
												$supplierid = $link['supplierID'];
												$supname = $link['supName'];
												
												
												echo "<option value='$supplierid'>$supname</option>";
											}
											?>
                                            </select>
											</div>
											
											<div class="col-lg-4 text-right">
											<label>Brand</label>
											</div>
											<div class="col-lg-8 text-right">
                                            <input id="brand" class="form-control" value="" tabindex="4">
											</div>
											
                                        </div>
										
									</form>
										<div class="row">
										</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default simplemodal-close" data-dismiss="modal">Close</button>
                                            <button id="saveitem" type="button" class="btn btn-primary">Save and Close</button>
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
                                Item Added!
                </div>
			
			</div>
			
			
            
            <div class="row">
					<div class="col-lg-12">
					<div class="panel panel-default">
								<div class="panel-heading">
								   Search Items
								</div>
					<div class="panel-body">
									<div class="dataTable_wrapper">
										<table class="table table-striped table-bordered table-hover" id="dataTables-items">
											<thead>
												<tr>
													<th>Item#</th>
													<th>Description</th>
													<th>Inventory QTY</th>
													<th>Unit</th>
													<th>Cost</th>
													<th style="width:20px;">Brand</th>
													<th>Category</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
											
											<?php
											
											$itemlist = selectListSQL("SELECT * FROM items ORDER BY itemNo DESC");
											//print_r($employeelist);
											foreach ($itemlist as $rows => $link) {
												$itemNo = $link['itemNo'];
												$description = $link['description'];
												$unit = $link['unit'];
												$unitcost = $link['unitCost'];
												$category = $link['category'];
												$inventoryqty = $link['inventory_qty'];
												$brand = $link['brand'];
												
												echo "<tr class='odd gradeX'>";
												echo "<td>$itemNo</td>";
												echo "<td><a href='itemdetails.php?id=$itemNo'>$description</a></td>";
												echo "<td>$inventoryqty</td>";
												echo "<td>$unit</td>";
												echo "<td>$unitcost</td>";
												echo "<td>$brand</td>";
												echo "<td>$category</td>";
												echo "<td class='center'> 
													
													<button class='btn btn-primary' onClick='edititem($itemNo)'  data-toggle='modal' data-target='#addItem'><i class='fa fa-edit'></i></button>
													<button class='btn btn-danger notification' id='notification' onClick='deleteitem($itemNo)'><i class='fa fa-times'></i></button>
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