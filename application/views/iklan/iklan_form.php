<?php
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Iklan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Iklan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    
    <div class="box" style="padding : 15px">
        <h2 style="margin-top:0px"><?php echo $button ?> Iklan </h2>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
       
        
      
        <div class="form-group">
            
            <label for="gambar">Gambar Iklan (Pastikan Nama File tidak boleh lebih dari 10 karakter) <?php echo form_error('gambar') ?></label>
      
            <input type="file" name="gambar" class="form-control" id="gambar" required>
            
        </div>

        <input type="hidden" name="id_iklan" value="<?php echo $id_iklan; ?>" /> 
        




        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('product') ?>" class="btn btn-success">Cancel</a>
    </form>
    </div>
</section>


<?php
$this->load->view('template/js');
$this->load->view('template/foot');

?>
