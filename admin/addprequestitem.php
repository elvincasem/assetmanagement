<?php
include('header.php');
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="color:green;"><i class="fa fa-money fa-1x"></i> PURCHASE REQUESTS ITEMS
						<div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-lg dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="addprequest.php">Add New Purchase Request</a>
                                        </li>
										<li><a href="prequest.php">Purchase Request List</a>
                                        </li>
                                        <li><a href="#">Print All Request</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Purchase Request Saved
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="prequest.php">
                                        <div class="form-group">
                                            <label>PR Number</label>
                                            <input disabled class="form-control" value="PR-2016-01" tabindex="1">
                                            
                                        </div>
										<div class="form-group">
                                            <label>Purpose</label>
                                            <textarea disabled class="form-control" rows="3"></textarea>
                                        </div>
                                    
                                        
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                            <label>Office/Department</label>
                                            <input disabled class="form-control" tabindex="2">
                                            
                                        </div>
									<div class="form-group">
                                            <label>Request Date</label>
                                            <input disabled class="form-control" tabindex="4" value="2016-02-01">
                                            
                                        </div>
									<div class="form-group">
                                            <label>Requested By</label>
                                            
                                            <select class="form-control" disabled>
                                                <option>Juan M.</option>
                                                <option>Archie L.</option>
                                                <option>Elvin Casem</option>
                                     
                                            </select>
                                            
                                        </div>
									
                                    
									</form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
								
								
								
								
                        
                        <!-- /.panel-heading -->
                        
                            
								
								
								
                            </div>
                            <!-- /.row (nested) -->
							
							<!-- start item contents -->
							
                                
							
							
							
							
                        </div>
                        <!-- /.panel-body -->
						
                    </div>
                    <!-- /.panel -->
                    
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
            <!-- /.row -->
			
			
			
			
			
			<!-- tabs-->
			
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							Item Details
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">List Items</a>
                                </li>
                                <li><a href="#profile" data-toggle="tab">Search Item</a>
                                </li>
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <div class="row">
				<div class="col-lg-12">
				<div class="panel panel-default">
                        <div class="panel-heading">
                           
                        </div>
				
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Item Description</th>
                                                    <th>Unit</th>
                                                    <th>QTY</th>
													<th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>21" Philips LCD Monitor</td>
                                                    <td>PCS</td>
                                                    <td>10</td>
													<td><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></td>
                                                </tr>
												     
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                </div>
				
				</div><!--end panel-->
			
			</div> <!-- end row-->
                                </div>
                                <div class="tab-pane fade" id="profile">
                                <div class="row">
								<div class="col-lg-12">
								<div class="panel panel-default">
											<div class="panel-heading">
											   Search Items
											</div>
								<div class="panel-body">
												<div class="dataTable_wrapper">
													<table class="table table-striped table-bordered table-hover" id="dataTables-example">
														<thead>
															<tr>
																<th>Description</th>
																<th>Unit</th>
																<th>Cost</th>
																<th>QTY</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															<tr class="odd gradeX">
																<td>21" Philips LCD Monitor</td>
																<td>PC</td>
																<td>4500.00</td>
																<td><input type="text"></td>
																<td class="center"><button type="submit" class="btn btn-success">Add Item</button></td>
															</tr>
															<tr class="odd gradeX">
																<td>Staple Wire</td>
																<td>BOX</td>
																<td>75.00</td>
																<td><input type="text"></td>
																<td class="center"><button type="submit" class="btn btn-success">Add Item</button></td>
															</tr>
															<tr class="odd gradeX">
																<td>700mb CD</td>
																<td>PC</td>
																<td>15.00</td>
																<td><input type="text"></td>
																<td class="center"><button type="submit" class="btn btn-success">Add Item</button></td>
															</tr>
														   
															
														</tbody>
													</table>
												</div>
								
								
								
								
											</div>
											
											</div><!-- table end -->
											</div><!-- panel default end-->
											
											</div> <!-- row end-->
                                </div>
                                
                            </div>
                        
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
			
			<!-- end tabs-->
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
        <!-- /#page-wrapper -->

    </div>

	
	
<?php
include('footer.php');
?>