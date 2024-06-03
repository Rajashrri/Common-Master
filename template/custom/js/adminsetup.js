$(document).ready(function() {
    "use strict";
 
    //var value = $("#password").val();
 
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
 $.validator.addMethod("checkname", function(value) {
    return /[a-zA-Z]/.test(value);
});
 jQuery.validator.addMethod("noSpace", function(value, element) {
     return value.indexOf(" ") < 0 && value != "";
 }, "No space please and don't leave it empty");
 
 
 
 $(function() {
 $("#loginsetup-form").validate({
  ignore: [],
  rules: {
     username: {
        required: true,
        checkname:true,
        
 
      },
      email: {
          required: true,
         email:true,
      },
      compemail: {
          required: true,
          email:true,
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
      },
      contact:{
          required: true,
          minlength:10,
           maxlength:10,
             number: true  
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
                 
                compemail: {
                    required: 'Email  can not be empty.',
                },
                email: {
                    required: 'Email  can not be empty.',
                },
                username: {
                    required: "Please Enter company name.",
                    checkname: "Enter Alphabet only ",
                   
                },
                
            
             },
             submitHandler: function(form) {
                console.log(form);
                var username = $("#username").val();
                var email = $("#email").val();
                var token = $("#token").val();
                var password = $("#password").val();
                var compname= $("#compemail").val();
                var contact= $("#contact").val();

                $.ajax({
                    url: "loginsetup",
                    method: "POST",
                    dataType: "json",
                    data: { username: username, password: password, token:token, email: email, password:password, compname:compname, contact:contact},
                    beforeSend: function() {
                        $('#login-setup-btn').html('Processing');
                        $("#login-setup-btn").attr("disabled", true);
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
                           
                            $('#login-setup-btn').html('Submit');
                            $("#login-setup-btn").attr("disabled", false);

                        }
                        if (data.error == false) {
                            $.toast({
                                heading: 'Success',
                                text: data.msg,
                                icon: 'success',
                                loader: true,
                                position: 'top-right',
                                afterHidden: function () {
                                    
                                   $('#webset').addClass('active');
                                   $('#form-tabs-webset').addClass('active show');
                                   $("#loginsetup-form")[0].reset();
                                   $('#login-setup-btn').html('Submit');
                                   $("#login-setup-btn").attr("disabled", false);
                                   $('#accdet').removeClass('active');
                                   $('#form-tabs-account').removeClass('active show');
                                   }
                               
                                })
                             }
                    }
                });


            }
 });
 
 });
 $("#loginsetup-update-form").validate({
    ignore: [],
    rules: {
       username: {
          required: true,
          checkname:true,
          
   
        },
        email: {
            required: true,
           email:true,
        },
        compemail: {
            required: true,
            email:true,
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
        },
        contact:{
            required: true,
            minlength:10,
             maxlength:10,
               number: true  
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
                   
                  compemail: {
                      required: 'Email  can not be empty.',
                  },
                  email: {
                      required: 'Email  can not be empty.',
                  },
                  username: {
                      required: "Please Enter company name.",
                      checkname: "Enter Alphabet only ",
                     
                  },
                  
              
               },
               submitHandler: function(form) {
                  console.log(form);
                  var username = $("#username").val();
                  var email = $("#email").val();
                  var token = $("#token").val();
                  var password = $("#password").val();
                  var compname= $("#compemail").val();
                  var contact= $("#contact").val();
  
                  $.ajax({
                      url: "loginsetup-update",
                      method: "POST",
                      dataType: "json",
                      data: { username: username, password: password, token:token, email: email, password:password, compname:compname, contact:contact},
                      beforeSend: function() {
                          $('#login-setup-btn').html('Processing');
                          $("#login-setup-btn").attr("disabled", true);
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
                             
                              $('#login-setup-update-btn').html('Submit');
                              $("#login-setup-update-btn").attr("disabled", false);
  
                          }
                          if (data.error == false) {
                              $.toast({
                                  heading: 'Success',
                                  text: data.msg,
                                  icon: 'success',
                                  loader: true,
                                  position: 'top-right',
                                  afterHidden: function () {
                                      
                                     $('#webset').addClass('active');
                                     $('#form-tabs-webset').addClass('active show');
                                     $("#loginsetup-update-form")[0].reset();
                                     $('#login-setup-update-btn').html('Submit');
                                     $("#login-setup-update-btn").attr("disabled", false);
                                     $('#accdet').removeClass('active');
                                     $('#form-tabs-account').removeClass('active show');
                                     }
                                 
                                  })
                               }
                      }
                  });
  
  
              }
   });
   
  
});

