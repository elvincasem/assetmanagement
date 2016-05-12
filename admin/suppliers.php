<?php
include('header.php');
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-cubes fa-1x" style="color:green;"></i> SUPPLIERS
						<div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-lg dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Add New Supplier</a>
                                        </li>
                                        <li><a href="#">Print All Suppliers</a>
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
															<tr class="odd gradeX">
																<td>PC 4 Me</td>
																<td>San Fernando City La Union</td>
																<td>700-1234</td>

																<td class="center"><button type="button" class="btn btn-default btn-circle" ><i class="fa fa-eye"></i></button> <button type="button" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></button> <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></td>
															</tr>
															<tr class="odd gradeX">
																<td>Morning Star General Merchandise</td>
																<td>San Fernando City La Union</td>
																<td>888-1234</td>

																<td class="center"><button type="button" class="btn btn-default btn-circle"><i class="fa fa-eye"></i></button> <button type="button" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></button> <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></td>
															</tr>
															<tr class="odd gradeX">
																<td>National Bookstore</td>
																<td>Mannah Mall, CSF</td>
																<td>888-2345</td>

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