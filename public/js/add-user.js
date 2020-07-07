$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // REGISTRATION FORM VALIDATE
    $('#UserForm').validate({

        rules: {

            name: {
                required: true,
            },

            mno: {
                required: true,
                digits: true,
                maxlength: 10,
                minlength: 10,
            },

            email: {
                required: true,
                email: true,
                checkemail: true,
            },

            birth_date: {
                required: true,
            },
            gender: {
                required: true,
            },
            qualification: {
                required: true,
            },
            salary: {
                required: true,
            },
            address: {
                required: true,
            },

        },

        messages: {

            name: {
                required: 'The name field is required.',
            },
            mno: {
                required: 'The mobile number field is required.',
            },
            email: {
                required: 'The email field is required.',
            },
            birth_date: {
                required: 'The birthdate field is required.',
            },
            gender: {
                required: 'The gender field is required.',
            },
            qualification: {
                required: 'The qualification field is required.',
            },
            salary: {
                required: 'The salary field is required.',
            },
            address: {
                required: 'The address field is required.',
            },

        },
    });

    $.validator.addMethod("checkemail",
        function(value, element) {
            return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
        },
        "Please enter correct email address"
    );

    //ADD USER
    $('#UserForm').submit(function(evt) {

        evt.preventDefault();

        //CHECK FORM IS VALID OR NOT
        if (!$("#UserForm").valid()) {

            return false;
        }

        $("#submitBtn").attr("disabled", true);
        $("#submitBtn").html('Wait....');

        var formData = new FormData(this);

        $.ajax({

            type: 'POST',
            url: App_Base_Url + "/user/register",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {

                if (data.status == 200) {

                    //DISABLE BUTTON CHANGE ITS VALUE
                    $("#submitBtn").attr("disabled", false);
                    $("#submitBtn").html('Submit');
                    $('#message').html(data.message);
                    $('#message').css('color', 'green');
                    setTimeout(function() {
                        window.location.replace(App_Base_Url);
                    }, 2000);

                } else {
                    $('#message').html('Something went wrong');
                    $('#message').css('color', 'red');
                }
            },
            error: function(data) {
                if (data.status === 422) {

                    //REMOVE DISABLE BUTTON CHANGE ITS VALUE
                    $("#submitBtn").attr("disabled", false);
                    $("#submitBtn").html('Submit');

                    $("#UserForm label").each(function() {
                        if ($(this).hasClass('error')) { $(this).remove() }
                    });

                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function(key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function(key, value) {
                                $("[name=" + key + "]").after(`<label class="error">${value}</label>`);
                            });
                        } else {
                            console.log(key + " " + value);
                        }
                    });
                } else {

                    $('#message').html('Something went wrong');
                    $('#message').css('color', 'red');
                }
            },
        });

    });

});