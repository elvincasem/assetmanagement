<?php
include('header.php');
include_once("include/functions.php");
?>
<div id="page-wrapper">



<!-- Modal -->
	<div class="modal fade" id="addinventory" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					
					<select style="width:100%;" class="form-control js-example-basic-single" id="item-list" onchange="displayitemunit(this.value);">
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
					
					<div class="col-lg-4 text-right">
					<label>Received Date</label>
					</div>
					<div class="col-lg-8 text-right">
					<input type="date" id="datereceived" class="form-control" value="" tabindex="2">
					</div>
					
					<div class="col-lg-4 text-right">
					<label>Delivery Receipt</label>
					</div>
					<div class="col-lg-8 text-right">
					<input id="drno" class="form-control" value="" tabindex="2">
					</div>
					
					
				</div>
				
			</form>
				<div class="row">
				</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default simplemodal-close" data-dismiss="modal">Close</button>
					<button id="saveinventory" type="button" class="btn btn-primary">Add Item</button>
					
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

<!-- end modal-->



            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-briefcase fa-1x"></i> Inventory
						<div class="pull-right">
							<button id="addinventorybutton" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addinventory">
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
								<th>Delivery Receipt</th>
								<th>Date Received</th>
								<th>Item Name</th>
								<th>Unit</th>
								<th>QTY</th>
								<th>Time</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						
						<?php
									
						$itemlist = selectListSQL("SELECT inventory.inventoryid,inventory.datereceived,inventory.drno,items.description,inventory.itemNo,inventory.unit,inventory.qty,inventory.time_stamp,inventory.status FROM inventory LEFT JOIN items ON inventory.itemNo = items.itemNo ORDER BY inventoryid DESC");
						//print_r($employeelist);
						foreach ($itemlist as $rows => $link) {
							$itemNo = $link['itemNo'];
							$description = $link['description'];
							$unit = $link['unit'];
							$qty = $link['qty'];
							$time = $link['time_stamp'];
							$inventoryid = $link['inventoryid'];
							$invstatus = $link['status'];
							$datereceived = $link['datereceived'];
							$drno = $link['drno'];
							
							if($invstatus==1){
								$status ="disabled";
							}else{
								$status ="";
							}
							
							echo "<tr class='odd gradeX'>";
							echo "<td>$drno</td>";
							echo "<td>$datereceived</td>";
							echo "<td>$description</td>";
							echo "<td>$unit</td>";
							echo "<td>$qty</td>";
							echo "<td>$time</td>";
							echo "<td class='center'> 
								
								
								<button class='btn btn-danger notification' id='notification' onClick='deleteinventory($inventoryid)' $status><i class='fa fa-times'></i></button>
							<button  type='submit' class='btn btn-success' onclick='updateinventory_inv($inventoryid);' $status>Update Inventory</button></td>";
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