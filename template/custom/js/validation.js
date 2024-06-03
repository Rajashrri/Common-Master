/**
 * @author Kishor Mali
 */


$(document).ready(function () {


    jQuery.validator.addMethod("pwcheck", function (value, element) {
        return /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%&*])[a-zA-Z0-9!@#$%&*]+$/.test(value) // consists of only these
            && /[a-z]/.test(value) // has a lowercase letter
            && /[A-Z]/.test(value) // has a uppercase letter
            && /\d/.test(value) // has a digit
            && /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/.test(value) // has a digit
    }, "Password consist of upper case,lower case and a digit!");

    jQuery.validator.addMethod("notEqualTo", function (value, element) {
        if (value == $('#mobile1').val() && $('#mobile1').val() != "") {
            return false;
        }
        else {
            return true;
        }
    });

    jQuery.validator.addMethod("lessThanBrothers", function (value, element) {
        if (value <= $('#no_of_brothers').val()) {
            return true;
        }
        else {
            return false;
        }
    }, "");

    jQuery.validator.addMethod("lessThanSisters", function (value, element) {
        if (value <= $('#no_of_sisters').val()) {
            return true;
        }
        else {
            return false;
        }
    }, "");

    jQuery.validator.addMethod("selected", function (value, element) {
        if (value == 0) { return false; }
        else { return true; }
    }, "This field is required.");


    jQuery.validator.addMethod("greaterThan0", function (value, element) {
        var value = parseFloat(value);
        var smaller = parseFloat($("#part_anual_income_from").val());

        if (value < smaller) { return false; }
        else { return true; }
    }, "To Salary is must greater than from.");


    jQuery.validator.addMethod("acceptImgExtension", function (value, element) {
        if (value == "") {
            return true;
        }
        else {
            var extension = (value.substring(value.lastIndexOf('.') + 1)).toLowerCase();

            if (extension == 'jpg' || extension == 'png' || extension == "jpeg" || extension == "gif") { return true; }
            else { return false; }
        }


    }, "");


    jQuery.validator.addMethod("acceptDocExtension", function (value, element) {
        if (value == "") {
            return true;
        }
        else {
            var extension = (value.substring(value.lastIndexOf('.') + 1)).toLowerCase();

            if (extension == 'jpg' || extension == 'png' || extension == "jpeg" || extension == "gif") { return true; }
            else { return false; }
        }
    }, "");


    jQuery.validator.addMethod("checkUsername", function (value, element) {
        var response;
        var post_url_check_username = baseurl + "user/checkUsernameExist/";

        $.ajax({
            type: "POST",
            url: post_url_check_username,
            data: { username: value },
            dataType: "json",
            async: false
        }).done(function (result) {
            //alert(result.status);
            if (result.status == true) {
                response = false;
            } else {
                response = true;
            }
        });
        return response;
    }, "Username already taken.");


    jQuery.validator.addMethod("checkEmailExist", function (value, element) {
        var response = false;

        var post_url_check_email = baseurl + "user/checkEmailExist/";

        $.ajax({
            type: "POST",
            url: post_url_check_email,
            data: { email: value },
            dataType: "json",
            async: false
        }).done(function (result) {
            if (result.status == true) {
                response = false;
            } else {
                response = true;
            }
        });
        return response;
    }, "Email already taken.");


    jQuery.validator.addMethod("checkMobileExist", function (value, element) {
        var response = false;

        var post_url_check_mobile = baseurl + "user/checkMobileExist/";

        $.ajax({
            type: "POST",
            url: post_url_check_mobile,
            data: { mob: value },
            dataType: "json",
            async: false
        }).done(function (result) {
            if (result.status == true) {
                response = false;
            } else {
                response = true;
            }
        });
        return response;
    }, "Mobile number already registered.");

    jQuery.validator.addMethod("checkMobileExist2", function (value, element) {
        var response = false;

        var post_url_check_mobile2 = baseurl + "user/checkMobileExist2/";

        if (value == "") {
            response = true;
        }
        else {
            $.ajax({
                type: "POST",
                url: post_url_check_mobile2,
                data: { mob: value },
                dataType: "json",
                async: false
            }).done(function (result) {
                if (result.status == true) {
                    response = false;
                } else {
                    response = true;
                }
            });
        }
        return response;
    }, "Mobile number already registered.");


    jQuery.validator.addMethod("checkPhoneExist", function (value, element) {
        var response = false;

        var post_url_check_phone = baseurl + "user/checkPhoneExist/";

        if (value == "") {
            response = true;
        }
        else {
            $.ajax({
                type: "POST",
                url: post_url_check_phone,
                data: { mob: value },
                dataType: "json",
                async: false
            }).done(function (result) {
                if (result.status == true) {
                    response = false;
                } else {
                    response = true;
                }
            });
        }
        return response;
    }, "Phone number already registered.");


    jQuery.validator.addMethod('checkMobileExist1Same', function (value, element) {
        var response = false;

        var post_url_check_phone = baseurl + "profile/checkMobileExist1Same/";

        if (value == "") {
            response = true;
        }
        else {
            $.ajax({
                type: "POST",
                url: post_url_check_phone,
                data: { mob: value },
                dataType: "json",
                async: false
            }).done(function (result) {
                if (result.status == true) {
                    response = false;
                } else {
                    response = true;
                }
            });
        }
        return response;
    }, "Mobile number already registered.");


    jQuery.validator.addMethod('checkMobileExist2Same', function (value, element) {
        var response = false;

        var post_url_check_mobile2 = baseurl + "profile/checkMobileExist2Same/";

        if (value == "") {
            response = true;
        }
        else {
            $.ajax({
                type: "POST",
                url: post_url_check_mobile2,
                data: { mob: value },
                dataType: "json",
                async: false
            }).done(function (result) {
                if (result.status == true) {
                    response = false;
                } else {
                    response = true;
                }
            });
        }
        return response;
    }, "Mobile number already registered.");


    jQuery.validator.addMethod('checkPhoneExistSame', function (value, element) {
        var response = false;

        var post_url_check_mobile2 = baseurl + "profile/checkPhoneExistSame/";

        if (value == "") {
            response = true;
        }
        else {
            $.ajax({
                type: "POST",
                url: post_url_check_mobile2,
                data: { mob: value },
                dataType: "json",
                async: false
            }).done(function (result) {
                if (result.status == true) {
                    response = false;
                } else {
                    response = true;
                }
            });
        }
        return response;
    }, "Phone number already registered.");



    jQuery.validator.addMethod('checkDateFormat', function (value, element) {

        var stringPattern = /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/gm;

        if (stringPattern.test(value)) {
            return true;
        }
        else {
            return false;
        }
    }, "Please enter correct date.");


    jQuery.validator.addMethod('checkWhiteSpaces', function (value, element) {

        var stringPattern = /\s/;

        if (stringPattern.test(value)) {
            return false;
        }
        else {
            return true;
        }
    }, "Spaces are not allowed in username.");


    jQuery.validator.addMethod('checkDateDifference', function (value, element) {

        var birthYear = parseInt(value.substring(value.lastIndexOf('/') + 1)),
            dateNow = new Date(),
            dateDiff = dateNow.getFullYear() - birthYear;

        if (dateDiff < 17) {
            return false;
        }
        else {
            return true;
        }
    }, "Please enter less than 18 years of current date.");


    /* Make checkboxes work like radio buttons - Start 
    
    $('.radio_eating').click(function() {
        selectedBox = this.id;

        $('.radio_eating').each(function() {
            if ( this.id == selectedBox )
            {
                this.checked = true;
            }
            else
            {
                this.checked = false;
            };        
        });
    });
    
    $('.radio_drinking').click(function() {
        selectedBox = this.id;

        $('.radio_drinking').each(function() {
            if ( this.id == selectedBox )
            {
                this.checked = true;
            }
            else
            {
                this.checked = false;
            };        
        });
    });
    
    $('.radio_smoking').click(function() {
        selectedBox = this.id;

        $('.radio_smoking').each(function() {
            if ( this.id == selectedBox )
            {
                this.checked = true;
            }
            else
            {
                this.checked = false;
            };        
        });
    });
    */


    /* Physical Disability Textbox enable disable - Start */

    $('#physical_status').prop('disabled', true);

    $('#chk_physical_status').click(function () {
        if ($('#chk_physical_status').prop('checked') == false) {
            $('#physical_status').prop('disabled', true);
        }
        else {
            $('#physical_status').prop('disabled', false);
        }
    });


    /* Physical Disability Textbox enable disable - End */


    jQuery.validator.addMethod("checkEmailExistFranchise", function (value, element) {
        var response = false;

        var post_url_check_email_franchise = baseurl + "franchise/franchise/checkEmailExist/";

        $.ajax({
            type: "POST",
            url: post_url_check_email_franchise,
            data: { email: value },
            dataType: "json",
            async: false
        }).done(function (result) {
            if (result.status == true) {
                response = false;
            } else {
                response = true;
            }
        });
        return response;
    }, "Email already taken.");


    jQuery.validator.addMethod("ckrequired", function (value, element) {
        var idname = $(element).attr('id');
        var editor = CKEDITOR.instances[idname];
        var ckValue = GetTextFromHtml(editor.getData()).replace(/<[^>]*>/gi, '').trim();
        if (ckValue.length == 0) {
            //if empty or trimmed value then remove extra spacing to current control  
            $(element).val(ckValue);
        } else {
            //If not empty then leave the value as it is  
            $(element).val(editor.getData());
        }
        return $(element).val().length > 0;
    }, "This field can not be empty");



    function GetTextFromHtml(html) {

        var dv = document.createElement("DIV");
        dv.innerHTML = html;
        return dv.textContent || dv.innerText || "";
    }

    $.validator.addMethod("noSpace", function (value, element) {
        return value == '' || value.trim().length != 0;
    }, "No space please and don't leave it empty");

    // $.validator.addMethod("greaterThan",
    //     function (value, element, params) {

    //         if (!/Invalid|NaN/.test(new Date(value))) {
    //             return new Date(value) > new Date($(params).val());
    //         }

    //         return isNaN(value) && isNaN($(params).val())
    //             || (Number(value) > Number($(params).val()));
    //     }, 'Must be greater than {0}.');
    $.validator.addMethod("greaterThan",
        function (value, element, params) {
            var value = value.split("-").reverse().join("-"); 
            
            if (!/Invalid|NaN/.test(new Date(value))) {
                return new Date(value) > new Date();
            }

            return isNaN(value) && isNaN()
                || (Number(value) > Number());
        }, 'Must be greater than {0}.');
});
function checkEditorText(id) {
    var e = CKEDITOR.instances[id]
    $('#' + id).val(e.getData().replace(/<[^>]*>|\s/g, '').length);
    if (parseInt($('#' + id).val()) > 0) {
        $('#' + id + '-error').remove();

    } else {
        console.log(id);
        $('#' + id).rules("add", {
            ckrequired: true,
            messages: {
                ckrequired: "Please Enter Detail",
            }
        });
    }
}

