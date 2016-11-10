<?php 
if($_SESSION['userType']=='staff'){
	$display = "hidden";
}
?>
<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-2x"></i> DASHBOARD</a>
                        </li>
						<li>
                            <a href="#"  style="color:#bd0000;"><i class="fa fa-cubes fa-2x"></i> ASSET MANAGEMENT<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<li>
									<a href="requisition.php" style="color:#000;"><i class="fa fa-check-square-o fa-2x"></i> REQUISITION</a>
								</li>
                               <li>
									<a href="equipments.php" style="color:#000;"><i class="fa fa-desktop fa-2x"></i> EQUIPMENTS</a>
								</li>
								<li>
										<a href="items.php" style="color:#000;"><i class="fa fa-briefcase fa-2x"></i> ITEMS</a>
								</li>
								
								<!-- <li>
									<a href="items" style="color:#bd0000;"><i class="fa fa-briefcase fa-2x"></i> ITEMS<span class="fa arrow"></span></a></a>
									
									<ul class="nav nav-third-level">
									
									<li>
										<a href="items_baseunit.php" style="color:#000;"><i class="fa fa-columns fa-2x"></i> Base Unit of Measure</a>
									</li>
									</ul>
								</li> -->
								<li>
									<a href="suppliers.php" style="color:#000;"><i class="fa fa-cubes fa-2x"></i> SUPPLIERS</a>
								</li>
                                <li>
                                    <a href="inventory.php" style="color:#000;"><i class="fa fa-gears fa-2x" style="bgcolor:#000;"></i> INVENTORY</a>
                                </li>
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li <?php echo "class='".$display."'";?>>
                            <a href="#"  style="color:#bd0000;"><i class="fa fa-list fa-2x"></i> ORDER MANAGEMENT<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<li>
									<a href="prequest.php" style="color:#0bafc8;"><i class="fa fa-share-square-o fa-2x"></i> PURCHASE REQUESTS</a>
								</li>
								<li>
									<a href="#" style="color:gray;"><i class="fa fa-money fa-2x"></i> PURCHASE ORDERS</a>
								</li>
								<li>
									<a href="#" style="color:gray;"><i class="fa fa-reply fa-2x"></i> RECEIVING</a>
								</li>
								
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
						
                        
                        <li>
                            <a href="reports.php" style="color:#000000;"><i class="fa fa-files-o fa-2x"></i> REPORTS</a>
                        </li>
						<li <?php echo "class='".$display."'";?>>
                            <a href="#"  style="color:#bd0000;"><i class="fa fa-gear fa-2x"></i> SETTINGS<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<li>
									<a href="employees.php" style="color:#000000;"><i class="fa fa-user fa-2x"></i> EMPLOYEES</a>
								</li>
								<li>
                                    <a href="users.php" ><i class="fa fa-user fa-2x" style="bgcolor:green;"></i> Users</a>
                                </li>
                               <!-- <li>
                                    <a href="alerts.php"><i class="fa fa-bell fa-2x"></i> Alerts</a>
                                </li>
                                <li>
                                    <a href="#" ><i class="fa fa-gears fa-2x" style="bgcolor:green;"></i> System Settings</a>
                                </li> -->
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->