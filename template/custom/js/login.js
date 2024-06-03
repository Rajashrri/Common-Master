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
        $("#login-Form").validate({
            rules: {
                username: {
                    required: true,
                    noSpace: true,
                    email: true
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
                username: {
                    required: 'Email can not be empty.',
                    email: 'Please enter a valid email address.'
                }

            },
            submitHandler: function(form) {
                var username = $("#username").val();
                var password = $("#password").val();
                var token = $("#token").val();

                $.ajax({
                    url: "Login-chk",
                    method: "POST",
                    dataType: "json",
                    data: { username: username, password: password, token: token },
                    beforeSend: function() {
                        $('#login-btn').html('Processing...');
                        $("#login-btn").attr("disabled", true);
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.error == true) {
                            $.toast({
                                heading: 'Error',
                                text: data.msg,
                                icon: 'error',
                                loader: true,
                                position: 'top-right',
                                afterHidden: function () {
                    
                    
                                   }
                               
                                })
                           
                            $('#login-btn').html('Sign in');
                            $("#login-btn").attr("disabled", false);

                        }
                        if (data.error == false) {
                            $.toast({
                                heading: 'Success',
                                text: data.msg,
                                icon: 'success',
                                loader: true,
                                position: 'top-right',
                                afterHidden: function () {
                                    window.location.href = "verify-otp";
                                   }
                               
                                })
                             }
                    }
                });


            }
        });
    });

    $(function() {
        $("#login-user").validate({
            rules: {
                username: {
                    required: true,
                    noSpace: true,
                    email: true
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
                username: {
                    required: 'Email can not be empty.',
                    email: 'Please enter a valid email address.'
                }

            },
            submitHandler: function(form) {
                console.log(form);
                var email = $("#email").val();
                var password = $("#password").val();
                var token = $("#token").val();

                $.ajax({
                    url: "Login-user",
                    method: "POST",
                    dataType: "json",
                    data: { email: email, password: password, token: token },
                    beforeSend: function() {
                        $('#loginuser-btn').html('Processing...');
                        $("#loginuser-btn").attr("disabled", true);
                    },
                    success: function(data) {
                        if (data.error == true) {
                            Swal.fire({
                                title: "Error!",
                                text: data.msg,
                                icon: "error",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                },
                                buttonsStyling: !1

                            }).then(function() {
                                window.location.reload();
                            });
                            $('#login-btn').html('Sign in');
                            $("#login-btn").attr("disabled", false);

                        }
                        if (data.error == false) {
                            Swal.fire({
                                position: "Success",
                                icon: "success",
                                title: data.msg,
                                showConfirmButton: !1,
                                timer: 1500,
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                },
                                buttonsStyling: !1
                            }).then(function() {
                                window.location.href = "user/dashboard";
                            });


                        }
                    }
                });


            }
        });
    });

    $(function() {
        $("#forgot-Form").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    required: 'Email can not be empty.',
                    email: 'Please enter a valid email address.'
                }

            },
            submitHandler: function(form) {
                var email = $("#email").val();

                $.ajax({
                    url: "request-password",
                    method: "POST",
                    dataType: "json",
                    data: { email: email },
                    beforeSend: function() {
                        $('#forgot-btn').html('Processing...');
                        $("#forgot-btn").attr("disabled", true);
                    },
                    success: function(data) {
                        if (data.error == true) {
                            $.toast({
                                heading: 'Error',
                                text: data.msg,
                                icon: 'error',
                                loader: true,
                                position: 'top-right',
                                afterHidden: function () {
                                    window.location.reload();
                    
                    
                                   }
                               
                                })

                            
                            $('#verify-otp').html('OTP Verify');
                            $("#verify-otp").attr("disabled", false);

                        }
                        if (data.error == false) {
                            $.toast({
                                heading: 'Success',
                                text: data.msg,
                                icon: 'success',
                                loader: true,
                                position: 'top-right',
                                afterHidden: function () {
                                    window.location.href = "verify-forgot-otp";
                                   }
                               
                                })
                          }
                    }
                });


            }
        });
    });

    $(function() {
        $("#forgot-userForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    required: 'Email can not be empty.',
                    email: 'Please enter a valid email address.'
                }

            },
            submitHandler: function(form) {
                var email = $("#email").val();

                $.ajax({
                    url: "request-userpassword",
                    method: "POST",
                    dataType: "json",
                    data: { email: email },
                    beforeSend: function() {
                        $('#forgot-btn').html('Processing...');
                        $("#forgot-btn").attr("disabled", true);
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.error == true) {
                            Swal.fire({
                                title: "Error!",
                                text: data.msg,
                                icon: "error",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                },
                                buttonsStyling: !1

                            }).then(function() {
                                window.location.reload();
                            });
                            $('#verify-otp').html('OTP Verify');
                            $("#verify-otp").attr("disabled", false);

                        }
                        if (data.error == false) {
                            Swal.fire({
                                position: "Success",
                                icon: "success",
                                title: data.msg,
                                showConfirmButton: !1,
                                timer: 1500,
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                },
                                buttonsStyling: !1
                            }).then(function() {
                                window.location.href = "forgot-userotp";
                            });

                        }
                    }
                });


            }
        });
    });

    $(function() {
        $("#Forgot-Chk1-Otp").validate({
            rules: {
                forgot_otp: {
                    required: true,
                    minlength: 6,
                    maxlength: 6
                }
            },
            messages: {
                forgot_otp: {
                    required: 'OTP can not be empty.'
                }

            },

            submitHandler: function(form) {
                var forgot_otp = $("#otp").val();
                var custotplogin = $("#custotplogin").val();

                $.ajax({
                    url: "forgot-chk1-otp",
                    method: "POST",
                    dataType: "json",
                    data: { forgot_otp: forgot_otp, custotplogin: custotplogin },
                    beforeSend: function() {
                        $('#for-verify-otp').html('Processing...');
                        $("#for-verify-otp").attr("disabled", true);
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.error == true) {
                            Swal.fire({
                                title: "Error!",
                                text: data.msg,
                                icon: "error",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                },
                                buttonsStyling: !1

                            }).then(function() {
                                window.location.reload();
                            });
                            $('#verify-otp').html('OTP Verify');
                            $("#verify-otp").attr("disabled", false);

                        }
                        if (data.error == false) {

                            Swal.fire({
                                position: "Success",
                                icon: "success",
                                title: data.msg,
                                showConfirmButton: !1,
                                timer: 1500,
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                },
                                buttonsStyling: !1
                            }).then(function() {
                                window.location.href = "reset_password";
                            });

                        }
                    }
                });


            }
        });
    });

    $(function() {
        $("#reset-password").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 32,
                    noSpace: true,

                    checklower: true,
                    checkupper: true,
                    checkchar: true,
                    checkdigit: true

                },
                c_password: {
                    required: true,
                    noSpace: true,

                    checklower: true,
                    checkupper: true,
                    checkchar: true,
                    checkdigit: true,
                    equalTo: '#password',
                    minlength: 8,
                    maxlength: 32
                }
            },
            messages: {
                password: {

                    required: 'Password can not be empty.',
                    checklower: "Need atleast One Lowercase Alphabet",
                    checkupper: "Need atleast One Uppercase Alphabet",
                    checkdigit: "Need atleast One Number",
                    checkchar: "Need atleast One Special Character",
                },
                c_password: {
                    required: 'Confirm Password can not be empty',


                    checklower: "Need atleast One Lowercase Alphabet",
                    checkupper: "Need atleast One Uppercase Alphabet",
                    checkdigit: "Need atleast One Number",
                    checkchar: "Need atleast One Special Character",
                }

            },
            submitHandler: function(form) {
                
                var thisupdateemail = $("#thisupdateemail").val();
                var password = $("#password").val();
                var c_password = $("#c_password").val();

                $.ajax({
                    url: "update-password",
                    method: "POST",
                    dataType: "json",
                    data: { thisupdateemail: thisupdateemail, password: password, c_password: c_password },
                    beforeSend: function() {
                        $('#Reset-btn').html('Processing...');
                        $("#Reset-btn").attr("disabled", true);
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.error == true) {
                            $.toast({
                                heading: 'Error',
                                text: data.msg,
                                icon: 'error',
                                loader: true,
                                position: 'top-right',
                                afterHidden: function () {
                                    window.location.reload();
                    
                    
                                   }
                               
                                })
                           
                            $('#verify-otp').html('OTP Verify');
                            $("#verify-otp").attr("disabled", false);

                        }
                        if (data.error == false) {

                            $.toast({
                                heading: 'Success',
                                text: data.msg,
                                icon: 'success',
                                loader: true,
                                position: 'top-right',
                                afterHidden: function () {
                                    window.location.href = "master";
                    
                    
                                   }
                               
                                })

                          

                        }
                    }
                });


            }
        });
    });
})(jQuery);


