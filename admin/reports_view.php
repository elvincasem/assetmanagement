<?php
include('header.php');
$reportno = $_GET['rpt'];
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header"><i class="fa fa-files-o fa-1x"></i> Reports
						</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-tasks fa-fw"></i> 
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                 
								 <div class="dataTable_wrapper">
					<table class="table table-striped table-bordered table-hover" id="dataTables-items">
						<thead>
							<tr>
							<?php
							if($reportno =='1'){
								echo"<th>Name</th>
								<th>Tag No</th>
								<th>Property No</th>
								<th>Serial</th>
								<th>Date Acquired</th>
								<th>Category</th>
								<th>Action</th>";
							}
							
							?>
								
							</tr>
						</thead>
						<tbody>
						
						<?php
						
						$itemlist = selectListSQL("SELECT * FROM equipments ");
						//print_r($employeelist);
						foreach ($itemlist as $rows => $link) {
							$equipno = $link['equipNo'];
							$equipname = $link['equipName'];
							$tagno = $link['tagno'];
							$propertyno = $link['propertyno'];
							$serialno = $link['serialno'];
							$dateacquired = $link['dateacquired'];
							$category = $link['category'];
							
							echo "<tr class='odd gradeX'>";
							echo "<td>$equipname</td>";
							echo "<td><a href='equipmentsdetails.php?id=$equipno'>$tagno</a></td>";
							echo "<td>$propertyno</td>";
							echo "<td>$serialno</td>";
							echo "<td>$dateacquired</td>";
							echo "<td>$category</td>";
							echo "<td class='center'> 
								
								<button class='btn btn-primary' onClick='editequipment($equipno)'  data-toggle='modal' data-target='#addEquipment'><i class='fa fa-edit'></i></button>
								<button class='btn btn-danger notification' id='notification' onClick='deleteequip($equipno)'><i class='fa fa-times'></i></button>
							</td>";
							echo "</tr>";
						}
						?>
						
						
						
							
						   
							
						</tbody>
					</table>
				</div>

								 
								 
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