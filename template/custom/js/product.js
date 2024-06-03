// Product Category Js
$('.add-category').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "add-category",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#addcat-btn').html('Processing...');
            $("#addcat-btn").attr("disabled", true);
        },
        success: function(data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.categoryname_error != '') {
                    $('#categoryname_error').html(data.categoryname_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#categoryname_error').html('');
                }
                $('#addcat-btn').html('Submit');
                $("#addcat-btn").attr("disabled", false);
            }
            if (data.success) {

                $.toast({
                    heading: 'Success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                      
                        window.location.href="category-list";
        
        
                       }
                   
                    })



            }
        }
    });
});

$(document).on('click', '.fetch-category', function (event) {
    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-category",
        type: "POST",
        dataType: "json",
        data: { 'id': id },
        success: function(data) {
            console.log(data);
            $('#cat_name').val(data.category_name);
            $('#id').val(data.id);
        }
    });
});

$(document).on('click', '.fetch-seq', function (event) {
    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-seqpro",
        type: "POST",
        dataType: "json",
        data: { 'id': id },
        success: function(data) {
            console.log(data);
            $('#seq_id').val(data.seq_id);
            $('#id').val(data.id);
        }
    });
});
$('.update-seq').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "edit-seqpro",
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



$(document).on('click', '.fetch-seqprocat', function (event) {
    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-seqprocat",
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

$('.update-seqprocat').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "edit-seqprocat",
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
$('.update-category').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "edit-category",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#updatcat-btn').html('Processing...');
            $("#updatcat-btn").attr("disabled", true);
        },
        success: function(data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.categorynameedit_error != '') {
                    $('#categorynameedit_error').html(data.categorynameedit_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#categorynameedit_error').html('');
                }

                $('#updatcat-btn').html('Update');
                $("#updatcat-btn").attr("disabled", false);
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
$(document).on('click', '.delete-category', function (event) {
    event.preventDefault();
    var id = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover",
        icon: "warning",
        confirmButtonText: "Yes, delete it!",
        showCancelButton: !0,
        reverseButtons: true,
        customClass: {
            actions: 'my-actions',
            cancelButton: "btn btn-label-secondary",
            
            confirmButton: "btn btn-primary me-3"
        },
        buttonsStyling: !1
    }).then(function(t) {
        t.value ?
            $.ajax({
                url: "delete-category",
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
$(document).on('click', '.status-category', function () {
 
    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");
$.ajax({
                url: "status-category",
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

//subcategory


// Product Category Js
$('.add-subcategory').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "add-subcategory",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#addsubcat-btn').html('Processing...');
            $("#addsubcat-btn").attr("disabled", true);
        },
        success: function(data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.categorypro_error != '') {
                    $('#categorypro_error').html(data.categorypro_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#categorypro_error').html('');
                }

                if (data.subcategory_error != '') {
                    $('#subcategory_error').html(data.subcategory_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#subcategory_error').html('');
                }
                $('#addsubcat-btn').html('Submit');
                $("#addsubcat-btn").attr("disabled", false);
            }
            if (data.success) {

                $.toast({
                    heading: 'Success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                      
                        window.location.href="subcategory-list";
        
        
                       }
                   
                    })

                


            }
        }
    });
});

$(document).on('click', '.fetch-subcategory', function (event) {
    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-subcategory",
        type: "POST",
        dataType: "json",
        data: { 'id': id },
        success: function(data) {
            console.log(data);
            $('#e_category_id').val(data.category_id);
            $('#subcat_name').val(data.subcategory);
            $('#id').val(data.id);
        }
    });
});

$('.update-subcategory').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "edit-subcategory",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#updatsub-btn').html('Processing...');
            $("#updatsub-btn").attr("disabled", true);
        },
        success: function(data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.categoryproedit_error != '') {
                    $('#categoryproedit_error').html(data.categoryproedit_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#categoryproedit_error').html('');
                }


                if (data.subcategorycat_error != '') {
                    $('#subcategorycat_error').html(data.subcategorycat_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#subcategorycat_error').html('');
                }
                $('#updatsub-btn').html('Submit');
                $("#updatsub-btn").attr("disabled", false);
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
                $('#updatsub-btn').html('Submit');
                $("#updatsub-btn").attr("disabled", false);
              

            }
        }
    });
});


