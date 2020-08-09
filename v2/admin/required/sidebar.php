<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-secondary elevation-4">
    <!-- Brand Logo -->
    <a href="../index" class="brand-link">
        <img src="../../vendor/dist/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold text-danger ml-3 h3">R O C A</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar"> 
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <?php if (strcmp($_SESSION["admin_id"], "ROCA2019GYAN") == 0) { ?>
			<a href="../profile/profile" class="mt-2">
				<img src="../../vendor/dist/img/admin.png" class="img-circle elevation-1 ml-3 mr-3" alt="User Image">
				<span class="brand-text font-weight-bold mt-auto text-dark h6"><?php echo $_SESSION["admin_name"]; ?></span>
			</a>
            <?php } else { ?>
            <a href="../profile/profile" class="mt-2">
                <img src="../../vendor/extra/members/<?php echo $_SESSION["admin_photo"]; ?>" class="img-circle elevation-1 ml-3 mr-3" alt="User Image">
                <span class="brand-text font-weight-bold text-dark h6"><?php echo $_SESSION["admin_name"]; ?></span>
            </a>
            <?php } ?>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>DashBoard <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
						
						<li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fas fa-calendar nav-icon"></i>
                                <p>Notice <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../notice/add" class="nav-link">
                                        <i class="fas fa-plus-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../notice/view" class="nav-link">
                                        <i class="fas fa-eye nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
								<li class="nav-item">
                                    <a href="../notice/publish" class="nav-link">
                                        <i class="fas fa-upload nav-icon"></i>
                                        <p>Publish</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
						
						<li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fas fa-clipboard-list nav-icon"></i>
                                <p>Events <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../event/add" class="nav-link">
                                        <i class="fas fa-plus-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../event/view" class="nav-link">
                                        <i class="fas fa-eye nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
						
						<li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fas fa-images nav-icon"></i>
                                <p>Gallery <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../gallery/add" class="nav-link">
                                        <i class="fas fa-plus-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../gallery/view" class="nav-link">
                                        <i class="fas fa-eye nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
						
						<li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Register User <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../user/add" class="nav-link">
                                        <i class="fas fa-plus-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../user/view" class="nav-link">
                                        <i class="fas fa-eye nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
								<li class="nav-item">
                                    <a href="../user/unregister" class="nav-link">
                                        <i class="fas fa-user-slash nav-icon"></i>
                                        <p>Unregister User</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../user/transaction" class="nav-link">
                                        <i class="fas fa-rupee-sign nav-icon"></i>
                                        <p>Transaction</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
						
						<li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fas fa-user-shield nav-icon"></i>
                                <p>Co-ordinator <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../coordinator/add" class="nav-link">
                                        <i class="fas fa-plus-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../coordinator/view" class="nav-link">
                                        <i class="fas fa-eye nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
						
						<li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fas fa-user-friends nav-icon"></i>
                                <p>Participants <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../participant/member" class="nav-link">
                                        <i class="fas fa-user-secret nav-icon"></i>
                                        <p>ROCA Members</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../participant/subscriber" class="nav-link">
                                        <i class="fas fa-user-ninja nav-icon"></i>
                                        <p>Subscribers</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
						
						<li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Team &amp; Support <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../team/member" class="nav-link">
                                        <i class="fas fa-user-secret nav-icon"></i>
                                        <p>ROCA Members</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../team/subscriber" class="nav-link">
                                        <i class="fas fa-user-ninja nav-icon"></i>
                                        <p>Subscribers</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
						
						<li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fas fa-book nav-icon"></i>
                                <p>Study Material <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../study/add" class="nav-link">
                                        <i class="fas fa-plus-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../study/view" class="nav-link">
                                        <i class="fas fa-eye nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
						
						<?php if($_SESSION['admin_role']=="ADMINISTRATOR") { ?> 
						
						<li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fas fa-rupee-sign nav-icon"></i>
                                <p>Payment Mode <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../payment/add" class="nav-link">
                                        <i class="fas fa-plus-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../payment/view" class="nav-link">
                                        <i class="fas fa-eye nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
						
						<li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fas fa-registered nav-icon"></i>
                                <p>Registration <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../registration/registration" class="nav-link">
                                        <i class="fas fa-hourglass-start nav-icon"></i>
                                        <p>Start / Stop</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
						
						<li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fas fa-users-cog nav-icon"></i>
                                <p>Admin <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../admin/add" class="nav-link">
                                        <i class="fas fa-plus-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../admin/view" class="nav-link">
                                        <i class="fas fa-eye nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
						
						<?php } ?>
						
                    </ul>
                </li>
				
                <li class="nav-item">
                    <a href="../login/logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
				
                <!--
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Simple Link <span class="right badge badge-danger">New</span></p>
                    </a>
                </li>
                -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>