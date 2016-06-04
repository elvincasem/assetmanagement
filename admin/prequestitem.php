<?php
include('header.php');
include_once("include/functions.php");
	$prnumber = $_GET['prno'];
	$conn = dbConnect();
	$prequest = $conn->prepare("SELECT * FROM pr_list where prNo = '$prnumber'");
	echo "SELECT * FROM pr_list where prNo = '$prnumber'";
	$prequest->execute();
	$pr_result = $prequest->fetch(PDO::FETCH_ASSOC);
	$department = $pr_result['department'];
	$section = $pr_result['section'];
	$prdate = $pr_result['prDate'];
	$purpose = $pr_result['purpose'];
	
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="color:green;"><i class="fa fa-money fa-1x"></i> Purchase Request
							<div class="pull-right">
                                <button id="addprbutton" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addPR">
                                <i class="fa fa-plus-circle"></i> Edit PR Details
                            </button>
							
                             <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#">
                                <i class="fa fa-print"></i> Print
                            </button> 
                        </div>
					</h1>
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
                                <div class="col-lg-4">
                                    <form role="form" action="prequest.php">
                                        <div class="form-group">
                                            <label>PR Number</label>
                                            <input disabled class="form-control" value="<?php echo $prnumber;?>" tabindex="1">
                                            
                                        </div>
										
										<div class="form-group">
                                            <label>Office/Department</label>
                                            <input disabled class="form-control" tabindex="2" value="<?php echo $department; ?>">
                                            
                                        </div>
									<div class="form-group">
                                            <label>Section</label>
                                            <input disabled class="form-control" tabindex="2" value="<?php echo $section; ?>">
                                            
                                        </div>
									<div class="form-group">
                                            <label>Request Date</label>
                                            <input disabled class="form-control" tabindex="4" value="<?php echo $prdate; ?>">
                                            
                                        </div>
									<div class="form-group">
                                            <label>Requested By</label>
                                            
                                            <select class="form-control" disabled>
                                                <option>Juan M.</option>
                                                <option>Archie L.</option>
                                                <option>Elvin Casem</option>
                                     
                                            </select>
                                            
                                        </div>
                                    <div class="form-group">
                                            <label>Purpose</label>
                                            <textarea disabled class="form-control" rows="3"><?php echo $purpose; ?></textarea>
                                        </div>
                                        
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-8">
                                     <div class="panel panel-default">
										<div class="panel-heading">
											Purchase Request Saved
										</div>
										<div class="panel-body">
											asd
										
										</div>
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
			
			
	

			
        <!-- /#page-wrapper -->

    </div>

	
	
<?php
include('footer.php');
?>