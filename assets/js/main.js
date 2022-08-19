$(document).ready(function () {
    listItem = $("#myList .item").length;
    x=6;
    $('#myList .item:lt('+x+')').show();
    $('#loadMore').click(function () {
        x= (x+3 <= listItem) ? x+3 : listItem;
        $('#myList .item:lt('+x+')').show();
    });         
});