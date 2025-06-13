<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
        <img src="assests/dist/img/Daily Tifins Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Daily Tiffins</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="assests/dist/img/users.png" class="img-circle elevation-2" alt="User  Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin Panel</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Registered Users Section -->
                <li class="nav-header">User  Management</li>
                <li class="nav-item">
                    <a href="registered.php" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Registered Users</p>
                    </a>
                </li>

                <!-- Order Section -->
                <li class="nav-header">Order Management</li>
                <li class="nav-item">
                    <a href="pending.php" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Pending Orders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="complete.php" class="nav-link">
                        <i class="nav-icon fas fa-check"></i>
                        <p>Completed Orders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="cancle_order_list.php" class="nav-link">
                        <i class="nav-icon fas fa-times"></i>
                        <p>Cancelled Orders</p>
                    </a>
                </li>

                <!-- Payment Gateway Section -->
                <li class="nav-header">Payment Management</li>
                <li class="nav-item">
                    <a href="list_payment_list.php" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-alt"></i>
                        <p>List Payment Gateway</p>
                    </a>
                </li>


                <!-- Notification Section -->
                <li class="nav-header">Notification Management</li>
                <li class="nav-item">
                    <a href="push_notification.php" class="nav-link">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>Send Notification</p>
                    </a>
                </li>

                <!-- Category Management -->
                <li class="nav-header">Category Management</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list-ol"></i>
                        <p>Main Category<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add_category.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Main Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="list_category.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Main Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list-ol"></i>
                        <p>Sub Category<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add_subcategory.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Sub Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="list_subcategory.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Sub Category</p>
                            </a>
                        </li>
                    </ul>
                </li>


               <!-- Meal Management -->
               <li class="nav-header">Meal Management</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-utensils"></i>
                        <p>Meals<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add_meal.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Meal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="list_meal.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Meals</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Time Slot & Date Management -->
                <li class="nav-header">Time Slot & Date Management</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clock"></i>
                        <p>Time Slot & Date<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add_timedate.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Time Slot & Date</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="list_timedate.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Time Slot & Date</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Banner Management -->
                <li class="nav-header">Banner Management</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>Banner<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add_banner.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Banner</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="list_banner.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Banner</p>
                            </a>
                        </li>
                    </ul>
                </li>


             

                <!-- Manager Management -->
                <li class="nav-header">Manager Management</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Manager<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add_manager.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Manager</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="list_manager.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Manager</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Dynamic Section Management -->
                <li class="nav-header">Dynamic Section Management</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>Section<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add_section.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Section</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="list_section.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Section</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="section_offer_service.php" class="nav-link">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>Section Offer Service<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add_service.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Service</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="list_service.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Service</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Notification Section -->
                <li class="nav-header">Notification Management</li>
                <li class="nav-item">
                    <a href="push_notification.php" class="nav-link">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>Send Notification</p>
                    </a>
                </li>

                <!-- Customer Section -->
                <li class="nav-header">Customer Management</li>
                <li class="nav-item">
                    <a href="customer.php" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Customers</p>
                    </a>
                </li>

                <!-- Logout -->
                <li class="nav-header">Logout</li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
