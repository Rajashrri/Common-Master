//front  Request callback

$('.add-contact').on('submit', function (event) {

    event.preventDefault();
    $.ajax({

        url: 'add-contact',
        method: "post",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#addcon-btn').html('SUBMIT');
            $("#addcon-btn").attr("disabled", true);
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
                if (data.email_error != '') {
                    $('#email_error').html(data.email_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#email_error').html('');
                }

                if (data.mobile_error != '') {
                    $('#mobile_error').html(data.mobile_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#mobile_error').html('');
                }
                $('#addcon-btn').html('SUBMIT');
                $("#addcon-btn").attr("disabled", false);
            }
            if (data.success) {

                window.location.href = "thank-you";
            }
        }
    });
});



$('.subscribtion').on('submit', function (event) {
    var url = $('#url').val();
    var url1 = $('#url1').val();
    event.preventDefault();
    $.ajax({
        url: url,
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#subscribe-btn').html('<i class="fa fa-paper-plane-o"></i>');
            $("#subscribe-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.emailnesletter_error != '') {
                    $('#emailnesletter_error').html(data.emailnesletter_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#emailnesletter_error').html('');
                }


                $('#subscribe-btn').html('<i class="fa fa-paper-plane-o"></i>');
                $("#subscribe-btn").attr("disabled", false);
            }

            if (data.success) {
                window.location.href = url1;


            }
        }
    });
});



$('.service-enqury').on('submit', function (event) {
    var url = $('#ser_url').val();
    var th_url = $('#th_url').val();

    event.preventDefault();
    $.ajax({
        url: url,
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#enq-btn').html('SUBMIT NOW');
            $("#enq-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.email_error != '') {
                    $('#email_error').html(data.email_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#email_error').html('');
                }

                if (data.name_error != '') {
                    $('#name_error').html(data.name_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#name_error').html('');
                }

                if (data.mobile_error != '') {
                    $('#mobile_error').html(data.mobile_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#mobile_error').html('');
                }
                $('#enq-btn').html('SUBMIT NOW');
                $("#enq-btn").attr("disabled", false);
            }

            if (data.success) {

                window.location.href = th_url;

            }
        }
    });
});





  