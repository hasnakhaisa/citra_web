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
        <h2 style=\"margin-top:0px\"><?php echo \$button ?> ".ucfirst($table_name)." </h2>
        <form action=\"<?php echo \$action; ?>\" method=\"post\">";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text')
    {
    $string .= "\n\t    <div class=\"form-group\">
            <label for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
            <textarea class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?php echo $".$row["column_name"]."; ?></textarea>
        </div>";
    } else
    {
    $string .= "\n\t    <div class=\"form-group\">
            <label for=\"".$row["data_type"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
            <input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
        </div>";
    }
}
$string .= "\n\t    <input type=\"hidden\" name=\"".$pk."\" value=\"<?php echo $".$pk."; ?>\" /> ";
$string .= "\n\t    <button type=\"submit\" class=\"btn btn-primary\"><?php echo \$button ?></button> ";
$string .= "\n\t    <a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-success\">Cancel</a>";
$string .= "\n\t</form>
    </div>
</section>


<?php
\$this->load->view('template/js');
\$this->load->view('template/foot');

?>
";

$hasil_view_form = createFile($string, $target."views/" . $c_url . "/" . $v_form_file);

?>