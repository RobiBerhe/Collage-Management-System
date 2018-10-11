/*
* a collection of helper functions.
* author: Robel .B
* Email: berherobi@gmail.com
* */

/*sorts a given list either in ascending or descending manner.
* id:string => specifies the id of the list collection to sort.
* criteria:string => specifies the sorting format such as asc or desc.
* */
function sortList(id,criteria="ASC"){
    var list = $('#'+id);
    list.find('li').each(function(index,element){
        for (var i=index+1; i<list.find('li').length; i++){
            if (criteria.toUpperCase() === "DESC"){
                if($(element).text() < list.find('li').eq(i).text()) {
                    var temp = list.find('li').eq(i).html();
                    list.find('li').eq(i).html($(element).html());
                    $(element).html(temp);
                }
            }
            else{
                if($(element).text() > list.find('li').eq(i).text()) {
                    var temp = list.find('li').eq(i).html();
                    list.find('li').eq(i).html($(element).html());
                    $(element).html(temp);
                }
            }
        }
    });
}

/*sorts a given table
* id:string=> specifies the table to sort.
* column:=> specifies which column is used to sort the given table.
* */
function sortTable(id,column){
    var table = $('#'+id);
    var rows = table.find('tbody > tr');
    var cells = rows.find('td');
    rows.each(function(index,element){
        for (var i=index+1; i<rows.length; i++){
            if($(element).find('td').eq(column).text() > rows.eq(i).find('td').eq(column).text()) {
                var temp = rows.eq(i).html();
                rows.eq(i).html($(element).html());
                $(element).html(temp);
            }
        }
    });
}

$(document).ready(function(){
    $('.tooltipped').tooltip();
    $('select').formSelect();
    $('ul.tabs').tabs();
});


