<?php
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        User_admin
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User_admin</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    
    <div class="box">
        <div class="box-header with-border">
            <div class="col-md-4">
                <h2 style="margin-top:0px">User_admin List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>            
           <div class="col-md-4 text-right">
                <?php echo anchor(site_url('user_admin/create'),'Create', 'class="btn btn-primary"'); ?>
	 

            </div>
        </div>
    
        <div class="box-body">

            <table class="table table-bordered" style="margin-bottom: 10px">
                <tr>
                    <th>No</th>
		<th>Admin Name</th>
		<th>Admin Password</th>
		<th>Action</th>
            </tr><?php
            foreach ($user_admin_data as $user_admin)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $user_admin->admin_name ?></td>
			<td><?php echo $user_admin->admin_password ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('user_admin/read/'.$user_admin->admin_ID),'Read'); 
				echo ' | '; 
				echo anchor(site_url('user_admin/update/'.$user_admin->admin_ID),'Update'); 
				echo ' | '; 
				echo anchor(site_url('user_admin/delete/'.$user_admin->admin_ID),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
            </table>

        </div>

        <div class="box-footer">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>

    </div>

</section>

<?php
$this->load->view('template/js');
$this->load->view('template/foot');

?>
