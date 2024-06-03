$(document).ready(function (event) {
    event.preventDefault();
   

    var url = $('#url').val();
    var dataTable = $('#data_table').DataTable({
        "processing": true,
        "retrieve": true,
        "paging": false,
        "serverSide": true,
       
        "ajax": {
            url: url,
            type: "POST"
        },
        "columnDefs": [
            {
                "targets": [0, 3, 4],
                "orderable": false,
            },
        ],
    });
});

