$(document).on('click', '.fetch-cenq', function (event) {
    event.preventDefault();
var wrap_html = "";
var id = $(this).attr("data-id");
console.log(id);
$.ajax({
    url: "retrive-contacten",
    type: "POST",
    dataType: "json",
    data: { 'id': id },
    success: function(data) {
    $('#sss').html(data.message);
        $('#id').val(data.id);
     }
});
});


$(document).on('click', '.fetch-serviceenq', function (event) {
    event.preventDefault();
var wrap_html = "";
var id = $(this).attr("data-id");
console.log(id);
$.ajax({
    url: "retrive-serviceenq",
    type: "POST",
    dataType: "json",
    data: { 'id': id },
    success: function(data) {
    $('#sss').html(data.message);
        $('#id').val(data.id);
     }
});
});
