<?php 

$string = "<?php
\$this->load->view('template/head');
\$this->load->view('template/topbar');
\$this->load->view('template/sidebar');
?>


<!-- Content Header (Page header) -->
<section class=\"content-header\">
    <h1>
        Data ".ucfirst($table_name)."
    </h1>
    <ol class=\"breadcrumb\">
        <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
        <li class=\"active\">".ucfirst($table_name)."</li>
    </ol>
</section>

<!-- Main content -->
<section class=\"content\">
    
    <div class=\"box\" style=\"padding : 15px\">
        <h2 style=\"margin-top:0px\"></h2>
        <table class=\"table\">";
foreach ($non_pk as $row) {
    $string .= "\n\t    <tr><td>".label($row["column_name"])."</td><td><?php echo $".$row["column_name"]."; ?></td></tr>";
}
$string .= "\n\t    <tr><td></td><td><a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-success\">Cancel</a></td></tr>";
$string .= "\n\t</table>
        </div>
</section>


<?php
\$this->load->view('template/js');
\$this->load->view('template/foot');

?>
";



$hasil_view_read = createFile($string, $target."views/" . $c_url . "/" . $v_read_file);

?>