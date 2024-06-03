
$('.add-eventcategory').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "add-eventcategory",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#addevent-btn').html('Processing...');
            $("#addevent-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.categoryname_error != '') {
                    $('#categoryname_error').html(data.categoryname_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#categoryname_error').html('');
                }

                $('#addevent-btn').html('Submit');
                $("#addevent-btn").attr("disabled", false);

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

$(document).on('click', '.fetch-eventcategory', function (event) {

    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-eventcategory",
        type: "POST",
        dataType: "json",
        data: {'id': id},
        success: function (data) {
            console.log(data);
            $('#cat_name').val(data.category_name);
            $('#id').val(data.id);
             $('#seq_id').val(data.seq_id);
            $('#idcatpro').val(data.id);
        }
    });
});

$('.update-eventcategory').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "edit-eventcategory",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#updatevent-btn').html('Processing...');
            $("#updatevent-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.category_error != '') {
                    $('#category_error').html(data.category_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#category_error').html('');
                }
                $('#updatevent-btn').html('Submit');
                $("#updatevent-btn").attr("disabled", false);
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
                $('#updatevent-btn').html('Submit');
                $("#updatevent-btn").attr("disabled", false);
            }
        }
    });
});
$(document).on('click', '.delete-eventcategory', function (event) {

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
                    url: "delete-eventcategory",
                    type: "POST",
                    dataType: "json",
                    data: {'id': id},
                    success: function (data) {
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
                }) : t.dismiss
    })

});
$(document).on('click', '.status-eventcategory', function () {


    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");

    $.ajax({
        url: "status-eventcategory",
        type: "POST",
        dataType: "json",
        data: {'id': id, 'status_id': status_id},
        success: function (data) {
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



//event list


$('.add-event').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "insert-event",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#addevent-btn').html('Processing...');
            $("#addevent-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.category_error != '') {
                    $('#category_error').html(data.category_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#category_error').html('');
                }

                if (data.name_error != '') {
                    $('#name_error').html(data.name_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#name_error').html('');
                }

                if (data.eventtitle_error != '') {
                    $('#eventtitle_error').html(data.eventtitle_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#eventtitle_error').html('');
                }

                if (data.date_error != '') {
                    $('#date_error').html(data.date_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#date_error').html('');
                }

                if (data.shortdescription_error != '') {
                    $('#shortdescription_error').html(data.shortdescription_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#shortdescription_error').html('');
                }


                if (data.main_error != '') {
                    $('#main_error').html(data.main_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#main_error').html('');
                }


                if (data.fea_error != '') {
                    $('#fea_error').html(data.fea_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#fea_error').html('');
                }


                $('#addevent-btn').html('Submit');
                $("#addevent-btn").attr("disabled", false);
            }

            if (data.success) {


                Swal.fire({
                    position: "Success",
                    icon: "success",
                    title: data.success,
                    showConfirmButton: !1,
                    timer: 1500,
                    customClass: {
                        confirmButton: "btn btn-primary"
                    },
                    buttonsStyling: !1
                }).then(function () {
                    window.location.href = "event-list";


                });


            }
        }
    });
});




$('.update-event').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "editevent",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#updatpay-btn').html('Processing...');
            $("#updatpay-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.category11_error != '') {
                    $('#category11_error').html(data.category11_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#category11_error').html('');
                }

                if (data.name11_error != '') {
                    $('#name11_error').html(data.name11_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#name11_error').html('');
                }

                if (data.eventtitle11_error != '') {
                    $('#eventtitle11_error').html(data.eventtitle11_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#eventtitle11_error').html('');
                }

                if (data.date11_error != '') {
                    $('#date11_error').html(data.date11_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#date11_error').html('');
                }

                if (data.shortdescription11_error != '') {
                    $('#shortdescription11_error').html(data.shortdescription11_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#shortdescription11_error').html('');
                }

                if (data.description11_error != '') {
                    $('#description11_error').html(data.description11_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#description11_error').html('');
                }

                if (data.main11_error != '') {
                    $('#main11_error').html(data.main11_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#main11_error').html('');
                }


                if (data.fea11_error != '') {
                    $('#fea11_error').html(data.fea11_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#fea11_error').html('');
                }

                $('#updatpay-btn').html('Submit');
                $("#updatpay-btn").attr("disabled", false);
            }
            if (data.success) {

                Swal.fire({
                    position: "Success",
                    icon: "success",
                    title: data.success,
                    showConfirmButton: !1,
                    timer: 1500,
                    customClass: {
                        confirmButton: "btn btn-primary"
                    },
                    buttonsStyling: !1
                }).then(function () {
                    window.location.href = "../event-list";


                });
            }
        }
    });
});
$(document).on('click', '.delete-event', function (event) {

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
                    url: "delete-event",
                    type: "POST",
                    dataType: "json",
                    data: {'id': id},
                    success: function (data) {
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
                }) : t.dismiss
    })


});
$(document).on('click', '.status-event', function () {


    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");




    $.ajax({
        url: "status-event",
        type: "POST",
        dataType: "json",
        data: {'id': id, 'status_id': status_id},
        success: function (data) {
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
$(document).on('click', '.feature-event', function () {


    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");




    $.ajax({
        url: "feature-event",
        type: "POST",
        dataType: "json",
        data: {'id': id, 'status_id': status_id},
        success: function (data) {
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

            if (data.error) {
                $.toast({
                    heading: 'Error',
                    text: data.error,
                    icon: 'error',
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

$('.update-eventseo').on('submit', function (event) {

    event.preventDefault();
    $.ajax({
        url: "editevntseo",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#update-eventseo-btn').html('Processing...');
            $("#update-eventseo-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                $.toast({
                    heading: 'Warning',
                    text: data.error,
                    icon: 'warning',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.reload();


                    }

                })
                $('#update-eventseo-btn').html('Update');
                $("#update-eventseo-btn").attr("disabled", false);

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


$('.update-seqeventcat').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "edit-seqeventcat",
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

$(document).on('click', '.fetch-seqevent', function (event) {
    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-seqevent",
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
$('.update-seqevent').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "edit-seqevent",
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


