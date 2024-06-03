$(document).ready(function() {
    var submit = $("#delete_all").hide();
    var submit1 = $("#status").hide();
        $cbs = $('input[name="checkbox_value[]"]').click(function() {
            if($cbs.is(":checked")){
                $("#status").show();
                 $("#delete_all").show();
            }else{
                $("#delete_all").hide();
                $("#status").hide();
            }
          
           
        });
});

    $("#statuscategory button").click(function (ev) {
        ev.preventDefault()
    
        if ($(this).attr("value") == "Delete") {
    
            let form = document.getElementById('statuscategory');
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
                            url: "delete_allcat",
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
            let form = document.getElementById('statuscategory');
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
                        url: "status_allcat",
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
                        url: "status_allcatde",
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


    $("#statuslist button").click(function (ev) {
        ev.preventDefault()
    
        if ($(this).attr("value") == "Delete") {
    
            let form = document.getElementById('statuslist');
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
                            url: "delete_all",
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
            let form = document.getElementById('statuslist');
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
                        url: "status_all",
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
                        url: "status_allde",
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


$('#insert-statseo').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "insert-statseo",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#add-statseo').html('Processing...');
            $("#add-statseo").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {

                if (data.pagename_error != '') {
                    $('#pagename_error').html(data.pagename_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#pagename_error').html('');
                }

                if (data.metatitle_error != '') {
                    $('#metatitle_error').html(data.metatitle_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#metatitle_error').html('');
                }
                if (data.metadesc_error != '') {
                    $('#metadesc_error').html(data.metadesc_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#metadesc_error').html('');
                }
                if (data.canonical_error != '') {
                    $('#canonical_error').html(data.canonical_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#canonical_error').html('');
                }
                if (data.schemacode_error != '') {
                    $('#schemacode_error').html(data.schemacode_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#schemacode_error').html('');
                }
                $('#add-statseo').html('Submit');
                $("#add-statseo").attr("disabled", false);

            }
            if (data.success) {

                $.toast({
                    heading: 'Success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.href = "static-list";
                    }

                })

            }
        }
    });
});
$(document).on('click', '.delete-page', function (event) {
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
                    url: "delete-page",
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
$('#update-statseo').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "edit",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#add-statseo').html('Processing...');
            $("#add-statseo").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {

                if (data.pagename1_error != '') {
                    $('#pagename1_error').html(data.pagename1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#pagename1_error').html('');
                }

                if (data.metatitle1_error != '') {
                    $('#metatitle1_error').html(data.metatitle1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#metatitle1_error').html('');
                }
                if (data.metadesc1_error != '') {
                    $('#metadesc1_error').html(data.metadesc1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#metadesc1_error').html('');
                }
                if (data.canonical1_error != '') {
                    $('#canonical1_error').html(data.canonical1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#canonical1_error').html('');
                }
                if (data.schemacode1_error != '') {
                    $('#schemacode1_error').html(data.schemacode1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#schemacode1_error').html('');
                }
                $('#add-statseo').html('Update');
                $("#add-statseo").attr("disabled", false);

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

                })
                $('#add-statseo').html('Update');
                $("#add-statseo").attr("disabled", false);

            }
        }
    });
});

$('.add-role').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "add-role",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#addrole-btn').html('Processing...');
            $("#addrole-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.role1_error != '') {
                    $('#role1_error').html(data.role1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#role1_error').html('');
                }

                $('#addrole-btn').html('Submit');
                $("#addrole-btn").attr("disabled", false);

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

$('.fetch-role').on('click', function (event) {
    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-role",
        type: "POST",
        dataType: "json",
        data: {'id': id},
        success: function (data) {
            console.log(data);
            $('#cat_name').val(data.role);
            $('#id').val(data.id);
        }
    });
});

$('.update-role').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "edit-role",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#updatrole-btn').html('Processing...');
            $("#updatrole-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.role_error != '') {
                    $('#role_error').html(data.role_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#role_error').html('');
                }
                $('#updatrole-btn').html('Submit');
                $("#updatrole-btn").attr("disabled", false);
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
                $('#updatrole-btn').html('Submit');
                $("#updatrole-btn").attr("disabled", false);
            }
        }
    });
});
$(document).on('click', '.delete-role', function (event) {

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
                    url: "delete-role",
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

function deleteContact(id) {
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
                    url: "deletecontact",
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
                                    $('#con_' + id).remove();
                                    window.location.reload();
                                }

                            })


                        }
                    }
                }) : t.dismiss === Swal.DismissReason.cancel


    })

}
function deleteImage(id) {

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
                    url: "deleteem",
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
                                    $('#imgb_' + id).remove();
                                    window.location.reload();
                                }

                            })


                        }
                    }
                }) : t.dismiss === Swal.DismissReason.cancel


    })
}
//////////////////////////////////////////page dyanamic///////////////////////////////////////////////////////////////

