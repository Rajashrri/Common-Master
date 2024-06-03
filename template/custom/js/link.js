$('.add-link').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "add-link",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#addlink-btn').html('Processing...');
            $("#addlink-btn").attr("disabled", true);
        },
        success: function(data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.title_error != '') {
                    $('#title_error').html(data.title_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#title_error').html('');
                }

                if (data.name_error != '') {
                    $('#name_error').html(data.name_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#name_error').html('');
                }
                $('#addlink-btn').html('Submit');
                $("#addlink-btn").attr("disabled", false);
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




    $(document).on('click', '.fetch-link', function (event) {
        event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-link",
        type: "POST",
        dataType: "json",
        data: { 'id': id },
        success: function(data) {
            console.log(data);
            $('#name').val(data.name);
            $('#link').val(data.link);

            $('#id').val(data.id);
        }
    });
});


$('.update-link').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "edit-link",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#updalink-btn').html('Processing...');
            $("#updalink-btn").attr("disabled", true);
        },
        success: function(data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.title11_error != '') {
                    $('#title11_error').html(data.title11_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#title11_error').html('');
                }

                if (data.name11_error != '') {
                    $('#name11_error').html(data.name11_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#name11_error').html('');
                }

                $('#updalink-btn').html('Submit');
                $("#updalink-btn").attr("disabled", false);
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




    $(document).on('click', '.delete-link', function (event) {
        event.preventDefault();
    var id = $(this).attr("data-id");


    Swal.fire({
            title: "Are you sure?",
            text:"Once deleted, you will not be able to recover",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            customClass: {
                confirmButton: "btn btn-primary me-3",
                cancelButton: "btn btn-label-secondary"
            },
            buttonsStyling: !1
        }).then(function(t) {
            t.value ?
                $.ajax({
                    url: "delete-link",
                    type: "POST",
                    dataType: "json",
                    data: { 'id': id },
                    success: function(data) {
                        if (data.success) {
                            $.toast({
                                heading: 'Deleted',
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
                }) : t.dismiss === Swal.DismissReason.cancel 
               
        })
      
});

$(document).on('click', '.status-link', function () {
      
    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");


   
            $.ajax({
                url: "status-link",
                type: "POST",
                dataType: "json",
                data: { 'id': id, 'status_id': status_id },
                success: function(data) {
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
          
    })

});

$(document).on('click', '.fetch-seqlink', function (event) {

    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-seqlink",
        type: "POST",
        dataType: "json",
        data: { 'id': id },
        success: function(data) {
            console.log(data);
            $('#seq_id').val(data.seq_id);
            $('#idcatpro').val(data.id);
        }
    });
});
$('.update-seqlink').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "edit-seqlink",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('seq-btn').html('Processing...');
            $("seq-btn").attr("disabled", true);
        },
        success: function(data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.seq_error != '') {
                    $('#seq_error').html(data.seq_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('seq_error').html('');
                }

                $('seq-btn').html('Update');
                $("seq-btn").attr("disabled", false);
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
                      
                        
        
        
                       }
                   
                    })
                    $('#updatcat-btn').html('Submit');
                    $("#updatcat-btn").attr("disabled", false);
              

            }
        }
    });
});