$('#webset-form').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "webset-form",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#web-setup-btn').html('Processing...');
            $("#web-setup-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                 $('#web-setup-btn').html('Submit');
                 $("#web-setup-btn").attr("disabled", false);
             }
            if (data.success) {
                $.toast({
                    heading: 'Success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        $('#pri').addClass('active');
                        $('#form-tabs-privilege').addClass('active show');
                        $("#webset-form")[0].reset();
                        $('#web-setup-btn').html('Submit');
                        $("#web-setup-btn").attr("disabled", false);
                        $('#webset').removeClass('active');
                        $('#form-tabs-webset').removeClass('active show');


                    }

                })
             }
             if (data.error) {
                $.toast({
                    heading: 'Warning',
                    text: data.error,
                    icon: 'warning',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                       $('#pri').addClass('active');
                        $('#form-tabs-privilege').addClass('active show');
                        $("#webset-form")[0].reset();
                        $('#web-setup-btn').html('Submit');
                        $("#web-setup-btn").attr("disabled", false);
                        $('#webset').removeClass('active');
                        $('#form-tabs-webset').removeClass('active show');


                    }

                })
             }
        }
    });
});

$('#webset-update-form').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "webset-update-form",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#web-setup-update-btn').html('Processing...');
            $("#web-setup-update-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                 $('#web-setup-update-btn').html('Submit');
                 $("#web-setup-update-btn").attr("disabled", false);
             }
            if (data.success) {
                $.toast({
                    heading: 'Success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        $('#pri').addClass('active');
                        $('#form-tabs-privilege').addClass('active show');
                        $("#webset-update-form")[0].reset();
                        $('#web-setup-update-btn').html('Submit');
                        $("#web-setup-update-btn").attr("disabled", false);
                        $('#webset').removeClass('active');
                        $('#form-tabs-webset').removeClass('active show');


                    }

                })
                
             }
                if (data.error) {
                $.toast({
                    heading: 'Warning',
                    text: data.error,
                    icon: 'warning',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                       $('#pri').addClass('active');
                        $('#form-tabs-privilege').addClass('active show');
                        $("#webset-form")[0].reset();
                        $('#web-setup-btn').html('Submit');
                        $("#web-setup-btn").attr("disabled", false);
                        $('#webset').removeClass('active');
                        $('#form-tabs-webset').removeClass('active show');


                    }

                })
             }
        }
    });
});

$('#websitesetting-form').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "websitesetting-form",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#social-setup-btn').html('Processing...');
            $("#social-setup-btn").attr("disabled", true);
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
                        $('#pri').addClass('active');
                        $('#form-tabs-privilege').addClass('active show');
                        $("#websitesetting-form")[0].reset();
                        $('#social-setup-btn').html('Submit');
                        $("#social-setup-btn").attr("disabled", false);
                        $('#sclinks').removeClass('active');
                        $('#form-tabs-social').removeClass('active show');


                    }

                })
                 $('#social-setup-btn').html('Submit');
                 $("#social-setup-btn").attr("disabled", false);
             }
            if (data.success) {
                $.toast({
                    heading: 'Success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        $('#pri').addClass('active');
                        $('#form-tabs-privilege').addClass('active show');
                        $("#websitesetting-form")[0].reset();
                        $('#social-setup-btn').html('Submit');
                        $("#social-setup-btn").attr("disabled", false);
                        $('#sclinks').removeClass('active');
                        $('#form-tabs-social').removeClass('active show');


                    }

                })
             }
        }
    });
});

