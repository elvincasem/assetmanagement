<?php
include('header.php');
include_once("include/functions.php");	
?>
<!-- Morris Charts CSS -->


<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-dashboard fa-1x"></i> Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-desktop fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php
												
										$current_items = singleSQL("SELECT COUNT(*) FROM equipments");
										echo $current_items;
										?></div>
                                    <div>Total Equipment</div>
                                </div>
                            </div>
                        </div>
                        <a href="equipments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				
				<div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-briefcase fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php
												
										$current_items = singleSQL("SELECT COUNT(*) FROM items");
										echo $current_items;
										?></div>
                                    <div>Total Office Supply</div>
                                </div>
                            </div>
                        </div>
                        <a href="items.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				
				<div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-thumbs-o-down fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php
										$current_items = singleSQL("SELECT COUNT(*) FROM items WHERE unit='PC' AND inventory_qty<5");
										echo $current_items;
										?></div>
                                    <div>Low on Supply</div>
                                </div>
                            </div>
                        </div>
                        <a href="items.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php
										$current_requisition = singleSQL("SELECT COUNT(*) FROM requisition_details");
										echo $current_requisition;
										?></div>
                                    <div>Total Requesition</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                
            </div>
            <!-- /.row -->
            <div class="row">
                
                <div class="col-lg-12">
                    <?php
							
					$conn = dbConnect();
					$sqlselect2 = "SELECT COUNT(*) AS xkey, MONTHNAME(requisition_date) AS ykey FROM requisition_details WHERE EXTRACT(YEAR FROM requisition_date)='2016' GROUP BY ykey ORDER BY EXTRACT(MONTH FROM requisition_date) 
";
					$stmt2 = $conn->prepare($sqlselect2);
					$stmt2->execute();
					$reqitems = $stmt2->fetchAll(PDO::FETCH_ASSOC);
					$jsonvalue = json_encode($reqitems);
					echo "<input type='hidden' id='indexbarchard' value='$jsonvalue'>";
					?>
					
					<div id="morris-bar-chart"></div>
					
                    
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
	
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script src="js/morris-data.js"></script>

<?php
include('footer.php');
?>