<?php 

$string = "<?php
\$this->load->view('template/head');
?>

<style>
    .dataTables_wrapper {
        padding: 15px;
    }
    
    .dataTables_processing {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        margin-left: -50%;
        margin-top: -25px;
        padding-top: 20px;
        text-align: center;
        font-size: 1.2em;
        color:grey;
    }

    .box{
        border-top: 3px solid #337ab7;
    }

    .msg-success{
        color : green;
    }

</style>


<?php
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
    
    <div class=\"box\">
        <div class=\"box-header with-border\">

            <div class=\"col-md-6 \">
                <?php echo anchor(site_url('".$c_url."/create'), 'Tambah Data', 'class=\"btn btn-primary\"'); ?>";
if ($export_excel == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/excel'), 'Export Excel', 'class=\"btn btn-success\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/word'), 'Export Word', 'class=\"btn btn-success\"'); ?>";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/pdf'), 'Export PDF', 'class=\"btn btn-success\"'); ?>";
}
$string .= "\n\t    
            </div>
            
            <div class=\"col-md-6 text-right\">
                <div style=\"margin-top: 8px\" class=\"msg-success\" id=\"message\">
                    <?php echo \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : ''; ?>
                </div>
            </div>            

            
        </div>
        <table class=\"table table-bordered table-striped\" id=\"mytable\" width=\"100%\">
            <thead>
                <tr>
                    <th width=\"80px\">No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t    <th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t    <th width=\"200px\">Action</th>
                </tr>
            </thead>";

$column_non_pk = array();
foreach ($non_pk as $row) {
    $column_non_pk[] .= "{\"data\": \"".$row['column_name']."\"}";
}
$col_non_pk = implode(',', $column_non_pk);

$string .= "\n\t    
        </table>

    </div>

</section>

<?php
\$this->load->view('template/js');

?>

        <script src=\"<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>\"></script>
        <script src=\"<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>\"></script>
        <script type=\"text/javascript\">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        \"iStart\": oSettings._iDisplayStart,
                        \"iEnd\": oSettings.fnDisplayEnd(),
                        \"iLength\": oSettings._iDisplayLength,
                        \"iTotal\": oSettings.fnRecordsTotal(),
                        \"iFilteredTotal\": oSettings.fnRecordsDisplay(),
                        \"iPage\": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        \"iTotalPages\": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $(\"#mytable\").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sLengthMenu: \" _MENU_ Tampilkan data per halaman\",
                        sSearch: \"Pencarian: \", 
                        sZeroRecords: \"Maaf, tidak ada data yang ditemukan\",
                        sInfo: \"Menampilkan _START_ s/d _END_ dari _TOTAL_ data\",
                        sInfoEmpty: \"Menampilkan 0 s/d 0 dari 0 data\",
                        sInfoFiltered: \"(di filter dari _MAX_ total data)\",
                        sProcessing: \"loading...\",
                        oPaginate: {
                            sFirst: \"<<\",
                            sLast: \">>\", 
                            sPrevious: \"<\", 
                            sNext: \">\"
                        }
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {\"url\": \"".$c_url."/json\", \"type\": \"POST\"},
                    columns: [
                        {
                            \"data\": \"$pk\",
                            \"orderable\": false
                        },".$col_non_pk.",
                        {
                            \"data\" : \"action\",
                            \"orderable\": false,
                            \"className\" : \"text-center\"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>
<?php

\$this->load->view('template/foot');

?>
";


$hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_list_file);

?>