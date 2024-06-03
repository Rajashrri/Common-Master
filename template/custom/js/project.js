$('.add-projectcategory').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "add-projectcategory",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#addproject-btn').html('Processing...');
            $("#addproject-btn").attr("disabled", true);
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

                $('#addproject-btn').html('Submit');
                $("#addproject-btn").attr("disabled", false);

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

$(document).on('click', '.fetch-projectcategory', function (event) {

    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-projectcategory",
        type: "POST",
        dataType: "json",
        data: {'id': id},
        success: function (data) {
            console.log(data);
            $('#cat_name').val(data.category_name);
//                        $('#iamge').html('<img style="width: 100px" src="' + data.image_url + '">');

            $('#id').val(data.id);
        }
    });
});

$('.update-projectcategory').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "edit-projectcategory",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#updatproject-btn').html('Processing...');
            $("#updatproject-btn").attr("disabled", true);
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
                $('#updatproject-btn').html('Submit');
                $("#updatproject-btn").attr("disabled", false);
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
                $('#updatproject-btn').html('Submit');
                $("#updatproject-btn").attr("disabled", false);
            }
        }
    });
});
$(document).on('click', '.delete-projectcategory', function (event) {

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
                    url: "delete-projectcategory",
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
$(document).on('click', '.status-projectcategory', function () {


    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");




    $.ajax({
        url: "status-projectcategory",
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



//project list


$('.add-project').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "insert-project",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#addproject-btn').html('Processing...');
            $("#addproject-btn").attr("disabled", true);
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

                if (data.projecttitle_error != '') {
                    $('#projecttitle_error').html(data.projecttitle_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#projecttitle_error').html('');
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

                // if (data.description_error != '') {
                //     $('#description_error').html(data.description_error);
                //     $(".invalid-feedback").css("display", "block");
                // } else {
                //     $('#description_error').html('');
                // }

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

                /*
                 if (data.featured_image_error != '') {
                 $('#featured_image_error').html(data.featured_image_error);
                 $(".invalid-feedback").css("display", "block");
                 } else {
                 $('#featured_image_error').html('');
                 }
                 
                 if (data.main_image_error != '') {
                 $('#main_image_error').html(data.main_image_error);
                 $(".invalid-feedback").css("display", "block");
                 } else {
                 $('#main_image_error').html('');
                 }*/

                $('#addproject-btn').html('Submit');
                $("#addproject-btn").attr("disabled", false);
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
                    window.location.href = "project-list";


                });

                // swal('Success',
                //         data.success,
                //         'success').then(function () {
                //             window.location.href = "project-list";
                // });
            }
        }
    });
});




$(document).on('click', '.fetch-project', function (event) {
    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-project",
        type: "POST",
        dataType: "json",
        data: {'id': id},
        success: function (data) {
            console.log(data);
            $('#payment_name').val(data.name);
            $('#days').val(data.days);

            $('#id').val(data.id);
        }
    });
});

$('.update-project').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "editproject",
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

                if (data.projecttitle11_error != '') {
                    $('#projecttitle11_error').html(data.projecttitle11_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#projecttitle11_error').html('');
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
                    window.location.href = "../project-list";


                });
            }
        }
    });
});
$(document).on('click', '.delete-project', function () {

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
                    url: "delete-project",
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
$(document).on('click', '.status-project', function () {


    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");



    $.ajax({
        url: "status-project",
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
$(document).on('click', '.feature-project', function () {


    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");



    $.ajax({
        url: "feature-project",
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

$('.update-projectseo').on('submit', function (event) {

    event.preventDefault();
    $.ajax({
        url: "projectseo",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#projectseo-btn').html('Processing...');
            $("#projectseo-btn").attr("disabled", true);
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
                $('#projectseo-btn').html('Submit');
                $("#projectseo-btn").attr("disabled", false);
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

$(document).on('click', '.fetch-seqprojcat', function (event) {
    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-seqprojcat",
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
$('.update-seqprojcat').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "edit-seqprojcat",
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

$(document).on('click', '.fetch-seqproj', function (event) {
    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-seqproj",
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
$('.update-seqproj').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "edit-seqproj",
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