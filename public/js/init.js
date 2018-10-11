$(document).ready(function(){
	$('.sidenav').sidenav();
    $('.collapsible').collapsible({
            onOpenEnd: function () {
                $('.add').text("remove");
            }, onCloseEnd: function () {
                $('.add').text("add");
            }
    });
    $(".tooltipped").tooltip();
    $('.modal').modal();
    $('.dropdown-trigger').dropdown({coverTrigger: false, constrainWidth: false});
    $(".datepicker").datepicker({yearRange:[2000,2018],format:"yyyy-mm-dd"});
});