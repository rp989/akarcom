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
                                    <th style="text-align: center;">المعرف</th>
                                    <th style="text-align: center;">الاسم</th>
                                    <th style="text-align: center;">رقم الهاتف</th>
                                    <th style="text-align: center;">تاريخ الميلاد</th>
                                    <th style="text-align: center;">كود التفعيل</th>
                                    <th style="text-align: center;">الحالة</th>
                                    <th style="text-align: center;">تاريخ الانشاء</th>
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
                "url": "<?php echo base_url()?>MemberArea/usersData",
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
                    "data": "birthday"
                },
                {
                    "data": "reset"
                },
                {
                    "data": "active"
                },
                {
                    "data": "timestamp"
                },
                {
                    "data": "view"
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

        $(document).on("click",".activeTag",function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var description = $(this).attr('data-description');
            var active = $(this).attr('data-active');
            $.ajax({
                url: "<?php echo base_url();?>adminArea/TagsEditActive/"+id+"/"+active+ "/" + description,
                type: "POST",
                data: {},
                cache: false,
                success: function (data) {
                    var data = JSON.parse(data);
                    noti(data.title,data.msg,data.type);
                    table.ajax.reload(null, false);
                }
            });
        });
        $(document).on("click",".orderTag",function(e) {
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
                            if(!num){
                                $.alert('provide a valid number');
                                return false;
                            }
                            $.ajax({
                                url: "<?php echo base_url();?>adminArea/TagsEditOrder/"+id+"/"+num,
                                type: "POST",
                                data: {},
                                cache: false,
                                success: function (data) {
                                    var data = JSON.parse(data);
                                    noti(data.title,data.msg,data.type);
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
</script>