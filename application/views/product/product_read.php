<?php
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Product
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Product</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    
    <div class="box" style="padding : 15px">
        <h2 style="margin-top:0px"></h2>
        <table class="table">
             <tr><td>Product ID</td><td><?php echo $product_ID; ?></td></tr>
	    <tr><td>Product Image</td><td><img width="50px" src="<?= base_url($product_image); ?>"></td></tr>
        <tr><td>Product Name</td><td><?php echo $product_name; ?></td></tr>
	    <tr><td>Product Category</td><td><?php echo $product_category->category_name; ?></td></tr>
	    <tr><td>Product Price</td><td><?php echo $product_price; ?></td></tr>
	    <tr><td>Product Description</td><td><?php echo $product_description; ?></td></tr>
	    <tr><td>Product Time Duration</td><td><?php echo $product_time_duration; ?></td></tr>
        <tr><td>Product Dimension</td><td><?php echo $product_dimensions ?></td></tr>
        <tr><td>Product Weight</td><td><?php echo $product_weight; ?></td></tr>
        <tr><td>Popular</td><td><?php echo $popular; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('product') ?>" class="btn btn-success">Cancel</a></td></tr>
	</table>
        </div>
</section>


<?php
$this->load->view('template/js');
$this->load->view('template/foot');

?>
