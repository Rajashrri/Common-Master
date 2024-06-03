//author js

$('.add-servicecategory').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "add-servicecategory",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#addsercat-btn').html('Processing...');
            $("#addsercat-btn").attr("disabled", true);
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

                $('#addsercat-btn').html('Submit');
                $("#addsercat-btn").attr("disabled", false);

            }

            if (data.success) {
                $.toast({
                    heading: 'Success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.href = "servicecategory-list";


                    }

                })
              }
              
        }
    });
});


$(document).on('click', '.fetch-sercat', function (event) {
    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-servicecategory",
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


$('.update-sercat').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "edit-servicecategory",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#updatsercat-btn').html('Processing...');
            $("#updatsercat-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.e_name_error != '') {
                    $('#e_name_error').html(data.e_name_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#e_name_error').html('');
                }

                $('#updatsercat-btn').html('Submit');
                $("#updatsercat-btn").attr("disabled", false);
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
                $('#updatsercat-btn').html('Submit');
                $("#updatsercat-btn").attr("disabled", false);
               }
        }
    });
});




$(document).on('click', '.delete-sercat', function (event) {
    event.preventDefault();
    var id = $(this).attr("data-id");


    Swal.fire({
        title: "Are you sure?",
        icon: "warning",
        text:"Once deleted, you will not be able to recover",
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
                    url: "delete-servicecategory",
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
                }) : t.dismiss === Swal.DismissReason.cancel &&
                $.toast({
                    heading: 'Cancelled',
                    text: "Your Record has not been deleted",
                    icon: 'warning',
                    loader: true,
                    position: 'top-right',
                })


    })

});

$(document).on('click', '.status-sercat', function () {

    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");

   
                $.ajax({
                    url: "status-servicecategory",
                    type: "POST",
                    dataType: "json",
                    data: {'id': id, 'status_id': status_id},
                    success: function (data) {
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
               


    })

});

$(document).on('click', '.delete-service', function (event) {
    event.preventDefault();
    var id = $(this).attr("data-id");



    Swal.fire({
        title: "Are you sure?",
        icon: "warning",
        text:"Once deleted, you will not be able to recover",
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
                    url: "delete-service",
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


$(document).on('click', '.status-service', function () {
    
    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");



 
                $.ajax({
                    url: "status-service",
                    type: "POST",
                    dataType: "json",
                    data: {'id': id, 'status_id': status_id},
                    success: function (data) {
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
                    }
              


    })


});

$(document).on('click', '.featured-service', function () {

   
    var id = $(this).attr("data-id");
    var status = $(this).attr("data-status");



    
                $.ajax({
                    url: "featured-service",
                    type: "POST",
                    dataType: "json",
                    data: {'id': id, 'status': status},
                    success: function (data) {
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


$('.update-seos').on('submit', function (event) {

    event.preventDefault();
    $.ajax({
        url: "editseo",
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
        }

    });

});
//subcategory


// Product Category Js
$('.add-sersubcategory').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "add-servicesubcategory",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#addsersubcat-btn').html('Processing...');
            $("#addsersubcat-btn").attr("disabled", true);
        },
        success: function(data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.categoryser_error != '') {
                    $('#categoryser_error').html(data.categoryser_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#categoryser_error').html('');
                }

                if (data.sersubcategory_error != '') {
                    $('#sersubcategory_error').html(data.sersubcategory_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#sersubcategory_error').html('');
                }
                $('#addsersubcat-btn').html('Submit');
                $("#addsersubcat-btn").attr("disabled", false);
            }
            if (data.success) {

                $.toast({
                    heading: 'Success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                      
                        window.location.href="service-subcategory-list";
        
        
                       }
                   
                    });

                


            }
        }
    });
});


$(document).on('click', '.fetch-sersubcategory', function (event) {
    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-servicesubcategory",
        type: "POST",
        dataType: "json",
        data: { 'id': id },
        success: function(data) {
            console.log(data);
            $('#e_category_id').val(data.category_id);
              $('#seq_id').val(data.seq_id);
            $('#idcatpro').val(data.id);
            $('#subcat_name').val(data.subcategory_name);
            $('#id').val(data.id);
        }
    });
});

$('.update-sersubcategory').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "edit-servicesubcategory",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#updatsersub-btn').html('Processing...');
            $("#updatsersub-btn").attr("disabled", true);
        },
        success: function(data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.sercategoryproedit_error != '') {
                    $('#sercategoryproedit_error').html(data.sercategoryproedit_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#sercategoryproedit_error').html('');
                }


                if (data.sersubcatedit_error != '') {
                    $('#sersubcatedit_error').html(data.sersubcatedit_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#sersubcatedit_error').html('');
                }
                $('#updatsersub-btn').html('Submit');
                $("#updatsersub-btn").attr("disabled", false);
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
                $('#updatsersub-btn').html('Submit');
                $("#updatsersub-btn").attr("disabled", false);
               }
        }
    });
});


