$('.add-galcategory').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "add-gallarycategory",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#addgallarycat-btn').html('Processing...');
            $("#addgallarycat-btn").attr("disabled", true);
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

                $('#addgallarycat-btn').html('Submit');
                $("#addgallarycat-btn").attr("disabled", false);
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




$(document).on('click', '.fetch-galcategory', function (event) {
    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-galcategory",
        type: "POST",
        dataType: "json",
        data: {'id': id},
        success: function (data) {
            console.log(data);
            $('#cat_name').val(data.category_name);
            $('#seq_id').val(data.seq_id);
            $('#idcatpro').val(data.id);
            $('#id').val(data.id);
        }
    });
});


$('.update-galcat').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "edit-galcategory",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#updatgal-btn').html('Processing...');
            $("#updatgal-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.category_name_error != '') {
                    $('#category_name_error').html(data.category_name_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#category_name_error').html('');
                }


                $('#updatgal-btn').html('Submit');
                $("#updatgal-btn").attr("disabled", false);
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
                $('#updatgal-btn').html('Submit');
                $("#updatgal-btn").attr("disabled", false);
            }
        }
    });
});


$(document).on('click', '.delete-galcat', function (event) {
    event.preventDefault();
    var id = $(this).attr("data-id");


    Swal.fire({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonText: "Yes, Delete it!",
        customClass: {
            confirmButton: "btn btn-primary me-3",
            cancelButton: "btn btn-label-secondary"
        },
        buttonsStyling: !1
    }).then(function (t) {
        t.value ?
                $.ajax({
                    url: "delete-galcategory",
                    type: "POST",
                    dataType: "json",
                    data: {'id': id},
                    success: function (data) {
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

$(document).on('click', '.status-galcat', function (evnt) {

    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");



    $.ajax({
        url: "status-galcategory",
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
    });

});



$('.add-gal').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "insert-gal",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#addgal-btn').html('Processing...');
            $("#addgal-btn").attr("disabled", true);
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
                if (data.imgname_error != '') {
                    $('#imgname_error').html(data.imgname_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#imgname_error').html('');
                }


                if (data.img_error != '') {
                    $('#img_error').html(data.img_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#img_error').html('');
                }


                $('#addgal-btn').html('Submit');
                $("#addgal-btn").attr("disabled", false);
            }
            if (data.success) {

                $.toast({
                    heading: 'Success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.href = "gallery-list";


                    }

                })


            }
        }
    });
});


$('.update-gal').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "edit",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#updatgal-btn').html('Processing...');
            $("#updatgal-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.categoryname1_error != '') {
                    $('#categoryname1_error').html(data.categoryname1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#categoryname1_error').html('');
                }
                if (data.imgname1_error != '') {
                    $('#imgname1_error').html(data.imgname1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#imgname1_error').html('');
                }


                $('#updatgal-btn').html('Submit');
                $("#updatgal-btn").attr("disabled", false);


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
                $('#updatgal-btn').html('Submit');
                $("#updatgal-btn").attr("disabled", false);
            }
        }
    });
});




$(document).on('click', '.status-gal', function () {

    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");



    $.ajax({
        url: "status-gallary",
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



$(document).on('click', '.delete-gal', function (event) {
    event.preventDefault();
    var id = $(this).attr("data-id");


    Swal.fire({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonText: "Yes, Delete it!",
        customClass: {
            confirmButton: "btn btn-primary me-3",
            cancelButton: "btn btn-label-secondary"
        },
        buttonsStyling: !1
    }).then(function (t) {
        t.value ?
                $.ajax({
                    url: "delete-gallary",
                    type: "POST",
                    dataType: "json",
                    data: {'id': id},
                    success: function (data) {
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

$("#glist button").click(function (ev) {
    ev.preventDefault()

    if ($(this).attr("value") == "Delete") {
        // var form_data = new FormData(document.getElementById("myform"));
        let form = document.getElementById('glist');
        let formData = new FormData(form);
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",

            icon: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, Delete it!",
            customClass: {
                confirmButton: "btn btn-primary me-3",
                cancelButton: "btn btn-label-secondary"
            },
            buttonsStyling: !1
        }).then(function (t) {
            t.value ?
                    $.ajax({
                        url: "delete_allg",
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
                    }) : t.dismiss === Swal.DismissReason.cancel
        });


    }
    if ($(this).attr("value") == "Status") {
        let form = document.getElementById('glist');
        let formData = new FormData(form);
        Swal.fire({
            title: "Are you sure?",

            icon: "warning",
            showCancelButton: true,
            showDenyButton: true,
            confirmButtonText: "Activate",
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
                    url: "status_allg",
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
            } else if (result.isDenied) {
                $.ajax({
                    url: "status_allgde",
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
            } else {


            }
        });
    }
});

//category

$("#gclist button").click(function (ev) {
    ev.preventDefault()

    if ($(this).attr("value") == "Delete") {
        // var form_data = new FormData(document.getElementById("myform"));
        let form = document.getElementById('gclist');
        let formData = new FormData(form);
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",

            icon: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, Delete it!",
            customClass: {
                confirmButton: "btn btn-primary me-3",
                cancelButton: "btn btn-label-secondary"
            },
            buttonsStyling: !1
        }).then(function (t) {
            t.value ?
                    $.ajax({
                        url: "delete_allgc",
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
                    }) : t.dismiss === Swal.DismissReason.cancel
        });


    }
    if ($(this).attr("value") == "Status") {
        let form = document.getElementById('gclist');
        let formData = new FormData(form);
        Swal.fire({
            title: "Are you sure?",

            icon: "warning",
            showCancelButton: true,
            showDenyButton: true,
            confirmButtonText: "Yes, change it to Active",
            denyButtonText: "Yes, change it to DeActive",
            customClass: {
                confirmButton: "btn btn-success ",
                denyButton: "btn btn-danger ",
                cancelButton: "btn btn-info",
            },
            buttonsStyling: !1
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "status_allgc",
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
            } else if (result.isDenied) {
                $.ajax({
                    url: "status_allgcde",
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
            } else {


            }
        });
    }
});


$('.update-seqgalcat').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "edit-seqgalcat",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('seq-btn').html('Processing...');
            $("seq-btn").attr("disabled", true);
        },
        success: function (data) {
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

$(document).on('click', '.fetch-seqgal', function (event) {
    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-seqgal",
        type: "POST",
        dataType: "json",
        data: {'id': id},
        success: function (data) {
            console.log(data);
            $('#seq_id').val(data.seq_id);
            $('#idcatpro').val(data.id);
        }
    });
});
$('.update-seqgal').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "edit-seqgal",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('seq-btn').html('Processing...');
            $("seq-btn").attr("disabled", true);
        },
        success: function (data) {
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

