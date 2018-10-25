<?php
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data User_admin
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User_admin</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    
    <div class="box" style="padding : 15px">
        <h2 style="margin-top:0px"></h2>
        <table class="table">
	    <tr><td>Admin Name</td><td><?php echo $admin_name; ?></td></tr>
	    <tr><td>Admin Password</td><td><?php echo $admin_password; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('user_admin') ?>" class="btn btn-success">Cancel</a></td></tr>
	</table>
        </div>
</section>


<?php
$this->load->view('template/js');
$this->load->view('template/foot');

?>
