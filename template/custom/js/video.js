$('.add-videocategory').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "add-videocategory",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#addvideo-btn').html('Processing...');
            $("#addvideo-btn").attr("disabled", true);
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

                $('#addvideo-btn').html('Submit');
                $("#addvideo-btn").attr("disabled", false);
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




$(document).on('click', '.fetch-videocategory', function (event) {
    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-videocategory",
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


$('.update-videocategory').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "edit-videocategory",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#updatvideocat-btn').html('Processing...');
            $("#updatvideocat-btn").attr("disabled", true);
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

                $('#updatvideocat-btn').html('Submit');
                $("#updatvideocat-btn").attr("disabled", false);
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

                $('#updatvideocat-btn').html('Submit');
                $("#updatvideocat-btn").attr("disabled", false);
            }
        }
    });
});



$(document).on('click', '.delete-videocategory', function (event) {
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
                    url: "delete-videocategory",
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
                }) : t.dismiss === Swal.DismissReason.cancel

    })

});

$(document).on('click', '.status-videocategory', function () {

    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");



    $.ajax({
        url: "status-videocategory",
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

$(document).on('click', '.feature-video', function () {

    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");




    $.ajax({
        url: "feature-video",
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



$('.add-video').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "insert-video",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#addvideo-btn').html('Processing...');
            $("#addvideo-btn").attr("disabled", true);
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
                if (data.videotitle_error != '') {
                    $('#videotitle_error').html(data.videotitle_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#videotitle_error').html('');
                }

                if (data.link_error != '') {
                    $('#link_error').html(data.link_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#link_error').html('');
                }
                if (data.briefintro_error != '') {
                    $('#briefintro_error').html(data.briefintro_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#briefintro_error').html('');
                }
                if (data.imgvideo_error != '') {
                    $('#imgvideo_error').html(data.imgvideo_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#imgvideo_error').html('');
                }




                $('#addvideo-btn').html('Submit');
                $("#addvideo-btn").attr("disabled", false);
            }
            if (data.success) {
                $.toast({
                    heading: 'Success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.href = "video-list"


                    }

                })


            }
        }
    });
});


$('.update-video').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "editvideo",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#updatvideo-btn').html('Processing...');
            $("#updatvideo-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.category1_error != '') {
                    $('#category1_error').html(data.category1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#category1_error').html('');
                }
                if (data.videotitle1_error != '') {
                    $('#videotitle1_error').html(data.videotitle1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#videotitle1_error').html('');
                }

                if (data.link1_error != '') {
                    $('#link1_error').html(data.link1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#link1_error').html('');
                }
                if (data.briefintro1_error != '') {
                    $('#briefintro1_error').html(data.briefintro1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#briefintro1_error').html('');
                }

                $('#updatvideo-btn').html('Submit');
                $("#updatvideo-btn").attr("disabled", false);



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




$(document).on('click', '.status-video', function () {

    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");



    $.ajax({
        url: "status-video",
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


$(document).on('click', '.delete-video', function (event) {
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
                    url: "delete-video",
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
                }) : t.dismiss === Swal.DismissReason.cancel
    })

});


$('.editvideoseo').on('submit', function (event) {

    event.preventDefault();
    $.ajax({
        url: "editvideoseo",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#updatseo-btn').html('Processing...');
            $("#updatseo-btn").attr("disabled", true);
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
                $('#updatseo-btn').html('Submit');
                $("#updatseo-btn").attr("disabled", false);


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

$("#video button").click(function (ev) {
    ev.preventDefault()

    if ($(this).attr("value") == "Delete") {
        // var form_data = new FormData(document.getElementById("myform"));
        let form = document.getElementById('video');
        let formData = new FormData(form);
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",

            icon: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, change it!",
            customClass: {
                confirmButton: "btn btn-primary me-3",
                cancelButton: "btn btn-label-secondary"
            },
            buttonsStyling: !1
        }).then(function (t) {
            t.value ?
                    $.ajax({
                        url: "delete_allvideo",
                        method: "POST",
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,

                        success: function (data) {
                            console.log(data);
                            var data = jQuery.parseJSON(data);
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
                                    heading: 'error',
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
                    }) : t.dismiss === Swal.DismissReason.cancel

        });


    }
    if ($(this).attr("value") == "Status") {
        let form = document.getElementById('video');
        let formData = new FormData(form);
        Swal.fire({
            title: "Are you sure?",

            icon: "warning",
            showCancelButton: true,
            showDenyButton: true,
            confirmButtonText: " Activate",
            denyButtonText: "Deactivated",
            customClass: {
                confirmButton: "btn btn-success ",
                denyButton: "btn btn-danger ",
                cancelButton: "btn btn-info",
            },
            buttonsStyling: !1
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "status_allvideo",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,

                    success: function (data) {
                        console.log(data);
                        var data = jQuery.parseJSON(data);
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
                                heading: 'error',
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
            } else if (result.isDenied) {
                $.ajax({
                    url: "status_allvideode",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,

                    success: function (data) {
                        console.log(data);
                        var data = jQuery.parseJSON(data);
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
                                heading: 'error',
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
            } else {




            }
        });
    }
});

//category

$("#video_cat button").click(function (ev) {
    ev.preventDefault()

    if ($(this).attr("value") == "Delete") {
        let form = document.getElementById('video_cat');
        let formData = new FormData(form);
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",

            icon: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, change it!",
            customClass: {
                confirmButton: "btn btn-primary me-3",
                cancelButton: "btn btn-label-secondary"
            },
            buttonsStyling: !1
        }).then(function (t) {
            t.value ?
                    $.ajax({
                        url: "delete_allvideocat",
                        method: "POST",
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,

                        success: function (data) {
                            console.log(data);
                            var data = jQuery.parseJSON(data);
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
                                    heading: 'error',
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
                    }) : t.dismiss === Swal.DismissReason.cancel

        });


    }
    if ($(this).attr("value") == "Status") {
        let form = document.getElementById('video_cat');
        let formData = new FormData(form);
        Swal.fire({
            title: "Are you sure?",

            icon: "warning",
            showCancelButton: true,
            showDenyButton: true,
            confirmButtonText: " Activate",
            denyButtonText: "Deactivated",
            customClass: {
                confirmButton: "btn btn-success ",
                denyButton: "btn btn-danger ",
                cancelButton: "btn btn-info",
            },
            buttonsStyling: !1
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "status_allvideocat",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,

                    success: function (data) {
                        console.log(data);
                        var data = jQuery.parseJSON(data);
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
                                heading: 'error',
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
            } else if (result.isDenied) {
                $.ajax({
                    url: "status_allvideocatde",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,

                    success: function (data) {
                        console.log(data);
                        var data = jQuery.parseJSON(data);
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
                                heading: 'error',
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
            } else {
            }
        });
    }
});


$('.update-seqvideocat').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "edit-seqvideocat",
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

$(document).on('click', '.fetch-seqvideo', function (event) {

    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-seqvideo",
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
$('.update-seqvideo').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "edit-seqvideo",
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
