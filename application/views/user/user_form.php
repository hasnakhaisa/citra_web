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
        <h2 style="margin-top:0px"><?php echo $button ?> User </h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">User Name <?php echo form_error('user_name') ?></label>
            <input type="text" class="form-control" name="user_name" id="user_name" placeholder="User Name" value="<?php echo $user_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">User Password <?php echo form_error('user_password') ?></label>
            <input type="password" class="form-control" name="user_password" id="user_password" placeholder="User Password" value="<?php echo $user_password; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">User Email <?php echo form_error('user_email') ?></label>
            <input type="text" class="form-control" name="user_email" id="user_email" placeholder="User Email" value="<?php echo $user_email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">User Telephone <?php echo form_error('user_telephone') ?></label>
            <input type="text" class="form-control" name="user_telephone" id="user_telephone" placeholder="User Telephone" value="<?php echo $user_telephone; ?>" />
        </div>
	    <div class="form-group">
            <label for="user_address">User Address <?php echo form_error('user_address') ?></label>
            <textarea class="form-control" rows="3" name="user_address" id="user_address" placeholder="User Address"><?php echo $user_address; ?></textarea>
        </div>
	    <input type="hidden" name="user_ID" value="<?php echo $user_ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user') ?>" class="btn btn-success">Cancel</a>
	</form>
    </div>
</section>


<?php
$this->load->view('template/js');
$this->load->view('template/foot');

?>