$(document).on('click', '.delete-sersubcategory', function (event) {

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
                url: "delete-servicesubcategory",
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

$(document).on('click', '.status-sersubcategory', function () {

   
    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");



    
            $.ajax({
                url: "status-sersubcategory",
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
$(document).ready(function() {

    // City change
    $('#ser_cat').change(function() {
        var category_id = $(this).val();

        // AJAX request
        $.ajax({
            url: 'getCityDepartment1',
            method: 'post',
            data: { category_id: category_id },
            dataType: 'json',
            success: function(response) {

                // Remove options 
                $('#sel_user').find('option').not(':first').remove();
                $('#sel_subser').find('option').not(':first').remove();

                // Add options
                $.each(response, function(index, data) {
                    $('#sel_subser').append('<option value="' + data['id'] + '">' + data['subcategory_name'] + '</option>');
                });
            }
        });
    });

    // Department change

});
$("#slist button").click(function (ev) {
    ev.preventDefault()

    if ($(this).attr("value") == "Delete") {

        let form = document.getElementById('slist');
        let formData = new FormData(form);
        Swal.fire({
            title: "Are you sure?",
text:"Once deleted, you will not be able to recover",
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
                        url: "delete_alls",
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
        let form = document.getElementById('slist');
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
                denyButton: "btn btn-danger",

                cancelButton: "btn btn-info",
            },
            buttonsStyling: !1
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "status_alls",
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
                    url: "status_allsde",
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
//for all pages
function toggle_check() {
    var checkboxes = document.getElementsByName('checkbox_value[]');
    var button = document.getElementById('toggle');
    if (button.value == 'Select All') {
        for (var i in checkboxes) {
            checkboxes[i].checked = 'FALSE';
        }
        button.value = 'Deselect';
    } else {
        for (var i in checkboxes) {
            checkboxes[i].checked = '';
        }
        button.value = 'Select All';
    }
}


//category
$("#sclist button").click(function (ev) {
    ev.preventDefault()

    if ($(this).attr("value") == "Delete") {

        let form = document.getElementById('sclist');
        let formData = new FormData(form);
        Swal.fire({
            title: "Are you sure?",
text:"Once deleted, you will not be able to recover",
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
                        url: "delete_allsc",
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
        let form = document.getElementById('sclist');
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
                    url: "status_allsc",
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
                    url: "status_allscde",
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



//subcategory
$("#ser_subcat button").click(function (ev) {
    ev.preventDefault()

    if ($(this).attr("value") == "Delete") {

        let form = document.getElementById('ser_subcat');
        let formData = new FormData(form);
        Swal.fire({
            title: "Are you sure?",
               text:"Once deleted, you will not be able to recover",
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
                        url: "delete_allsersubcat",
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
        let form = document.getElementById('ser_subcat');
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
                    url: "status_allsersubcat",
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
                    url: "status_allsersubcatde",
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

$('.update-seqsercat').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "edit-seqsercat",
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

$(document).on('click', '.fetch-seqser', function (event) {
    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-seqser",
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
$('.update-seqser').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "edit-seqser",
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