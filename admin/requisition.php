<?php
include('header.php');
include_once("include/functions.php");	
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" style="color:#000;"><i class="fa fa-check-square-o fa-1x"></i> REQUISITION AND ISSUE SLIP
						<div class="pull-right">
							<button id="addreq" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addRequisition" >
									<i class="fa fa-plus-circle"></i> Add Requisition
							</button>
                                
						</div></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
		
		<!-- Modal -->
			<div class="modal fade" id="addRequisition"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" id="adreq" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">Add Requisition</h4>
						</div>
						<div class="modal-body">
						   
					<form role="form" id="form_item"> 
						<div class="form-group">
						
							<input type="hidden" id="reqid" value="">
							<div class="col-lg-4 text-right">
							<label>Date</label>
							</div>
							<div class="col-lg-8 text-right">
							<input id="rdate" type="date" class="form-control" value="" tabindex="1">
							</div>
							<div class="col-lg-4 text-right">
							<label>Requisition No.</label>
							</div>
							<div class="col-lg-8 text-right">
							<input id="rno" class="form-control" value="" tabindex="2">
							</div>
							
							<div class="col-lg-4 text-right">
							<label>Requesting Official/Employee</label>
							</div>
							<div class="col-lg-8 text-left">
								<select style="width:100%"  id="requester_id" class="form-control js-example-basic-single" tabindex="5">
										<?php
										
								$suplist = selectListSQL("SELECT eid, CONCAT(fname,' ',lname) AS fullname FROM employee order by fname");
								//print_r($employeelist);
								foreach ($suplist as $rows => $link) {
									$eid = $link['eid'];
									$fullname = $link['fullname'];
									
									
									echo "<option value='$eid'>$fullname</option>";
								}
								?>
									
									
								</select>
							</div>
							
						</div>
						
					</form>
						<div class="row">
						</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default simplemodal-close" data-dismiss="modal">Close</button>
							<button id="savereqitem" type="button" class="btn btn-primary">Save and Add Item</button>
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
	<div class="panel panel-default">
				<div class="panel-heading">
				   Requisition and Issue Slip List
				</div>
	<div class="panel-body">
					<div class="dataTable_wrapper">
						<table class="table table-striped table-bordered table-hover" id="dataTables-requisition">
							<thead>
								<tr>
									<th>RIS No.</th>
									<th>Date</th>
									<th>Requested By</th>
									
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php
					$lastreq = "";						
					$itemlist = selectListSQL("SELECT reqid,requisition_no, requisition_date, CONCAT(employee.fname,' ',employee.lname) AS fullname FROM requisition_details LEFT JOIN employee 
ON requisition_details.eid = employee.eid");
					//print_r($employeelist);
					foreach ($itemlist as $rows => $link) {
						$reqid = $link['reqid'];
						$requisition_no = $link['requisition_no'];
						$requisition_date = $link['requisition_date'];
						$fullname = $link['fullname'];
						
						$itemstatus = singleSQL("SELECT COUNT(*) AS updated FROM requisition_items WHERE update_status=1 AND requisition_no='$requisition_no'");
						
						if($itemstatus['updated']>=1){
							$disabled = "disabled";
						}else{
							$disabled="";
						}
						
						
						echo "<tr class='odd gradeX'>";
						echo "<td><a href='requisitiondetails.php?id=$reqid'>$requisition_no</a></td>";
						echo "<td>$requisition_date</td>";
						echo "<td>$fullname</td>";
						echo "<td class='center'> 
							
							<a href='printrequisition.php?reqid=$reqid' target='_blank' class='btn btn-primary notification'><i class='fa fa-print'></i></a>
							
							<button class='btn btn-danger notification' id='notification' onClick='deleterequisition($reqid)' $disabled><i class='fa fa-times'></i></button>
						</td>";
						echo "</tr>";
						$lastreq =$requisition_no;
					
					}
					
					
					
					?>	
								
							</tbody>
						</table>
					</div>
	
	
	<input type="hidden" id="lastreq" value="<?php echo $lastreq;?>">
	
				</div>
				
				</div><!-- table end -->
				</div><!-- panel default end-->
											
			</div> <!-- row end-->
        </div>
        <!--- /#page-wrapper -->

    </div>

<?php
include('footer.php');
?>