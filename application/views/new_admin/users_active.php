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
        <!-- /.box-header -->
        <div class="box-body">
            <table id="table" class="table table-striped table-hover dt-responsive display nowrap" width="100%"
                   cellspacing="0">
                <thead>
                <tr>
                    <th style="text-align: center;">المعرف</th>
                    <th style="text-align: center;">الاسم</th>
                    <th style="text-align: center;">رقم الهاتف</th>
                    <th style="text-align: center;">تاريخ الانشاء</th>
                    <th style="text-align: center;">عدد المنتجات</th>
                    <th style="text-align: center;">خيارات</th>
                </tr>
                </thead>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->


    <!-- /.box -->
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="test">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" style="border-radius: 0px">
            <div class="modal-body">
                <div class="form-group" id="wait">
                    <h1 class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></h1>
                </div>
                <form action="<?= base_url('MemberArea/set_data_user') ?>" method="post">
                    <input type="hidden" name="id_user" id="id_user">
                    <div class="form-group">
                        <label for="changeState">تغير الحالة</label>
                        <select class="form-control" id="changeState" name="state">
                            <option value="1">نشط</option>
                            <option value="0">غير نشط</option>
                            <option value="2">مسؤول</option>
                            <option value="3">عميل</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="changeMaxProduct">الحد الأعظم لنشر عقارات</label>
                        <input type="number" class="form-control" id="changeMaxProduct"
                               placeholder="الحد الأعظم لنشر عقارات" name="max_product">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" style="width: 100%">حفظ</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    var table;

    $(document).ready(function () {

        $(".change").click(function () {
            alert(this.id);
        });

        table = $('#table').DataTable({

            "responsive": true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "searching": true,
            "select": true,
            "scrollX": true,
            "scrollY": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Arabic.json"
            },
            "ajax": {
                "url": "<?php echo base_url()?>MemberArea/user_active_data",
                "type": "POST"
            },
            "columns": [
                {
                    "data": "id"
                },
                {
                    "data": "name"
                },
                {
                    "data": "gsm"
                },


                {
                    "data": "timestamp"
                }, {
                    "data": "view"
                },

                <?php

                if($_SESSION['admin'] == 1 ){
                ?>
                {
                    "data": "option"
                },
                <?php

                }
                ?>
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
    $(document).on('click', '.success', function () {
        var user_id = $(this).attr('id');
        $("#id_user").val(user_id);
        // alert(user_id);
        $.ajax({
            url: "<?=base_url('MemberArea/active_admin_gsm/')?>",
            method: "post",
            data: {id: user_id},
            dataType: 'json',
            success: function (data) {
            alert(data);
            }
        });
    });

</script>