$(function() {
    $("#reset-userpassword").validate({
        rules: {
            password: {
                required: true,
                minlength: 8,
                maxlength: 32
            },
            c_password: {
                required: true,
                equalTo: '#password',
                minlength: 8,
                maxlength: 32
            }
        },
        messages: {
            password: {
                required: 'Password can not be empty',
            },
            c_password: {
                required: 'Confirm Password can not be empty',
            }

        },
        submitHandler: function(form) {
            var thisupdateemail = $("#thisupdateemail").val();
            var password = $("#password").val();
            var c_password = $("#c_password").val();

            $.ajax({
                url: "update-userpassword",
                method: "POST",
                dataType: "json",
                data: { thisupdateemail: thisupdateemail, password: password, c_password: c_password },
                beforeSend: function() {
                    $('#resetuser-btn').html('Processing...');
                    $("#resetuser-btn").attr("disabled", true);
                },
                success: function(data) {
                    console.log(data);
                    if (data.error == true) {
                        Swal.fire({
                            title: "Error!",
                            text: data.msg,
                            icon: "error",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            },
                            buttonsStyling: !1

                        }).then(function() {
                            window.location.reload();
                        });
                        $('#verify-otp').html('OTP Verify');
                        $("#verify-otp").attr("disabled", false);

                    }
                    if (data.error == false) {
                        Swal.fire({
                            position: "Success",
                            icon: "success",
                            title: data.msg,
                            showConfirmButton: !1,
                            timer: 1500,
                            customClass: {
                                confirmButton: "btn btn-primary"
                            },
                            buttonsStyling: !1
                        }).then(function() {
                            window.location.href = "user";
                        });

                    }

                }
            });


        }
    });
});
(jQuery);


