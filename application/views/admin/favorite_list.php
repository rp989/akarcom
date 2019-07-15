<?php
include_once "include/templet/nav.php";

?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/assetsAdmin/datatable/datatables.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/assetsAdmin/datatable/DataTables-1.10.16/css/dataTables.foundation.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/assetsAdmin/datatable/Responsive-2.2.0/css/responsive.foundation.min.css"/>

<div class="container admin" >
    <div class="pageName">
        <?php echo _productsList ?>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <table id="table"
                                   class="table table-striped table-hover dt-responsive display nowrap" width="100%"
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th style="text-align: center;"><?php echo _userName; ?></th>
                                    <th style="text-align: center;"><?php echo _gsm; ?></th>
                                    <th style="text-align: center;"><?php echo _ViewPost; ?></th>
                                    <th style="text-align: center;"><?php echo _active; ?></th>
                                    <th style="text-align: center;"><?php echo _Date; ?></th>
                                    <th style="text-align: center;"></th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<script src="assets/js/proudacts_list.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/assetsAdmin/datatable/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/assetsAdmin/datatable/DataTables-1.10.16/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css"
      href="https://cdn.datatables.net/v/dt/jszip-2.5.0/af-2.3.0/b-1.5.2/b-colvis-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/cr-1.5.0/sl-1.2.6/datatables.min.css"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/jszip-2.5.0/af-2.3.0/b-1.5.2/b-colvis-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/cr-1.5.0/sl-1.2.6/datatables.min.js"></script>

<script type="text/javascript">
    var table;
    $(document).ready(function () {
        // "language": {
        //     "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Arabic.json"
        // },
        table = $('#table').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "searching": true,
            "select": true,
            "ajax": {
                "url": "<?php echo base_url()?>MemberArea/FavoriteData",
                "type": "POST"
            },
            "columns": [
                {
                    "data": "ur_name"
                },
                {
                    "data": "ur_gsm"
                },
                {
                    "data": "view"
                },
                {
                    "data": "active"
                },
                {
                    "data": "ur_timestamp"
                },
                {
                    "data": "edit"
                }
            ],
            "columnDefs": [
                {
                    "targets": [0],
                    "orderable": false
                }
            ]
        });
        new $.fn.dataTable.Buttons(table, {
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ]
        });

        table.buttons().container().appendTo($('.col-sm-6:eq(0)', table.table().container()));

        $(document).on("click",".edit-btn",function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.ajax({
                url: "<?php echo base_url();?>MemberArea/editFavoritePost/"+id,
                type: "POST",
                data: {},
                cache: false,
                success: function (data) {
                    table.ajax.reload(null, false);
                }
            });
        });
        $('#table').DataTable().ajax.reload();
    });
</script>