$('#websitesetting-update-form').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "websitesetting-update-form",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#social-setup-update-btn').html('Processing...');
            $("#social-setup-update-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                 $('#social-setup-update-btn').html('Submit');
                 $("#social-setup-update-btn").attr("disabled", false);
             }
            if (data.success) {
                $.toast({
                    heading: 'Success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        $('#pri').addClass('active');
                        $('#form-tabs-privilege').addClass('active show');
                        $("#websitesetting-update-form")[0].reset();
                        $('#social-setup-update-btn').html('Submit');
                        $("#social-setup-update-btn").attr("disabled", false);
                        $('#sclinks').removeClass('active');
                        $('#form-tabs-social').removeClass('active show');


                    }

                })
             }
        }
    });
});


$('#privilege-setup').on('submit', function(event) {
    var checked = $("#privilege-setup input:checked").length > 0;
    if (!checked){
        $.toast({
            heading: 'warning',
            text: 'Select atleast one Module ',
            icon: 'warning',
            loader: true,
            position: 'top-right',
             })
        return false;
    }
    event.preventDefault();
    $.ajax({
        url: "privilege-setup",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
       processData: false,
        beforeSend: function() {
            $('#privilege-setup-btn').html('Processing...');
            $("#privilege-setup-btn").attr("disabled", true);
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
                       
                        window.location.href="master";
        
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
    });
});

$('#privilege-setup-update').on('submit', function(event) {
    var checked = $("#privilege-setup-update input:checked").length > 0;
    if (!checked){
        $.toast({
            heading: 'warning',
            text: 'Select atleast one Module ',
            icon: 'warning',
            loader: true,
            position: 'top-right',
             })
        return false;
    }
    event.preventDefault();
    $.ajax({
        url: "privilege-setup-update",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
       processData: false,
        beforeSend: function() {
            $('#privilege-setup-update-btn').html('Processing...');
            $("#privilege-setup-update-btn").attr("disabled", true);
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
                       
                        window.location.href="master";
        
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
    });
});



 function preview() {
   thumb.src=URL.createObjectURL(event.target.files[0]);
   $("#thumb").addClass("preview-logo");
}
 function preview1() {
   thumb1.src=URL.createObjectURL(event.target.files[0]);
   $("#thumb1").addClass("preview-fav");
}
$('#can').click(function(){
     thumb.src='';
      thumb1.src='';
})

$(document).on('click', '.status-pri', function () {

    var id  =  $(this).attr("data-subid");
  
    var val = $(this).attr("data-id");
    var name = $(this).attr("data-name");
    var napage = $(this).attr("data-napage");



  
                $.ajax({
                    url: "../status-pri",
                    type: "POST",
                    dataType: "json",
                    data: {'val': val, 'name': name, 'id':id, 'napage':napage,},


                    success: function (data) {
                        if (data.success) {
//                            $.toast({
//                                heading: 'Success',
//                                text: data.success,
//                                icon: 'success',
//                                loader: true,
//                                position: 'top-right',
//                                afterHidden: function () {
//                                    window.location.reload();
//
//                                }
//
//                            })
                        }
                    }
              
    })


});

$(document).on('click', '.status-prim', function () {

    var id  =  $(this).attr("data-id");
  
    var val = $(this).attr("data-val");
    var name = $(this).attr("data-name");



  
                $.ajax({
                    url: "../status-prim",
                    type: "POST",
                    dataType: "json",
                    data: {'val': val, 'name': name, 'id':id},
                    success: function (data) {
                        if (data.success) {
//                            $.toast({
//                                heading: 'Success',
//                                text: data.success,
//                                icon: 'success',
//                                loader: true,
//                                position: 'top-right',
//                                afterHidden: function () {
//                                    window.location.reload();
//
//                                }
//
//                            })
                        }
                    }
              
    })


});
$(document).on('click', '.status-priall', function () {

    var id  =  $(this).attr("data-id");
  
    var val = $(this).attr("data-val");
    



  
                $.ajax({
                    url: "../status-priall",
                    type: "POST",
                    dataType: "json",
                    data: {'val': val, 'id':id},
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


$('.privilege').on('submit', function(event) {
   
    event.preventDefault();
    $.ajax({
        url: "../add-privilege",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
       processData: false,
        beforeSend: function() {
            $('#privilege-update_new').html('Processing...');
            $("#privilege-update_new").attr("disabled", true);
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
    });
});