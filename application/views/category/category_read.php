<?php
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Category
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Category</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    
    <div class="box" style="padding : 15px">
        <h2 style="margin-top:0px"></h2>
        <table class="table">
	    <tr><td>Category Name</td><td><?php echo $category_name; ?></td></tr>
	    <tr><td>Category Image</td><td><img width="50px" src="<?= base_url($category_image); ?>"></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('category') ?>" class="btn btn-success">Cancel</a></td></tr>
	</table>
        </div>
</section>


<?php
$this->load->view('template/js');
$this->load->view('template/foot');

?>
