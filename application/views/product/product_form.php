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
        <h2 style="margin-top:0px"><?php echo $button ?> Product </h2>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="varchar">Product Name <?php echo form_error('product_name') ?></label>
            <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name" value="<?php echo $product_name; ?>" required/>
        </div>
	    <div class="form-group">
            <label for="varchar">Category Product <?php echo form_error('product_category') ?></label>
            <select class="form-control" name="product_category" id="product_category" required>

                <?php
                 

                    $data = $product_category['list'];
                    for ($i=0; $i < sizeof($data); $i++) { 

                        echo "<option ";

                        if( ($data[$i]->{'category_ID'}) == ($product_category['checked']) ) {
                            echo " selected";
                        };


                        echo " value='".$data[$i]->{'category_ID'}."'>".$data[$i]->{'category_name'}."</option>";
                    }
                    
                ?>
            </select>
        </div>
	    <div class="form-group">
            <label for="int">Product Price <?php echo form_error('product_price') ?></label>
            <input type="text" class="form-control" name="product_price" id="product_price" placeholder="Product Price" value="<?php echo $product_price; ?>"  required/>
        </div>
	    <div class="form-group">
            <label for="product_description">Product Description <?php echo form_error('product_description') ?></label>
            <textarea class="form-control" rows="3" name="product_description" id="product_description" placeholder="Product Description" required><?php echo $product_description; ?></textarea >
        </div>
	    <div class="form-group">
            <label for="product_time_duration">Product Time Duration (day) <?php echo form_error('product_time_duration') ?></label>
            <input type="text" class="form-control" name="product_time_duration" id="product_time_duration" placeholder="Product Time Duration" value="<?php echo $product_time_duration; ?>"  required/>
        </div>
        <div class="form-group">
            <label for="product_image">Product Image  <?php echo form_error('product_image') ?></label>
            <?php
            if(!empty($product_image)){

                

              echo $product_image ;
            
            }
            else{
                echo "error";


            }
            ?>
            <input type="file" name="product_image" class="form-control" id="product_image"  value="<?php echo $product_image  ?>" required>
            

        </div>

	    <input type="hidden" name="product_ID" value="<?php echo $product_ID; ?>" /> 
         <div class="form-group">
            <label for="product_dimensions">Product Dimension <?php echo form_error('product_dimensions') ?></label>
            <input type="text" class="form-control" name="product_dimensions" id="product_dimensions" placeholder="Product Dimensions" value="<?php echo $product_dimensions; ?>"  required/>
        </div>
         <div class="form-group">
            <label for="product_weight">Product Weight (kg) <?php echo form_error('product_weight') ?></label>
            <input type="text" class="form-control" name="product_weight" id="product_weight" placeholder="Product Weight" value="<?php echo $product_weight; ?>" required/>
        </div>
         <div class="form-group">
            <label for="product_weight">Populer <?php echo form_error('popular') ?></label>
            <br>
            <input type="checkbox"  name="popular" id="popular" placeholder="Popular" value="popular" />
           
        </div>






	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('product') ?>" class="btn btn-success">Cancel</a>
	</form>
    </div>
</section>


<?php
$this->load->view('template/js');
$this->load->view('template/foot');

?>
