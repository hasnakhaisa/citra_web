<!-- Left side column. contains the sidebar -->


<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/img/avatar5.png') ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Admin</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="<?php echo site_url('dashboard') ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
                </a>
            </li>

            <li class="treeview">
                <a href="<?php echo site_url('category') ?>">
                    <i class="fa fa-table"></i> <span>Category</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo site_url('product') ?>">
                    <i class="fa fa-table"></i> <span>Product</span>
                </a>
            </li>

           
            <li class="treeview">
                <a href="<?php echo site_url('user') ?>">
                    <i class="fa fa-table"></i> <span>User</span>
                </a>
            </li>
             <li class="treeview">
                <a href="<?php echo site_url('transaction') ?>">
                    <i class="fa fa-table"></i> <span>Transaction</span>
                </a>
            </li>
             <li class="treeview">
                <a href="<?php echo site_url('transaction_detail') ?>">
                    <i class="fa fa-table"></i> <span>Transaction Detail</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo site_url('iklan') ?>">
                    <i class="fa fa-table"></i> <span>Iklan</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<aside>
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
