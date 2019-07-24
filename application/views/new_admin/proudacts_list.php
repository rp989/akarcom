<section class="content-header">
    <h1>
        <?php echo _productsList ?>
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
                <?php


                ?>
                <tr>
                    <th style="text-align: right;"><?php echo _userName; ?></th>
                    <th style="text-align: right;"><?php echo _gsm; ?></th>
                    <th style="text-align: right;"><?php echo _ViewPost; ?></th>
                    <th style="text-align: right;"><?php echo _active; ?></th>
                    <th style="text-align: right;"><?php echo _Date; ?></th>
                    <th style="text-align: right;">خيارات</th>

                </tr>
                </thead>
            </table>
        </div>
    </div>

</div>


<script src="assets/js/proudacts_list.js"></script>
<script type="text/javascript"
        src="<?php echo base_url() ?>public/assetsAdmin/datatable/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"
        src="<?php echo base_url() ?>public/assetsAdmin/datatable/DataTables-1.10.16/js/dataTables.bootstrap.min.js"></script>
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
                "url": "<?php echo base_url()?>PostsData/<?=@$this->uri->segment(3)?>",
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
                    "data": "option"
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

        $(document).on("click", ".activeTag", function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var description = $(this).attr('data-description');
            var active = $(this).attr('data-active');
            $.ajax({
                url: "<?php echo base_url();?>adminArea/TagsEditActive/" + id + "/" + active + "/" + description,
                type: "POST",
                data: {},
                cache: false,
                success: function (data) {
                    var data = JSON.parse(data);
                    noti(data.title, data.msg, data.type);
                    table.ajax.reload(null, false);
                }
            });
        });
        $(document).on("click", ".orderTag", function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.confirm({
                title: 'Change order number of view',
                content: '' +
                    '<form action="" class="formName">' +
                    '<div class="form-group">' +
                    '<label>Enter order number here</label>' +
                    '<input type="number" placeholder="Number" class="name form-control" required />' +
                    '</div>' +
                    '</form>',
                buttons: {
                    formSubmit: {
                        text: 'Submit',
                        btnClass: 'btn-blue',
                        action: function () {
                            var num = this.$content.find('.name').val();
                            if (!num) {
                                $.alert('provide a valid number');
                                return false;
                            }
                            $.ajax({
                                url: "<?php echo base_url();?>adminArea/TagsEditOrder/" + id + "/" + num,
                                type: "POST",
                                data: {},
                                cache: false,
                                success: function (data) {
                                    var data = JSON.parse(data);
                                    noti(data.title, data.msg, data.type);
                                    table.ajax.reload(null, false);
                                }
                            });
                        }
                    },
                    cancel: function () {
                        //close
                    },
                },
                onContentReady: function () {
                    // bind to events
                    var jc = this;
                    this.$content.find('form').on('submit', function (e) {
                        // if the user submits the form by pressing enter in the field.
                        e.preventDefault();
                        jc.$$formSubmit.trigger('click'); // reference the button and click it
                    });
                }
            });
        });
        $('#table').DataTable().ajax.reload();

    });
    $(document).on('click', '.remove_post', function () {
        var post_id = this.id;
        var button = this;
        $(this).html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
        $.ajax({
            url: "<?=base_url('MemberArea/change_state/remove')?>",
            method: "post",
            data: {post: post_id},
            success: function (response) {
                $(button).html("تمت عملية ");
                $(button).attr('disabled', 'disabled');
                $("#state_" + post_id).html('محذوف');
                $("#state_" + post_id).removeClass('label-success label-wrong bg-yellow bg-orange  label-default ').addClass('label-danger bg-red');
            }
        });
    });
    $(document).on('click', '.product_sold', function () {
        var post_id = this.id;
        var button = this;
        $(this).html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
        $.ajax({
            url: "<?=base_url('MemberArea/change_state/sold')?>",
            method: "post",
            data: {post: post_id},
            success: function (response) {
                $(button).html("تمت عملية");
                $(button).attr('disabled', 'disabled');
                $("#state_" + post_id).html('مباع');
                $("#state_" + post_id).removeClass('label-success label-wrong bg-yellow bg-orange  label-default label-danger bg-red ').addClass('label-default bg-orange');
            }
        });
    });
    $(document).on('click', '.product_non_sold', function () {
        var post_id = this.id;
        var button = this;
        $(this).html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
        $.ajax({
            url: "<?=base_url('MemberArea/change_state/non_sold')?>",
            method: "post",
            data: {post: post_id},
            success: function (response) {
                $(button).html("تمت عملية");
                $(button).attr('disabled', 'disabled');
                $("#state_" + post_id).html('مباع');
                $("#state_" + post_id).removeClass('label-success label-wrong bg-yellow bg-orange  label-default label-danger bg-red ').addClass('label-default bg-orange');
            }
        });
    });

    $(document).on('click', '.non_active', function () {
        var post_id = this.id;
        var button = this;
        $(this).html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
        $.ajax({
            url: "<?=base_url('MemberArea/change_state/non_active')?>",
            method: "post",
            data: {post: post_id},
            success: function (response) {
                $(button).html("تمت عملية");
                $(button).attr('disabled', 'disabled');
                $("#state_" + post_id).html('مباع');
                $("#state_" + post_id).removeClass('label-success label-wrong bg-yellow bg-orange  label-default label-danger bg-red ').addClass('label-default bg-orange');
            }
        });
    });
    $(document).on('click', '.product_active', function () {
        var post_id = this.id;
        var button = this;
        $(this).html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
        $.ajax({
            url: "<?=base_url('MemberArea/change_state/active')?>",
            method: "post",
            data: {post: post_id},
            success: function (response) {
                $(button).html("تمت عملية");
                $(button).attr('disabled', 'disabled');
                $("#state_" + post_id).html('نشط');
                $("#state_" + post_id).removeClass('label-success label-wrong bg-yellow bg-orange  label-default label-danger bg-red ').addClass('label-default bg-green');
            }
        });
    });
    $(document).on('click', '.un_vip', function () {
        var post_id = this.id;
        var button = this;
        $(this).html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
        $.ajax({
            url: "<?=base_url('MemberArea/change_state/un_vip')?>",
            method: "post",
            data: {post: post_id},
            success: function (response) {
                $(button).html("تمت عملية");
                $(button).attr('disabled', 'disabled');
            }
        });
    })
    $(document).on('click', '.vip', function () {
        var post_id = this.id;
        var button = this;
        $(this).html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
        $.ajax({
            url: "<?=base_url('MemberArea/change_state/vip')?>",
            method: "post",
            data: {post: post_id},
            success: function (response) {
                $(button).html("تمت عملية");
                $(button).attr('disabled', 'disabled');
            }
        });
    });
</script>