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
        <h2 style="margin-top:0px"><?php echo $button ?> Transaction </h2>
        <form action="<?php echo $action; ?>" method="post">
	  
         <div class="form-group">
            <label for="varchar">Transaction Status <?php echo form_error('transaction_status') ?></label>
            <select class="form-control" name="transaction_status" id="transaction_status" required>
                <?php
                 
                    $data = $transaction_status['list'];
                    for ($i=0; $i < sizeof($data); $i++) { 

                        echo "<option ";
                        if( $data[$i] == ($transaction_status['checked']) ) {
                            echo "selected";
                        };

                        echo " value='".$data[$i]."'>".$data[$i]."</option>";
                    }
                ?>
            </select>
        </div>
	    <div class="form-group">
            <label for="datetime">Transaction Time <?php echo form_error('transaction_time') ?></label>
            <input type="text" class="form-control" name="transaction_time" id="transaction_time" placeholder="Transaction Time" value="<?php echo $transaction_time; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">USER ID <?php echo form_error('user_ID') ?></label>
            <select class="form-control" name="user_ID" id="user_ID" required>

                <?php
                    echo "<option value =''>- Pilih Category  Product-</option>";
                    
                    $data = $user_ID['list'];
                    for ($i=0; $i < sizeof($data); $i++) { 
    
                        echo "<option ";
                            
                        if( ($data[$i]->{'user_ID'}) == ($user_ID['checked']) ) {
                            echo " selected";
                        };
                       
                      
                        echo " value='".$data[$i]->{'user_ID'}."'>".$data[$i]->{'user_ID'}."</option>";
                    }
                 
                   
                ?>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Destination Address <?php echo form_error('destination_address') ?></label>
            <input type="text" class="form-control" name="destination_address" id="destination_address" placeholder="Destination Address" value="<?php echo $destination_address; ?>" />
        </div>
	    <div class="form-group">
            <label for="information">Information <?php echo form_error('information') ?></label>
            <textarea class="form-control" rows="3" name="information" id="information" placeholder="Information"><?php echo $information; ?></textarea>
        </div>
        
      
	    <input type="hidden" name="transaction_ID" value="<?php echo $transaction_ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('transaction') ?>" class="btn btn-success">Cancel</a>
	</form>
    </div>
</section>


<?php
$this->load->view('template/js');
$this->load->view('template/foot');

?>
