$(document).ready(function() {

    var lang=$('#lang1').val();
    if(lang=="Ar"){
        lang="Arabic";
    }else {
        lang="English";
    }

var page=$('#page').val();


   var table=$('#pro').DataTable( {
       "language": {
           "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/"+lang+".json"
       },
   //     "language":
   //         {
   //             "sProcessing":"جارٍ التحميل...",
   //             "sLengthMenu": "أظهر _MENU_ مدخلات",
   //             "sZeroRecords": "لم يعثر على أية سجلات",
   //             "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
   //             "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
   //             "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
   //             "sInfoPostFix": "",
   //             "sSearch": "ابحث:",
   //             "sUrl": "",
   //             "oPaginate": {
   //                 "sFirst": "الأول",
   //                 "sPrevious": "السابق",
   //                 "sNext": "التالي",
   //                 "sLast": "الأخير"
   //             }
   //         }
   // }
        "ajax": {
            "url":'request/proudacts_list.php',
            "type":"post"
        },"columns":[
            {"data":"productNameEn"},
            {"data":"productNameGr"},
            {"data":"productNameAr"},
            {"data":"price"},
            {"data":"img",

                "orderable": false,
                "mRender": function (img) {
                    return '<img style="height: 75px;" src="uploads/small/'+img+'.jpg">';}
            },{"data":"id",

                "orderable": false,
                "mRender": function (id) {
                    return '<a  class="btn btn-primary" style="margin: 5px;" href=proudact_edit.php?id='+id+'&page='+page+'><i class="fa fa-pencil-square-o" style="margin: auto" aria-hidden="true"></i></a><a  class="btn btn-danger delete" style="margin: 5px;" data-id='+id+'><i class="fa fa-close" style="margin: auto" aria-hidden="true"></i></a>';}
            }
        ]
    } );

    $(document).on('click','.delete',function () {
        var id=$(this).data('id');
        $.ajax({
            url: 'request/proudacts_list.php',
            type: 'Post',
            data: {
                action:"delete",
                id:id

            },
            success: function(respose) {
                $('.load').addClass('hidden');
                if(respose.code==1) {
                    notification(respose.msg, 'success');
                    table.ajax.reload();
                }else {
                    notification(respose.msg,'danger');
                }
            }, error: function() {
                $('.load').addClass('hidden');
                notification(404,'danger');
            }
        });
    })



} );