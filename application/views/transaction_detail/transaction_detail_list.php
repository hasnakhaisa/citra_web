<?php
$this->load->view('template/head');
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
        border-top: 3px solid #dd137b;
    }

    .msg-success{
        color : green;
    }

</style>


<?php
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
    
    <div class="box">
        <div class="box-header with-border">

            <div class="col-md-6 ">
                <?php echo anchor(site_url('transaction_detail/create'), 'Tambah Data', 'class="btn btn-primary"'); ?>
	    
            </div>
            
            <div class="col-md-6 text-right">
                <div style="margin-top: 8px" class="msg-success" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>            

            
        </div>
        <table class="table table-bordered table-striped" id="mytable" width="100%">
            <thead>
                <tr>
                    <th width="80px">No</th>
                  
        		 
        		    <th>Product ID</th>
                    <th>Transaction ID </th>
        		    <th>Qty</th>
        		    <th>Price</th>
        		    <th>Total Payment</th>
        		    <th width="200px">Action</th>
                </tr>
            </thead>
	    
        </table>

    </div>

</section>

<?php
$this->load->view('template/js');

?>

        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
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
                        sLengthMenu: " _MENU_ Tampilkan data per halaman",
                        sSearch: "Pencarian (Tekan Enter): ", 
                        sZeroRecords: "Maaf, tidak ada data yang ditemukan",
                        sInfo: "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
                        sInfoEmpty: "Menampilkan 0 s/d 0 dari 0 data",
                        sInfoFiltered: "(di filter dari _MAX_ total data)",
                        sProcessing: "loading...",
                        oPaginate: {
                            sFirst: "<<",
                            sLast: ">>", 
                            sPrevious: "<", 
                            sNext: ">"
                        }
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "transaction_detail/json", "type": "POST"},
                    columns: [
                        {
                            "data": "detail_ID",
                            "orderable": false
                        },
                       
                        {"data": "product_ID"},
                         {"data": "transaction_ID"},
                        {"data": "quantity"},
                        {"data": "price"},
                        {"data": "total_payment"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
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

$this->load->view('template/foot');

?>
