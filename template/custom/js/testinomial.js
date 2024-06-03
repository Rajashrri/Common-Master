$('.add-testimonial').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "insert-testimonials",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#addtes-btn').html('Processing...');
            $("#addtes-btn").attr("disabled", true);
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

                if (data.shortinfo_error != '') {
                    $('#shortinfo_error').html(data.shortinfo_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#shortinfo_error').html('');
                }

                $('#addtes-btn').html('Submit');
                $("#addtes-btn").attr("disabled", false);

            }
            if (data.success) {

                $.toast({
                    heading: 'Success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.href = "testimonial_list";
                    }

                })

            }
        }
    });
});




$(document).on('click', '.fetch-test', function (event) {

    event.preventDefault();

    var wrap_html = "";

    var id = $(this).attr("data-id");

    console.log(id);

    $.ajax({

        url: "retrive-test",

        type: "POST",

        dataType: "json",

        data: {'id': id},

        success: function (data) {

            console.log(data.shortinfo);

            $('#name').val(data.name);
            $('#seq_id').val(data.seq_id);
            $('#idcatpro').val(data.id);
            $('#designation').val(data.designation);

            $('#shortinfo').html(data.shortinfo);

            $('#id').val(data.id);

        }

    });

});

$('.update-testimonial').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "edittestimonial",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#updatetest-btn').html('Submit');
            // $("#updatetest-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.nametest_error != '') {
                    $('#nametest_error').html(data.nametest_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#nametest_error').html('');
                }



                if (data.shortinfotest_error != '') {
                    $('#shortinfotest_error').html(data.shortinfotest_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#shortinfotest_error').html('');
                }


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


            }
        }
    });
});


$(document).on('click', '.delete-testimonial', function (event) {
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
                    url: "delete-testimonial",
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

$(document).on('click', '.addp', function (event) {
    event.preventDefault();

    var id = $(this).attr("data-id");
    $.ajax({
        url: "addp",
        type: "POST",
        dataType: "json",
        data: {'id': id},
        success: function (data) {
            console.log(data);

            if (data.success) {
                $.toast({
                    heading: 'Success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.href = "add1-privilege";

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
                        window.location.href = "users";

                    }

                })


            }
        }
    });
});



$(document).on('click', '.status-testimonial', function () {

    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");
    $.ajax({
        url: "status-testimonial",
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



$(document).on('click', '.deleteim', function (event) {

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
                    url: "../unlink",
                    type: "POST",
                    dataType: "json",
                    data: {'id': id},

                    success: function (data) {
                        if (data.success) {

                            $.toast({
                                heading: 'Success',
                                text: 'The image has been removed from the folder',
                                icon: 'success',
                                loader: true,
                                position: 'top-right',
                                afterHidden: function () {
                                    $('#imgb_' + id).remove();
                                    window.location.reload();
                                }

                            })


                        }
                    }
                }) : t.dismiss === Swal.DismissReason.cancel


    })

});



$(document).on('click', '.delete-subadmin', function (event) {
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
                    url: "delete-subadmin",
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

$('.privilege').on('submit', function (event) {

    event.preventDefault();
    $.ajax({
        url: "add-privilege",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#add-pri').html('Processing...');
            $("#add-pri").attr("disabled", true);
        },
        success: function (data) {
            var data = jQuery.parseJSON(data);
            if (data.success) {

                $.toast({
                    heading: 'Success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.href = "users";

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
                        window.location.href = "users";

                    }

                })



            }
        }
    });
});

$(document).on('click', '.check', function (event) {


    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");




    $.ajax({
        url: "status-testimonial",
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


document.addEventListener("click", (evt) => {
    const flyoutEl = document.getElementById("search");
    let targetEl = evt.target;
    do {
        if (targetEl == flyoutEl) {
            $.ajax({
                url: "suggest",
                method: "POST",
                dataType: "JSON",
                success: function (data) {
                    console.log(data);
                    $('#exampleList').html(data);
                }
            });
        }
        // Go up the DOM
        targetEl = targetEl.parentNode;
    } while (targetEl);
    // This is a click outside.      
    $('#exampleList').html('');
});

$('.update-settings').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "update-settings",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#updatcon-btn').html('Processing...');
            $("#updatcon-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            // if (data.error) {
            //     $('#updatcon-btn').html('Submit');
            //     $("#updatcon-btn").attr("disabled", false);
            // }
            if (data.success) {
                $.toast({
                    heading: 'Updated',
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


$('.update-seqtest').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "edit-seqtest",
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

  