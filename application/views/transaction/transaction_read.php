<?php
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Transaction
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Transaction</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    
    <div class="box" style="padding : 15px">
        <h2 style="margin-top:0px"></h2>
        <table class="table">
	    <tr><td>Transaction Status</td><td><?php echo $transaction_status; ?></td></tr>
       
	    <tr><td>Transaction Time</td><td><?php echo $transaction_time; ?></td></tr>
	    <tr><td>User ID</td><td><?php echo $user_ID; ?></td></tr>
	    <tr><td>Destination Address</td><td><?php echo $destination_address; ?></td></tr>
	    <tr><td>Information</td><td><?php echo $information; ?></td></tr>
     
	    <tr><td></td><td><a href="<?php echo site_url('transaction') ?>" class="btn btn-success">Cancel</a></td></tr>
	</table>
        </div>
</section>


<?php
$this->load->view('template/js');
$this->load->view('template/foot');

?>
