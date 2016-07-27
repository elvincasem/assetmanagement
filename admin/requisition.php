<?php
include('header.php');
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="color:#000;"><i class="fa fa-check-square-o fa-1x"></i> REQUISITION AND ISSUE SLIP
						<div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-lg dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="addprequest.php">Add New Requisition</a>
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
								<div class="panel panel-default">
											<div class="panel-heading">
											   Requisition and Issue Slip List
											</div>
								<div class="panel-body">
								
												<div class="dataTable_wrapper">
													<table class="table table-striped table-bordered table-hover" id="dataTables-example">
														<thead>
															<tr>
																<th>RIS No.</th>
																<th>Date</th>
																<th>Requested By</th>
																<th>Purpose</th>
																<th>Status</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															<tr class="odd gradeX">
																<td>2016-0101</td>
																<td>02/10/2016</td>
																<td>Juan De La Cruz</td>
																<td>Scholarship unit use.</td>
																<td>Approved</td>
																
																<td class="center"><button type="button" class="btn btn-default btn-circle"><i class="fa fa-eye"></i></button> <button type="button" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></button> <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></td>
															</tr>
															<tr class="odd gradeX">
																<td>2016-0102</td>
																<td>02/10/2016</td>
																<td>Juan De La Cruz</td>
																<td>N/A</td>
																<td>Pending</td>
																
																<td class="center"><button type="button" class="btn btn-default btn-circle"><i class="fa fa-eye"></i></button> <button type="button" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></button> <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></td>
															</tr>
															<tr class="odd gradeX">
																<td>2016-0103</td>
																<td>02/10/2016</td>
																<td>Juan De La Cruz</td>
																<td>N/A</td>
																<td>Released</td>
																
																<td class="center"><button type="button" class="btn btn-default btn-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fa fa-eye"></i></button> <button type="button" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></button> <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></td>
																
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