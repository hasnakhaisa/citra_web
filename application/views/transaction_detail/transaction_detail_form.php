<?php
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Transaction_detail
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Transaction_detail</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    
    <div class="box" style="padding : 15px">
        <h2 style="margin-top:0px"><?php echo $button ?> Transaction_detail </h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Transaction ID <?php echo form_error('transaction_ID') ?></label>
            <input type="text" class="form-control" name="transaction_ID" id="transaction_ID" placeholder="Transaction ID" value="<?php echo $transaction_ID; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Product ID <?php echo form_error('product_ID') ?></label>
            <input type="text" class="form-control" name="product_ID" id="product_ID" placeholder="Product ID" value="<?php echo $product_ID; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Quantity <?php echo form_error('quantity') ?></label>
            <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" value="<?php echo $quantity; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Price <?php echo form_error('price') ?></label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo $price; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Total Payment <?php echo form_error('total_payment') ?></label>
            <input type="text" class="form-control" name="total_payment" id="total_payment" placeholder="Total Payment" value="<?php echo $total_payment; ?>" />
        </div>
	    <input type="hidden" name="detail_ID" value="<?php echo $detail_ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('transaction_detail') ?>" class="btn btn-success">Cancel</a>
	</form>
    </div>
</section>


<?php
$this->load->view('template/js');
$this->load->view('template/foot');

?>
