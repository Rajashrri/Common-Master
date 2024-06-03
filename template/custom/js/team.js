$('.add-team').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "insert-teams",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#addteam-btn').html('Processing...');
            $("#addteam-btn").attr("disabled", true);
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
                if (data.designation_error != '') {
                    $('#designation_error').html(data.designation_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#designation_error').html('');
                }
                $('#addteam-btn').html('Submit');
                $("#addteam-btn").attr("disabled", false);

            }
            if (data.success) {

                $.toast({
                    heading: 'Success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.href = "team_list";
                    }

                })

            }
        }
    });
});




$(document).on('click', '.fetch-team', function (event) {

    event.preventDefault();

    var wrap_html = "";

    var id = $(this).attr("data-id");

    console.log(id);

    $.ajax({

        url: "retrive-team",

        type: "POST",

        dataType: "json",

        data: {'id': id},

        success: function (data) {

            console.log(data.briefintro);

            $('#name').val(data.name);

            $('#designation').val(data.designation);

            $('#briefintro').html(data.briefintro);
  $('#seq_id').val(data.seq_id);
            $('#idcatpro').val(data.id);
            $('#id').val(data.id);

        }

    });

});

$('.update-team').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "editteam",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#updateteam-btn').html('Update');
            $("#updateteam-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.shortinfoteam_error != '') {
                    $('#shortinfoteam_error').html(data.shortinfoteam_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#shortinfoteam_error').html('');
                }
                if (data.desoteam_error != '') {
                    $('#desoteam_error').html(data.desoteam_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#desoteam_error').html('');
                }
                if (data.nameteam_error != '') {
                    $('#nameteam_error').html(data.nameteam_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#nameteam_error').html('');
                }

                  $('#updateteam-btn').html('Update');
            $("#updateteam-btn").attr("disabled", false); 

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
                $('#updateteam-btn').html('Update');
            $("#updateteam-btn").attr("disabled", false); 
               }
        }
    });
});


$(document).on('click', '.delete-team', function (event) {
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
    }).then(function (t) {
        t.value ?
                $.ajax({
                    url: "delete-team",
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




$(document).on('click', '.status-team', function () {

    var id = $(this).attr("data-id");
    var status_id = $(this).attr("data-status");



   
                $.ajax({
                    url: "status-team",
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

$('.update-seqteam').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "edit-seqteam",
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

  
  
  