$('.resend-otp').on('click', function(event) {
    event.preventDefault();
    var otptype = $(this).attr("data-id");
    var custotplogin = $('#custotplogin').val();
    $.ajax({
        url: "resend-otp",
        method: "POST",
        data: { custotplogin: custotplogin, otptype: otptype },
        dataType: "json",
        beforeSend: function() {
            $('.resend-otp').html('Processing...');
            $(".resend-otp").prop("disabled", false);
        },
        success: function(data) {
            console.log(data);
            if (data.error == false) {
                $.toast({
                    heading: 'Success',
                    text: data.msg,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.reload();
        
        
                       }
                   
                    })
              
            }else if(data.error == true){
                $.toast({
                    heading: 'Limit exceeded!',
                    text: data.msg,
                    icon: 'error',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.href= "master";
        
        
                       }
                   
                    })
               
            }

        }
    });
});

$('#verify-otp').on('click', function(event) {
    event.preventDefault();
    var otp = $("#otp").val();
    var custotplogin = $("#custotplogin").val();

    $.ajax({
        url: "otp-chk",
        method: "POST",
        dataType: "json",
        data: { otp: otp, custotplogin: custotplogin },
        beforeSend: function() {
            $('#verify-otp').html('Processing...');
            $("#verify-otp").attr("disabled", true);
        },
        success: function(data) {
            console.log(data);
            if (data.error == true) {
                $.toast({
                    heading: 'Error',
                    text: data.msg,
                    icon: 'error',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.reload();
        
        
                       }
                   
                    })
               
                $('#verify-otp').html('OTP Verify');
                $("#verify-otp").attr("disabled", false);

            }
            if (data.error == false) {
                $.toast({
                    heading: 'Success',
                    text: data.msg,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.href = "dashboard";
        
        
                       }
                   
                    })
            }

        }
    });

});

$('#Forgot-Chk-Otp').on('click', function(event) {
    event.preventDefault();
    var otp = $("#otp").val();
    var custotplogin = $("#custotplogin").val();

    $.ajax({
        url: "forgot-chk-otp",
        method: "POST",
        dataType: "json",
        data: { otp: otp, custotplogin: custotplogin },
        beforeSend: function() {
            $('#forgot-chk-otp').html('Processing...');
            $("#forgot-chk-otp").attr("disabled", true);
        },
        success: function(data) {
            console.log(data);
            if (data.error == true) {
                $.toast({
                    heading: 'Error',
                    text: data.msg,
                    icon: 'error',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.reload();
        
        
                       }
                   
                    })
              
                $('#forgot-chk-otp').html('OTP Verify');
                $("#forgot-chk-otp").attr("disabled", false);

            }
            if (data.error == false) {

                $.toast({
                    heading: 'Success',
                    text: data.msg,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.href = "change-password";
                      }
                   
                    })


            }

        }
    });

});

$(document).ready(function () {   
        GetAllProperties();    
});

function GetAllProperties() {    
    var url = $("#call-post-url").val();
    $.ajax({
        cache: false,
        url: url,
        type: "POST",
        dataType: "json",
        success: function (response) {
            var body = document.getElementsByTagName("body")[0];
            console.log();
            var hovercolor = convertHex(response[0].bpcolor,30);
            var hovercolor1 = convertHex(response[0].bpcolor,80);
            body.style.setProperty('--bg-color-primary', response[0].bpcolor);
            body.style.setProperty('--btn-text-color', response[0].bscolor);
            body.style.setProperty('--bg-hover-color-primary', hovercolor);
            // body.style.setProperty('--bg-color-primary', response[0].bscolor);
            // body.style.setProperty('--color-paragraph', response[0].paracolor);
            // body.style.setProperty('--color-title', response[0].tcolor);
            body.classList.add('changed');
            
            
        },
        error: function (r) {
            //alert('Error! Please try again.' + r.responseText);
            console.log(r);    
        }
    });    
} 
      
function convertHex(hexCode, opacity){
    var hex = hexCode.replace('#', '');

    if (hex.length === 3) {
        hex = hex[0] + hex[0] + hex[1] + hex[1] + hex[2] + hex[2];
    }

    var r = parseInt(hex.substring(0,2), 16),
        g = parseInt(hex.substring(2,4), 16),
        b = parseInt(hex.substring(4,6), 16);

    /* Backward compatibility for whole number based opacity values. */
    if (opacity > 1 && opacity <= 100) {
        opacity = opacity / 100;   
    }
    
    return 'rgba('+r+','+g+','+b+','+opacity+')';
}
    