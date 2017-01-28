<?php
include('header.php');
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-files-o fa-1x"></i> Reports
						</h1>
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
                                    <div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Report Description</th>
								<th>View Report</th>
							</tr>
						</thead>
						<tbody>
							
							<tr>
								<td>Inventory with Low or Zero Stock</td>
								<td><a href="genreport.php?rpt=1"><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-eye"></i>
		</button></a> <a href="xls.php?rpt=1"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-download"></td></a>

							</tr>
							<tr>
								<td>Asset Assignment List</td>
								<td><a href="genreport.php?rpt=2"><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-eye"></i>
		</button></a> <a href="xls.php?rpt=2"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-download"></td></a>

							</tr>
							<tr>
								<td>Requisition Item by Employee</td>
								<td><a href="genreport.php?rpt=3"><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-eye"></i>
		</button></a> <a href="xls.php?rpt=3"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-download"></td></a>

							</tr>
							<tr>
								<td>Most Requested Item</td>
								<td><a href="genreport.php?rpt=4"><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-eye"></i>
		</button></a> <a href="xls.php?rpt=4"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-download"></td></a>

							</tr>
							<tr>
								<td>Current Inventory Status</td>
								<td><a href="genreport.php?rpt=5"><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-eye"></i>
		</button></a> <a href="xls.php?rpt=5"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-download"></td></a>

							</tr>
							
							
						</tbody>
					</table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-8">
                                    <div id="morris-bar-chart"></div>
                                </div>
                                <!-- /.col-lg-8 (nested) -->
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