$('.add-page').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "add-page",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#addpage-btn').html('Processing...');
            $("#addpage-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.pagename_error != '') {
                    $('#pagename_error').html(data.pagename_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#pagename_error').html('');
                }

                $('#addpage-btn').html('Submit');
                $("#addpage-btn").attr("disabled", false);

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

$('.fetch-page').on('click', function (event) {
   
    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-pagename",
        type: "POST",
        dataType: "json",
        data: {'id': id},
        success: function (data) {
            console.log(data);
            $('#cat_name').val(data.pagename);
//                        $('#iamge').html('<img style="width: 100px" src="' + data.image_url + '">');

            $('#id').val(data.id);
        }
    });
});

$('.update-page').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "edit-page",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#updatepage-btn').html('Processing...');
            $("#updatepage-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.pagename1_error != '') {
                    $('#pagename1_error').html(data.pagename1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#pagename1_error').html('');
                }
                $('#updatepage-btn').html('Submit');
                $("#updatepage-btn").attr("disabled", false);
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
                $('#updatepage-btn').html('Submit');
                $("#updatepage-btn").attr("disabled", false);
            }
        }
    });
});
$(document).on('click', '.delete-page-static', function (event) {

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
                    url: "delete-page",
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


//need to use onclick button function for jquery validation 
function toggle_check(){
    var checkboxes = document.getElementsByName('checkbox_value[]');
    var button = document.getElementById('toggle');                                                                               
    if(button.value == 'Select All'){
       for(var i in checkboxes){
           checkboxes[i].checked='FALSE';
       }
       button.value ='Deselect';
       $("#status").show();
       $("#sta").hide();
       $("#delete_all").show();
       
    }
     else{
         for(var i in checkboxes){
           checkboxes[i].checked='';
             }
         button.value = 'Select All';
         $("#status").hide();
         $("#sta").show();
         $("#delete_all").hide();
     }
}


(function($) {
   "use strict";
   var value = $("#password").val();

   $.validator.addMethod("checklower", function(value) {
       return /[a-z]/.test(value);
   });
   $.validator.addMethod("checkupper", function(value) {
       return /[A-Z]/.test(value);
   });
   $.validator.addMethod("checkdigit", function(value) {
       return /[0-9]/.test(value);
   });
   $.validator.addMethod("checkchar", function(value) {
       return /[!@#$%&*]/.test(value);
   });
   jQuery.validator.addMethod("noSpace", function(value, element) {
       return value.indexOf(" ") < 0 && value != "";
   }, "No space please and don't leave it empty");


$(function() {
  
   $("#subadmin-form").validate({
       rules: {
           email: {
               required: true,
               noSpace: true,
               email: true
           },
           name:{
               required: true,
           },
           role:{
               required: true,  
           },
           password: {
               required: true,
               noSpace: true,
               minlength: 8,
               maxlength: 32,
               checklower: true,
               checkupper: true,
               checkchar: true,
               checkdigit: true
           }
       },
       messages: {
           password: {
               required: 'Password can not be empty.',
               checklower: "Need atleast One Lowercase Alphabet",
               checkupper: "Need atleast One Uppercase Alphabet",
               checkdigit: "Need atleast One Digit",
               checkchar: "Need atleast One Special Character"
           },
           email: {
               required: 'Email can not be empty.',
               email: 'Please enter a valid email address.'
           },
           role:{
               required: 'Role can not be empty.',
               
           },
           name:{
               required: 'Name can not be empty.',
               
           }

       },
       submitHandler: function(form) {
           console.log(form);
           var name = $("#name").val();
           var password = $("#password").val();
           var email = $("#email").val();
           var role = $("#role").val();
           $.ajax({
               url: "insert-subadmin",
               method: "POST",
               dataType: "json",
               data: { role: role, password: password, email: email, name: name },
               beforeSend: function() {
                   $('#add-subadmin').html('Processing...');
                   $("#add-subadmin").attr("disabled", true);
               },
               success: function(data) {
                   console.log(data);
                   if (data.error) {

                       $.toast({
                           heading: 'error',
                           text: "Sub Admin already exist.",
                           icon: 'error',
                           loader: true,
                           position: 'top-right',
                           afterHidden: function () {
                               window.location.reload();
               
                           }
                          
                           })

                      


                   }
                   if (data.success) {

                       $.toast({
                           heading: 'Success',
                           text: data.success,
                           icon: 'success',
                           loader: true,
                           position: 'top-right',
                           afterHidden: function () {
                               window.location.href= "subadminlist";
               
                           }
                          
                           })

                     

                   }
                  
               }
           });


       }
   });
});

//edit
$(function() {

   $("#update-subadmin").validate({
     
       rules: {
           email: {
               required: true,
               noSpace: true,
               email: true
           },
           name:{
               required: true,
           },
           role:{
               required: true,  
           },
           password: {
               required: true,
               noSpace: true,
               minlength: 8,
               maxlength: 32,
               checklower: true,
               checkupper: true,
               checkchar: true,
               checkdigit: true
           }
       },
       messages: {
           password: {
               required: 'Password can not be empty.',
               checklower: "Need atleast One Lowercase Alphabet",
               checkupper: "Need atleast One Uppercase Alphabet",
               checkdigit: "Need atleast One Digit",
               checkchar: "Need atleast One Special Character"
           },
           email: {
               required: 'Email can not be empty.',
               email: 'Please enter a valid email address.'
           },
           role:{
               required: 'Role can not be empty.',
               
           },
           name:{
               required: 'Name can not be empty.',
               
           }

       },
      
       submitHandler: function(form) {
           
           console.log(form);
           var name = $("#name").val();
           var password = $("#password").val();
           var email = $("#email").val();
           var role = $("#role").val();
           var id = $("#subid").val();
           $.ajax({
               url: "../update-subadmin",
               method: "POST",
               dataType: "json",
               data: { role: role, password: password, email: email, name: name, id:id},
               beforeSend: function() {
                   $('#edit-subadmin').html('Processing...');
                   $("#edit-subadmin").attr("disabled", true);
               },
               success: function(data) {
                   console.log(data);
                   if (data.error) {

                       $.toast({
                           heading: 'error',
                           text: data.error,
                           icon: 'error',
                           loader: true,
                           position: 'top-right',
                           afterHidden: function () {
                               $('#edit-subadmin').html('Update');
                               $("#edit-subadmin").attr("disabled", false);
               
                           }
                          
                           })

                      


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


       }
   });
});

})(jQuery);

$('.edit-privilege').on('submit', function(event) {
   event.preventDefault();
   $.ajax({
       url: "../update-privilege",
       method: "POST",
       data: new FormData(this),
       contentType: false,
       cache: false,
       processData: false,
       beforeSend: function() {
           $('#edit-pri').html('Processing...');
           $("#edit-pri").attr("disabled", true);
       },
       success: function(data) {
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
                   text:data.error,
                   icon: 'error',
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

$(document).on('click', '.status-subadmin', function () {
     
   var id = $(this).attr("data-id");
   var status_id = $(this).attr("data-status");



  
           $.ajax({
               url: "status-subadmin",
               type: "POST",
               dataType: "json",
               data: { 'id': id, 'status_id': status_id },
               success: function(data) {
                   if (data.success) {
                       $.toast({
                           heading: 'UPDATED',
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