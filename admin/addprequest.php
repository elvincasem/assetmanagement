<?php
include('header.php');
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" style="color:green;"><i class="fa fa-money fa-1x"></i> PURCHASE REQUESTS
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
                            </div></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Purchase Request Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="addprequestitem.php">
                                        <div class="form-group">
                                            <label>PR Number</label>
                                            <input class="form-control" value="" placeholder="PR-2016-01" tabindex="1">
                                            
                                        </div>
										<div class="form-group">
                                            <label>Purpose</label>
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                    
                                        
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                            <label>Office/Department</label>
                                            <input class="form-control" tabindex="2">
                                            
                                        </div>
									<div class="form-group">
                                            <label>Request Date</label>
                                            <input type="date" class="form-control" tabindex="4" value="2016-02-01">
                                            
                                        </div>
									<div class="form-group">
                                            <label>Requested By</label>
                                            
                                            <select class="form-control">
                                                <?php
						include_once("include/functions.php");			
						$userlist = selectListSQL("SELECT eid, CONCAT(fname, ' ', lname) AS employee_name FROM employee ORDER BY fname");
						foreach ($userlist as $rows => $link) {
							$eid = $link['eid'];
							$ename = $link['employee_name'];
							echo "<option value='$eid'>$ename</option>";
						}
						?>
                                     
                                            </select>
                                            
                                        </div>
									<button type="submit" class="btn btn-warning" onClick="javascript: history.go(-1);">Cancel</button>	
									<button type="reset" class="btn btn-default">Clear</button>
                                    <button type="submit" class="btn btn-success">Save</button>
                                    
									</form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
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