<section class="content-header">
    <h1>
       منشورات الجديدة
    </h1>
</section>
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"></h3>
        </div>
        <div class="box-body">
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



<script type="text/javascript">
    var table;
    $(document).ready(function () {

        table = $('#table').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "searching": true,
            "select": true,
            "ajax": {
                "url": "<?php echo base_url()?>MemberArea/pendingPostData",
                "type": "POST"
            },
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Arabic.json"
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
        // new $.fn.dataTable.Buttons(table, {
        //     buttons: [
        //         'copy', 'excel', 'pdf', 'print'
        //     ]
        // });

        // table.buttons().container().appendTo($('.col-sm-6:eq(0)', table.table().container()));

        $(document).on("click", ".edit-btn", function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var active = $(this).attr('data-active');
            alert(id);
            $.ajax({
                url: "<?php echo base_url();?>MemberArea/editPost/" + id + "/" + active,
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