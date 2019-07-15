$(document).ready(function() {
    var page=$('#page').val();

    var lang=$('#lang1').val();
    if(lang=="Ar"){
        lang="Arabic";
    }else {
        lang="English";
    }
    $('#cat').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/"+lang+".json"
        },
        "ajax": {
            "url":'request/categories_list.php',
            "type":"post"
        },"columns":[
            {"data":"nameEn"},
            {"data":"nameGr"},
            {"data":"nameAr"},
            {"data":"id",

                "orderable": false,
                "mRender": function (id) {
                    return '<a  class="btn btn-primary" style="margin-left: 22px;" href=edit_category.php?id='+id+'&page='+page+'><i class="fa fa-pencil-square-o" style="margin: auto" aria-hidden="true"></i></a>';}}
        ]
    } );
} );