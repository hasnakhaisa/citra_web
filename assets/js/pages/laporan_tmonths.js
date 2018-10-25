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

                var t = $("#mytableTMonth").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytableTMonth_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                                        
                            }
                        });
                    },
                    oLanguage: {
                        sLengthMenu: " _MENU_ Tampilkan data per halaman",
                        sSearch: "Pencarian: ", 
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
                    ajax: {"url": URLa, "type": "POST"},
                    columns: [
                        {
                            "data": "id_pelayaran",
                            "orderable": false
                        },{"data": "waktu_berangkat"},{"data": "waktu_tiba"},{"data": "waktu_total"},{"data": "harga"},
                        {"data": "tugboat"},{"data": "nomor_lambung"},{"data": "nomor_plat"},{"data": "tanker"},{"data": "nahkoda"},
                       
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