$(document).on('click', '.delete-subcategory', function () {

 
    var id = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonText: "Yes, Delete it!",
        reverseButtons: true,
        customClass: {
            cancelButton: "btn btn-label-secondary",
            confirmButton: "btn btn-primary me-3"
           
        },
        buttonsStyling: !1
    }).then(function(t) {
        t.value ?
            $.ajax({
                url: "delete-subcategory",
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

$(document).on('click', '.status-subcategory', function () {

    
    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");



            $.ajax({
                url: "status-subcategory",
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

//product

$(document).ready(function() {
    $('#productcategory_id').on('change', function(event) {
        event.preventDefault();
        var category_id = $('#productcategory_id').val();
        console.log(category_id);
        $.ajax({
            url: "fetch-subCat",
            method: "POST",
            data: { category_id: category_id },
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                $('#productsubcategory_id').html(data);
            }
        });
    });
});

$(document).ready(function() {

    // City change
    $('#sel_city').change(function() {
        var category_id = $(this).val();

        // AJAX request
        $.ajax({
            url: 'getCityDepartment',
            method: 'post',
            data: { category_id: category_id },
            dataType: 'json',
            success: function(response) {

                // Remove options 
                $('#sel_user').find('option').not(':first').remove();
                $('#sel_depart').find('option').not(':first').remove();

                // Add options
                $.each(response, function(index, data) {
                    $('#sel_depart').append('<option value="' + data['id'] + '">' + data['subcategory'] + '</option>');
                });
            }
        });
    });

    // Department change

});






$('.add-product').on('submit', function(event) {
    event.preventDefault();

    $.ajax({
        url: "insert-product",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#addproduct-btn').html('Processing...');
            $("#addproduct-btn").attr("disabled", true);
        },
        success: function(data) {
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
                if (data.description_error != '') {
                    $('#description_error').html(data.description_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#description_error').html('');
                }


                // if (data.description11_error != '') {
                //     $('#description11_error').html(data.description11_error);
                //     $(".invalid-feedback").css("display", "block");
                // } else {
                //     $('#description11_error').html('');
                // }
                if (data.msg_error != '') {
                    $('#msg_error').html(data.msg_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#msg_error').html('');
                }
                if (data.msg1_error != '') {
                    $('#msg1_error').html(data.msg1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#msg1_error').html('');
                }

                if (data.main_error != '') {
                    $('#main_error').html(data.main_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#main_error').html('');
                }

                if (data.featured_error != '') {
                    $('#featured_error').html(data.featured_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#featured_error').html('');
                }


                $('#addproduct-btn').html('Submit');
                $("#addproduct-btn").attr("disabled", false);
            }
            if (data.success) {

                $.toast({
                    heading: 'Success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.href = "product-list";
        
        
                       }
                   
                    })

             

            }
        }
    });
});



$('.update-product').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "editproduct",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#updatpro-btn').html('Processing...');
            $("#updatpro-btn").attr("disabled", true);
        },
        success: function(data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.category1_error != '') {
                    $('#category1_error').html(data.category1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#category1_error').html('');
                }

                if (data.name1_error != '') {
                    $('#name1_error').html(data.name1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#name1_error').html('');
                }
                if (data.description1_error != '') {
                    $('#description1_error').html(data.description1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#description1_error').html('');
                }

                // if (data.description111_error != '') {
                //     $('#description111_error').html(data.description111_error);
                //     $(".invalid-feedback").css("display", "block");
                // } else {
                //     $('#description111_error').html('');
                // }

                $('#updatpro-btn').html('Submit');
                $("#updatpro-btn").attr("disabled", false);
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

$(document).on('click', '.status-product', function () {

   
    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");


            $.ajax({
                url: "status-product",
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

$(document).on('click', '.delete-product', function (event) {

    event.preventDefault();
    var id = $(this).attr("data-id");


    Swal.fire({
        title: "Are you sure?",
        text:"Once deleted, you will not be able to recover",
        icon: "warning",
        reverseButtons: true,
        showCancelButton: !0,
        confirmButtonText: "Yes, Delete it!",
        customClass: {
            confirmButton: "btn btn-primary me-3",
            cancelButton: "btn btn-label-secondary"
        },
        buttonsStyling: !1
    }).then(function(t) {
        t.value ?
            $.ajax({
                url: "delete-product",
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




$("#plist button").click(function (ev) {
    ev.preventDefault()
   
    if ($(this).attr("value") == "Delete") {  
      
       let form = document.getElementById('plist');
        let formData = new FormData(form);
        Swal.fire({
            title: "Are you sure?",
            text:"Once deleted, you will not be able to recover",
           
            icon: "warning",
            showCancelButton: !0,
            reverseButtons: true,
            confirmButtonText: "Yes, Delete it!",
            customClass: {
                cancelButton: "btn btn-label-secondary",
                confirmButton: "btn btn-primary me-3",
                
            },
            buttonsStyling: !1
        }).then(function(t) {
            t.value ?
        $.ajax({
            url: "delete_allp",
            method: "POST",
            data:  formData,
            contentType: false,
            cache: false,
            processData: false,
            
            success: function(data) {
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
        let form = document.getElementById('plist');
        let formData = new FormData(form);
        Swal.fire({
            title: "Are you sure?",
      
            icon: "warning",
            showCancelButton: true,
            showDenyButton: true,
            confirmButtonText: "Activate",
            denyButtonText: "Deactivated",
            reverseButtons: true,
            customClass: {
                confirmButton: "btn btn-success ",
                denyButton: "btn btn-danger ",
                
                cancelButton: "btn btn-info",
            },
            buttonsStyling: !1
        }).then((result) =>{
            if(result.isConfirmed){
        $.ajax({
            url: "status_allp",
            method: "POST",
            data:  formData,
            contentType: false,
            cache: false,
            processData: false,
            
            success: function(data) {
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
                url: "status_allpde",
                method: "POST",
                data:  formData,
                contentType: false,
                cache: false,
                processData: false,
                
                success: function(data) {
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
    }else{
       
        
       }
     });
    }
  });
$(document).on('click', '.featured-product', function () {



    var id = $(this).attr("data-id");
    var status = $(this).attr("data-status");



   
            $.ajax({
                url: "featured-product",
                type: "POST",
                dataType: "json",
                data: { 'id': id, 'status': status },
                success: function(data) {
                    if (data.success) {
                        $.toast({
                            heading: 'success',
                            text:data.success,
                            icon: 'success',
                            loader: true,
                            position: 'top-right',
                            afterHidden: function () {
                               
                                window.location.reload();
                
                               }
                           
                            })
                            
                      
                    }
                   
                    // if(data.status == '0'){
                    //   $('#thmbsdm').addClass('fa fa-thumbs-down');
                          
                    // }else{
                    //     $('#thmbsup').addClass('fa fa-thumbs-up');
                    // }
                }
          
               
    })


});

$('.update-seop').on('submit', function(event) {
    
    event.preventDefault();
    $.ajax({
        url: "editproductseo",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#updatseop-btn').html('Processing...');
            $("#updatseop-btn").attr("disabled", true);
        },
        success: function(data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                $.toast({
                    heading: 'Warning',
                    text:data.error,
                    icon: 'warning',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        
        
        
                       }
                   
                    })
                $('#updatseop-btn').html('Update');
                $("#updatseop-btn").attr("disabled", false);

            }
            if (data.success) {

                $.toast({
                    heading: 'success',
                    text:data.success,
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



//category
$("#pro_cat button").click(function (ev) {
    ev.preventDefault()

    if ($(this).attr("value") == "Delete") {

        let form = document.getElementById('pro_cat');
        let formData = new FormData(form);
        Swal.fire({
            title: "Are you sure?",
            text:"Once deleted, you will not be able to recover",
            icon: "warning",
            showCancelButton: !0,
          
            confirmButtonText: "Yes Delete it!",
            reverseButtons: true,
            customClass: {
               cancelButton: "btn btn-label-secondary",
                confirmButton: "btn btn-primary me-3"
            },
            buttonsStyling: !1
        }).then(function (t) {
            t.value ?
                    $.ajax({
                        url: "delete_allprocat",
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
        let form = document.getElementById('pro_cat');
        let formData = new FormData(form);
        Swal.fire({
            title: "Are you sure?",
        
            icon: "warning",
            showCancelButton: true,
            showDenyButton: true,
            denyButtonText: "Deactivated",
            confirmButtonText: "Activate",
          
            
            customClass: {
               
                
                confirmButton: "btn btn-success ",
                denyButton: "btn btn-danger ",
              
                cancelButton: "btn btn-info",
            },
            buttonsStyling: !1
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "status_allprocat",
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
                    url: "status_allprocatde",
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
$("#pro_subcat button").click(function (ev) {
    ev.preventDefault()

    if ($(this).attr("value") == "Delete") {

        let form = document.getElementById('pro_subcat');
        let formData = new FormData(form);
        Swal.fire({
            title: "Are you sure?",
            text:"Once deleted, you will not be able to recover",
            icon: "warning",
            showCancelButton: !0,
            reverseButtons: true,
            confirmButtonText: "Yes Delete it!",
            reverseButtons: true,
            customClass: {
                confirmButton: "btn btn-primary me-3",
                cancelButton: "btn btn-label-secondary"
            },
            buttonsStyling: !1
        }).then(function (t) {
            t.value ?
                    $.ajax({
                        url: "delete_allprosubcat",
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
        let form = document.getElementById('pro_subcat');
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
                    url: "status_allprosubcat",
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
                    url: "status_allprosubcatde",
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


//product


$("#plist button").click(function (ev) {
    ev.preventDefault()

    if ($(this).attr("value") == "Delete") {

        let form = document.getElementById('plist');
        let formData = new FormData(form);
        Swal.fire({
            title: "Are you sure?",
            text:"Once deleted, you will not be able to recover",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, Delete it!",
            reverseButtons: true,
            customClass: {
                confirmButton: "btn btn-primary me-3",
                cancelButton: "btn btn-label-secondary"
            },
            buttonsStyling: !1
        }).then(function (t) {
            t.value ?
                    $.ajax({
                        url: "delete_allpro",
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
        let form = document.getElementById('plist');
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
                    url: "status_allpro",
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
                    url: "status_alldepro",
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