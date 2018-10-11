$(document).ready(function(){
	$('select').formSelect();
});


 function setStudentId(obj){
    console.log($(obj).find(':input').val());
    value = $(obj).find(':input').val();
    $("#std_id").val(value);
}
function confirmDelete(){
    value = $("#std_id").val();
    $("#delete-form").attr("action","students/"+value);
}