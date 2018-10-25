<?php
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data User
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    
    <div class="box" style="padding : 15px">
        <h2 style="margin-top:0px"></h2>
        <table class="table">
        <tr><td>User ID</td><td><?php echo $user_ID; ?></td></tr>
	    <tr><td>User Name</td><td><?php echo $user_name; ?></td></tr>
	    <tr><td>User Email</td><td><?php echo $user_email; ?></td></tr>
	    <tr><td>User Telephone</td><td><?php echo $user_telephone; ?></td></tr>
	    <tr><td>User Address</td><td><?php echo $user_address; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('user') ?>" class="btn btn-success">Cancel</a></td></tr>
	</table>
        </div>
</section>


<?php
$this->load->view('template/js');
$this->load->view('template/foot');

?>