setTimeout(function () {
    $('.alert').fadeOut('slow');
}, 500);

///////////////////////For validate text input without number and spacial character
function fn_validateNumeric(thi, e) {
    if (window.event) keycode = window.event.keyCode;
    else if (e) keycode = e.which;
    else return true;
    if (((keycode >= 65) && (keycode <= 90)) || ((keycode >= 97) && (keycode <= 122))) {
        return true;
    }
    else {
        return false;
    }
}
// $('.single-select').select2();
// $('.multiple-select').select2({
//     placeholder: "-- Select-- "
//   });


/* jQuery.validator.addMethod("greaterThanDate",
    function (value, element, params) {

        if (!/Invalid|NaN/.test(new Date(value))) {
            return new Date(value) > new Date($(params).val());
        }

        return isNaN(value) && isNaN($(params).val())
            || (Number(value) > Number($(params).val()));
    }, 'Must be greater than {0}.');

function validateYouTubeUrl(url) {
    var url = $('#youTubeUrl').val();

} */

$.validator.addMethod("checkVemieoUrl", function (url, element) {

    if (url != undefined || url != '') {
        ///var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
        var regExp = /^.*(vimeo.com\/|v\/|u\/\w\/|embed\/|\?v=)([^#\&\?]*).*/;
        //var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
       ///https://vimeo.com/741193833
        var match = url.match(regExp);
     
         if (match && match.length >=3 && match[2].length >=9) {
                // Do anything for being valid
                // if need to change the url to embed url then use below line            
                // $('#videoObject').attr('src', 'https://www.youtube.com/embed/' + match[2] + '?autoplay=1&enablejsapi=1');
                return url
            }
      
    }
}, "Please Use Valid Url");
$.validator.addMethod("checkYoutubeUrl", function (url, element) {

    if (url != undefined || url != '') {
        var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
       // var regExp = /^.*(vimeo.com\/|v\/|u\/\w\/|embed\/|\?v=)([^#\&\?]*).*/;
        //var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
       ///https://vimeo.com/741193833
        var match = url.match(regExp);
       
        if (match && match[2].length == 11) {
                // Do anything for being valid
                // if need to change the url to embed url then use below line            
                // $('#videoObject').attr('src', 'https://www.youtube.com/embed/' + match[2] + '?autoplay=1&enablejsapi=1');
                return url
        }
      
    }
}, "Please Use Valid Url");



