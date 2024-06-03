$('.add-pdf').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "add-pdf",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#addpdf-btn').html('Processing...');
            $("#addpdf-btn").attr("disabled", true);
        },
        success: function(data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.pdf_error != '') {
                    $('#pdf_error').html(data.pdf_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#pdf_error').html('');
                }
                if (data.name_error != '') {
                    $('#name_error').html(data.name_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#name_error').html('');
                }

                $('#addpdf-btn').html('Submit');
                $("#addpdf-btn").attr("disabled", false);
            }
            if (data.success) {

                $.toast({
                    heading: 'Success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.href="pdf-list";
        
        
                       }
                   
                    })

               

            }
        }
    });
});



$('.update-pdf').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "editpdf",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#updatpdf-btn').html('Processing...');
            $("#updatpdf-btn").attr("disabled", true);
        },
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
            if(data.error){
                if (data.pdf1_error != '') {
                    $('#pdf1_error').html(data.pdf1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#pdf1_error').html('');
                }
                if (data.name1_error != '') {
                    $('#name1_error').html(data.name1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#name1_error').html('');
                }
                $('#updatpdf-btn').html('Update');
                $("#updatpdf-btn").attr("disabled", false);
            }
        }
    });
});


    $(document).on('click', '.delete-pdf', function (event) {
        event.preventDefault();
        debugger;
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
                url: "delete-pdf",
                type: "POST",
                dataType: "json",
                data: { 'id': id },
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
            }) : t.dismiss === Swal.DismissReason.cancel 
       
    })



});

    
    $(document).on('click', '.status-pdf', function () {
       
    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");



  
            $.ajax({
                url: "status-pdf",
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
                                window.location.href="pdf-list";
                
                
                               }
                           
                            })
                       
                    }
                }
           
           
            
           
    })

});
  $(document).on('click', '.status-seqpdf', function (event) {
    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-seqpdf",
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
$('.update-seqpdf').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "edit-seqpdf",
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

