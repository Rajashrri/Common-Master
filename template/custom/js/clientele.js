

$('.add-clientele').on('submit', function (event) {
    event.preventDefault();

    $.ajax({
        url: "insert-clientele",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#addclient-btn').html('Processing...');
            $("#addclient-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {


                if (data.name_error != '') {
                    $('#name_error').html(data.name_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#name_error').html('');
                }


                if (data.clientimg_error != '') {
                    $('#clientimg_error').html(data.clientimg_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#clientimg_error').html('');
                }

                $('#addclient-btn').html('Add');
                $("#addclient-btn").attr("disabled", false);
            }

            if (data.success) {


                $.toast({
                    heading: 'success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.href = "client-list";
                    }

                })



            }
        }
    });
});

$('.update-client').on('submit', function (event) {

    event.preventDefault();
    $.ajax({
        url: "editclient",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#updatc-btn').html('Processing...');
            $("#updatc-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {

                if (data.name1_error != '') {
                    $('#name1_error').html(data.name1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#name1_error').html('');
                }

                $('#updatc-btn').html('Submit');
                $("#updatc-btn").attr("disabled", false);

            }
            if (data.success) {
                $.toast({
                    heading: 'success',
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

                $('#updatc-btn').html('Submit');
                $("#updatc-btn").attr("disabled", false);
            }
        }
    });
});


$(document).on('click', '.delete-client', function (event) {
    event.preventDefault();
    var id = $(this).attr("data-id");

    Swal.fire({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonText: "Yes, delete it!",
        customClass: {
            confirmButton: "btn btn-primary me-3",
            cancelButton: "btn btn-label-secondary"
        },
        buttonsStyling: !1
    }).then(function (t) {
        t.value ?
                $.ajax({
                    url: "delete-client",
                    type: "POST",
                    dataType: "json",
                    data: {'id': id},
                    success: function (data) {
                        if (data.success) {

                            $.toast({
                                heading: 'Deleted',
                                text: "Your Record has been deleted",
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


$(document).on('click', '.status-client', function () {

    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");



    $.ajax({
        url: "status-client",
        type: "POST",
        dataType: "json",
        data: {'id': id, 'status_id': status_id},
        success: function (data) {
            if (data.success) {

                $.toast({
                    heading: 'UPDATED',
                    text: "Your status of this record has been changed",
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

$(document).on('click', '.fetch-seqcli', function (event) {
    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-seqcli",
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
$('.update-seqcli').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "edit-seqcli",
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
