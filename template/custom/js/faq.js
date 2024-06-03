$('.add-faqcategory').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "add-faqcategory",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#addfaq-btn').html('Processing...');
            $("#addfaq-btn").attr("disabled", true);
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
                $('#addfaq-btn').html('Submit');
                $("#addfaq-btn").attr("disabled", false);
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


$(document).on('click', '.fetch-faqcategory', function (event) {
    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-faqcategory",
        type: "POST",
        dataType: "json",
        data: {'id': id},
        success: function (data) {
            console.log(data);
            $('#cat_name').val(data.category);
              $('#seq_id').val(data.seq_id);
            $('#idcatpro').val(data.id);
            $('#id').val(data.id);
        }
    });
});

$('#update-faqcategory').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "edit-faqcategory",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#updatfaq-btn').html('Processing...');
            $("#updatfaq-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.faqcategory1_error != '') {
                    $('#faqcategory1_error').html(data.faqcategory1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#faqcategory1_error').html('');
                }

                $('#updatfaq-btn').html('Submit');
                $("#updatfaq-btn").attr("disabled", false);
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
                $('#updatfaq-btn').html('Submit');
                $("#updatfaq-btn").attr("disabled", false);
            }
        }
    });
});


$(document).on('click', '.delete-faqcategory', function (event) {
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
                    url: "delete-faqcategory",
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


$(document).on('click', '.status-faqcategory', function () {

    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");



    $.ajax({
        url: "status-faqcategory",
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

//Faq

$('.add-faq').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "add-faqq",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#addfaqcat-btn').html('Processing...');
            $("#addfaqcat-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.faq_error != '') {
                    $('#faq_error').html(data.faq_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#faq_error').html('');
                }
                if (data.answer_error != '') {
                    $('#answer_error').html(data.answer_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#answer_error').html('');
                }

                if (data.cat_error != '') {
                    $('#cat_error').html(data.cat_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#cat_error').html('');
                }
                $('#addfaqcat-btn').html('Submit');
                $("#addfaqcat-btn").attr("disabled", false);
            }
            if (data.success) {

                $.toast({
                    heading: 'Success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.href = "faq-list";



                    }

                })



            }

        }
    });
});



$(document).on('click', '.fetch-faq', function (event) {
    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-faq",
        type: "POST",
        dataType: "json",
        data: {'id': id},
        success: function (data) {
            console.log(data.answer);
            $('#cat_name').val(data.category_id);
            $('#faq').val(data.faq);
            $('#answer').html(data.answer);
            $('#id').val(data.id);
        }
    });
});

$('.update-faq').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "edit",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#updatfaq-btn').html('Processing...');
            $("#updatfaq-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.cat1_error != '') {
                    $('#cat1_error').html(data.cat1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#cat1_error').html('');
                }
                if (data.faq1_error != '') {
                    $('#faq1_error').html(data.faq1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#faq1_error').html('');
                }
                if (data.answer1_error != '') {
                    $('#answer1_error').html(data.answer1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#answer1_error').html('');
                }


                $('#updatfaq-btn').html('Submit');
                $("#updatfaq-btn").attr("disabled", false);
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
                $('#updatfaq-btn').html('Submit');
                $("#updatfaq-btn").attr("disabled", false);
            }
        }

    });
});




$(document).on('click', '.delete-faq', function (event) {
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
                    url: "delete-faq",
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

$(document).on('click', '.status-faq', function () {

    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");




    $.ajax({
        url: "status-faq",
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



$("#flist button").click(function (ev) {
    ev.preventDefault()

    if ($(this).attr("value") == "Delete") {

        let form = document.getElementById('flist');
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
                        url: "delete_allf",
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
        let form = document.getElementById('flist');
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
                    url: "status_allf",
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
                    url: "status_allfde",
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



$("#fclist button").click(function (ev) {
    ev.preventDefault()

    if ($(this).attr("value") == "Delete") {

        let form = document.getElementById('fclist');
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
                        url: "delete_allfc",
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
        let form = document.getElementById('fclist');
        let formData = new FormData(form);
        Swal.fire({
            title: "Are you sure?",

            icon: "warning",
            showCancelButton: true,
            showDenyButton: true,
            confirmButtonText: "Active",
            denyButtonText: "DeActive",
            customClass: {
                confirmButton: "btn btn-success ",
                denyButton: "btn btn-danger ",
                cancelButton: "btn btn-info",
            },
            buttonsStyling: !1
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "status_allfc",
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
                    url: "status_allfcde",
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

$('.update-seqfaqcat').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "edit-seqfaqcat",
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


$(document).on('click', '.fetch-seqfaq', function (event) {
    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-seqfaq",
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
$('.update-seqfaq').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "edit-seqfaq",
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