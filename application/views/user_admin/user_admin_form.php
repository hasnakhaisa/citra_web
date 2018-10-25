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
        <h2 style="margin-top:0px"><?php echo $button ?> User_admin </h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Admin Name <?php echo form_error('admin_name') ?></label>
            <input type="text" class="form-control" name="admin_name" id="admin_name" placeholder="Admin Name" value="<?php echo $admin_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Admin Password <?php echo form_error('admin_password') ?></label>
            <input type="text" class="form-control" name="admin_password" id="admin_password" placeholder="Admin Password" value="<?php echo $admin_password; ?>" />
        </div>
	    <input type="hidden" name="admin_ID" value="<?php echo $admin_ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user_admin') ?>" class="btn btn-success">Cancel</a>
	</form>
    </div>
</section>


<?php
$this->load->view('template/js');
$this->load->view('template/foot');

?>
