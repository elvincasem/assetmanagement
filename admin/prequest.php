<?php
include('header.php');
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="color:green;"><i class="fa fa-money fa-1x"></i> PURCHASE REQUESTS
						<div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-lg dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="addprequest.php">Add New Purchase Request</a>
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
                            <i class="fa fa-tasks fa-fw"></i> Purchase Request List
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>PR Number</th>
                                                    <th>Request Date</th>
                                                    <th>Department</th>
                                                    <th>Requested By</th>
													<th>Status</th>
													<th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>PR-2016-01</td>
                                                    <td>10/21/2013</td>
                                                    <td>Admin</td>
                                                    <td>Juan M.</td>
													<td>Pending</td>
													<td><button type="button" class="btn btn-default btn-circle"><i class="fa fa-eye"></i></button> <button type="button" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></button> <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></td>
                                                </tr>
												<tr>
                                                    <td>PR-2016-02</td>
                                                    <td>10/21/2013</td>
                                                    <td>Supply</td>
                                                    <td>Juan M.</td>
													<td>Ordered</td>
													<td><button type="button" class="btn btn-default btn-circle"><i class="fa fa-eye"></i></button> <button type="button" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></button> <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></td>
                                                </tr>
												<tr>
                                                    <td>PR-2016-03</td>
                                                    <td>10/21/2013</td>
                                                    <td>Admin</td>
                                                    <td>Juan M.</td>
													<td>Received</td>
													<td><button type="button" class="btn btn-default btn-circle"><i class="fa fa-eye"></i></button> <button type="button" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></button> <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></td>
                                                </tr>
												<tr>
                                                    <td>PR-2016-04</td>
                                                    <td>10/21/2013</td>
                                                    <td>Admin</td>
                                                    <td>Juan M.</td>
													<td>Cancelled</td>
													<td><button type="button" class="btn btn-default btn-circle"><i class="fa fa-eye"></i></button> <button type="button" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></button> <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></td>
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