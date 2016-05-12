<?php
include('header.php');
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-users fa-1x"></i> Employees
						<div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-lg dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Add New Item</a>
                                        </li>
                                        <li><a href="#">Print All Items</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div></h1>
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
																<th>Employee ID</th>
																<th>Name</th>
																<th>First Name</th>
																<th>Available QTY</th>
																<th>Category</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															<tr class="odd gradeX">
																<td>1</td>
																<td>PC</td>
																<td>4500.00</td>
																<td>10</td>
																<td>Equipment</td>
																<td class="center"><button type="button" class="btn btn-default btn-circle"><i class="fa fa-eye"></i></button> <button type="button" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></button> <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></td>
															</tr>
															<tr class="odd gradeX">
																<td>2</td>
																<td>BOX</td>
																<td>75.00</td>
																<td>100</td>
																<td>Consumable</td>
																<td class="center"><button type="button" class="btn btn-default btn-circle"><i class="fa fa-eye"></i></button> <button type="button" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></button> <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></td>
															</tr>
															<tr class="odd gradeX">
																<td>3</td>
																<td>PC</td>
																<td>15.00</td>
																<td>200</td>
																<td>Consumable</td>
																<td class="center"><button type="button" class="btn btn-default btn-circle"><i class="fa fa-eye"></i></button> <button type="button" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></button> <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></td>
															</tr>
														   
															
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