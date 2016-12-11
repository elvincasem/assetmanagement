<?php
include('header.php');
include_once("include/functions.php");			
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-desktop fa-1x"></i> Equipment
						<div class="pull-right">
							<button id="addequipmentbutton" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addEquipment">
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
	<div class="modal fade" id="addEquipment"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Add Equipment</h4>
				</div>
				<div class="modal-body">
				   
			<form role="form" id="form_item"> 
				<div class="form-group">
				
					<input type="hidden" id="equipno" value="">
					
					<div class="col-lg-4 text-right">
					<label>Property No.</label>
					</div>
					<div class="col-lg-8 text-right">
					<input id="propertyno" class="form-control" value="" tabindex="2">
					</div>
					
					<div class="col-lg-4 text-right">
					<label>Article</label>
					</div>
					<div class="col-lg-8 text-left">
						<select style="width:100%;" id="article" class="form-control js-example-basic-single" tabindex="3">
							<option value="Computer">Computer</option>
							<option value="Appliance">Appliance</option>
							<option value="Chairs and Tables">Chairs and Tables</option>
							<option value="Printer">Printer</option>
							<option value="Cabinet">Cabinet</option>
							
							<option value="Others">Others</option>
						</select>
					</div>
					
					<div class="col-lg-4 text-right">
					<label>Particulars</label>
					</div>
					<div class="col-lg-8 text-right">
					<textarea class="form-control" id="particulars" tabindex="4"></textarea>
					</div>
					
					<div class="col-lg-4 text-right">
					<label>Date Acquired</label>
					</div>
					<div class="col-lg-8 text-right">
					<input type="date" id="dateacquired" class="form-control" value="" tabindex="5">
					</div>
					
					<div class="col-lg-4 text-right">
					<label>Cost</label>
					</div>
					<div class="col-lg-8 text-right">
					<div class="form-group input-group">
						<span class="input-group-addon">₱</span>
						<input id="cost" class="form-control" value="0.00" tabindex="6">
					</div>
					</div>
					
					
					<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Basic Info</a>
                                </li>
                                <li><a href="#profile" data-toggle="tab">Peripheral Details</a>
                                </li>
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <h5><br></h5>
						<div class="row">			
							<div class="col-lg-4 text-right">
							<label>Employee</label>
							</div>
							<div class="col-lg-8">
							<select style="width:100%;" id="eid" class="form-control js-example-basic-single" tabindex="7">
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
						</div>		
								
					<div class="col-lg-4 text-right">
					<label>Classification</label>
					</div>
					<div class="col-lg-8 text-left">
						<select style="width:100%;" id="classification" class="form-control js-example-basic-single" tabindex="8">
							<option value="Books">Books</option>
							<option value="Communication Equipment">Communication Equipment</option>
							<option value="Firefighting Equipment">Firefighting Equipment</option>
							<option value="Furniture and Fixtures">Furniture and Fixtures</option>
							<option value="IT Equipment and Softwares">IT Equipment and Softwares</option>
							<option value="Medical and Dental Laboratory">Medical and Dental Laboratory</option>
							<option value="Motor Vehicle">Motor Vehicle</option>
							<option value="Office Equipment">Office Equipment</option>
							<option value="Others Machineries and Equipment">Others Machineries and Equipment</option>
						</select>
					</div>
					
					<div class="col-lg-4 text-right">
					<label>Account Code</label>
					</div>
					<div class="col-lg-8 text-right">
					<input id="accountcode" class="form-control" value="" tabindex="9" >
					</div>
					
					
					<div class="col-lg-4 text-right">
					<label>Service</label>
					</div>
					<div class="col-lg-8 text-right">
					<select class="form-control" id="service" tabindex="10">
					<option value="Servicable">Servicable</option>
					<option value="Unservicable">Unservicable</option>
					<option value="Disposed">Disposed</option>
					</select>
					</div>
					
					
					<div class="col-lg-4 text-right">
					<label>Whereabout</label>
					</div>
					<div class="col-lg-8 text-right">
					<input id="whereabout" class="form-control" value="" tabindex="11">
					</div>
					
					
					<div class="col-lg-4 text-right">
					<label>Remarks</label>
					</div>
					<div class="col-lg-8 text-right">
					<input id="remarks" class="form-control" value="" tabindex="12" >
					</div>
					
					<div class="col-lg-4 text-right">
					<label>Tag No.</label>
					</div>
					<div class="col-lg-8 text-right">
					<input id="tagno" class="form-control" value="" tabindex="13" placeholder="2016-01">
					</div>
					
					<div class="col-lg-4 text-right">
					<label>Supplier</label>	
					</div>
					<div class="col-lg-8 text-left">
					<select style="width:100%;" id="supplier" class="form-control js-example-basic-single" tabindex="14">	
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
	</div><!-- end tab content-->
					
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <h5><br></h5>
		<div class="row">	
				
				<div class="col-lg-4 text-right">
				<label>Processor</label>
				</div>
				<div class="col-lg-8 text-right">
				<input id="processor" class="form-control" value="" tabindex="12" >
				</div>
				
				<div class="col-lg-4 text-right">
				<label>RAM</label>
				</div>
				<div class="col-lg-8 text-right">
				<input id="ram" class="form-control" value="" tabindex="12" >
				</div>
				
				<div class="col-lg-4 text-right">
				<label>Hard Disk</label>
				</div>
				<div class="col-lg-8 text-right">
				<input id="hd" class="form-control" value="" tabindex="12" >
				</div>
				
				<div class="col-lg-4 text-right">
				<label>Operating System</label>
				</div>
				<div class="col-lg-8 text-right">
				<input id="os" class="form-control" value="" tabindex="12" >
				</div>
				<div class="col-lg-4 text-right">
				<label>Equipment S/N</label>
				</div>
				<div class="col-lg-8 text-right">
				<input id="equipsn" class="form-control" value="" tabindex="12" >
				</div>
				
				<div class="col-lg-4 text-right">
				<label>Processor S/N</label>
				</div>
				<div class="col-lg-8 text-right">
				<input id="processorsn" class="form-control" value="" tabindex="12" >
				</div>
				
				<div class="col-lg-4 text-right">
				<label>Monitor S/N</label>
				</div>
				<div class="col-lg-8 text-right">
				<input id="monitorsn" class="form-control" value="" tabindex="12" >
				</div>
				
				<div class="col-lg-4 text-right">
				<label>Keyboard S/N</label>
				</div>
				<div class="col-lg-8 text-right">
				<input id="keyboardsn" class="form-control" value="" tabindex="12" >
				</div>
				
				<div class="col-lg-4 text-right">
				<label>Mouse S/N</label>
				</div>
				<div class="col-lg-8 text-right">
				<input id="mousesn" class="form-control" value="" tabindex="12" >
				</div>
				
				
			</div><!-- end row -->
                                </div>
                                
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                
            </div>
            <!-- /.row -->
					
					
					
					
					
					
					
					
				</div>
				
			</form>
				<div class="row">
				</div>
				</div>
				<div class="modal-footer">
					<button class='btn btn-primary' id="editbutton"><i class='fa fa-edit'></i></button>
					<button type="button" class="btn btn-default simplemodal-close" data-dismiss="modal">Close</button>
					<button id="saveequipment" type="button" class="btn btn-primary">Save and Close</button>
					<button id="updateequipment" type="button" class="btn btn-primary" disabled>Update</button>
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
								<th>Property No.</th>
								<th>Article</th>
								<th>Particulars</th>
								<th>Date Acquired</th>
								<th>Unit Cost</th>
								<th>Assigned To</th>
								<th>Classification</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						
						<?php
						
						$itemlist = selectListSQL("SELECT * FROM equipments left join employee on equipments.eid = employee.eid");
						//print_r($employeelist);
						foreach ($itemlist as $rows => $link) {
							$equipno = $link['equipNo'];
							$propertyno = $link['propertyNo'];
							$article = $link['article'];
							$particulars = $link['particulars'];
							
							$dateacquired = $link['dateacquired'];
							$totalcost = $link['totalcost'];
							$eid = $link['eid'];
							$accountcode = $link['accountcode'];
							$service = $link['service'];
							$classification = $link['classification'];
							$whereabout = $link['whereabout'];
							$empname = $link['fname']." ".$link['lname'];
							
							echo "<tr class='odd gradeX'>";
							echo "<td><a href='#' data-toggle='modal' data-target='#addEquipment' onClick='editequipment($equipno)'>$propertyno</a></td>";
							echo "<td>$article</td>";
							echo "<td>$particulars</td>";
							echo "<td>$dateacquired</td>";
							echo "<td>$totalcost</td>";
							echo "<td>$empname</td>";
							echo "<td>$classification</td>";
							echo "<td class='center'> 
								
								
								<button class='btn btn-danger notification' id='notification' onClick='deleteequip($equipno)'><i class='fa fa-times'></i></button>
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