

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("closebtn").style.display = "unset";
    document.getElementById("open").style.display = "none";
    document.getElementById("logo").style.display = "unset";

}

function closeNav() {
    document.getElementById("mySidenav").style.width = "48px";
    document.getElementById("closebtn").style.display = "none";
    document.getElementById("open").style.display = "unset";
    document.getElementById("logo").style.display = "none";

   var x=document.getElementById("mySidenav").getElementsByClassName("droped").length;
for (var i=0;i<x;i++){
    document.getElementById("mySidenav").getElementsByClassName("droped")[i].style.display = "none";
}
}
$(document).ready(function(){

    $('.drop').click(function () {
        var id=$(this).data('id');
        $(this).next().removeClass('droped');
        $('.droped').slideUp();
        $(this).next().addClass('droped');
        $('.droped'+id).slideToggle();

    })




})