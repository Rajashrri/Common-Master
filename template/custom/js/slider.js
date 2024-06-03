



$('.update-slider').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "editslider",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#updatslider-btn').html('Processing...');
            $("#updatslider-btn").attr("disabled", true);
        },
        success: function(data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                  

                $('#updatslider-btn').html('Submit');
                $("#updatslider-btn").attr("disabled", false);
            }
            if (data.success) {

                $.toast({
                    heading: 'Success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.reload();

    
                       }
                   
                    })

             
            }
            if (data.warning) {

                $.toast({
                    heading: 'Warning',
                    text: data.warning,
                    icon: 'warning',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.reload();

    
                       }
                   
                    })

             
            }
        }
    });
});





$('.update-contact').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "contact",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#updatcon-btn').html('Processing...');
            $("#updatcon-btn").attr("disabled", true);
        },
        success: function(data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {


                if (data.mobile1_error != '') {
                    $('#mobile1_error').html(data.mobile1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#mobile1_error').html('');
                }

               

                if (data.email1_error != '') {
                    $('#email1_error').html(data.email1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#email1_error').html('');
                }
              



                if (data.map_error != '') {
                    $('#map_error').html(data.map_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#map_error').html('');
                }

                if (data.address_error != '') {
                    $('#address_error').html(data.address_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#address_error').html('');
                }

                $('#updatcon-btn').html('Submit');
                $("#updatcon-btn").attr("disabled", false);
            }
            if (data.success) {

                $.toast({
                    heading: 'Success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.reload();
    
    
                       }
                   
                    })

            }
        }
    });
});

// $(document).ready(function () {
//    var table= $('#example').DataTable({
      
//         "language": {
//       "emptyTable": "No data available in table"
//     },
   
    
//         stateSave: true,
//         stateLoadParams: function( settings, data ) {
//             if (data.order) delete data.order;
//           },
//         "columnDefs": [
//        { "orderable": false, "targets": 0 }
//            ]
           
//     });
    
// });

$(document).ready(function () {

    var url22 = $("#url22").val();
    
    $("#example").DataTable({

        processing: true,

        // serverSide: true,

        order: [],

        ajax: {
        url: url22,
        type: "POST",
        dataSrc: function (json) {
            return json.data;
        }

        },

        language: {
        emptyTable: "No data available in table",
        search: "_INPUT_",
        searchPlaceholder: "Search...",
        },

        stateSave: true,

        stateLoadParams: function (settings, data) {
        if (data.order) delete data.order;
        },

        columnDefs: [{ orderable: false, targets: 0 }],

       
    });
});