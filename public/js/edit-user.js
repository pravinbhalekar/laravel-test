$(document).ready(function() {

    $('#UserTable').dataTable({
        'order': []
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //EDIT USER

    $('.editUser').click(function(e) {

        var UserId = $(this).data('id');

        $("#EditUserForm label").each(function() {
            if ($(this).hasClass('error')) { $(this).remove() }
        });

        $.ajax({

            type: 'POST',
            url: App_Base_Url + "/user/show",
            data: { 'UserId': UserId },
            success: function(data) {

                $('.modal-title').html(data.name);
                $('#userid').val(data.id);
                $('#name').val(data.name);
                $('#mno').val(data.mno);
                $('#email').val(data.email);
                $('#birth_date').val(data.userdetails['birth_date']);
                $('#gender').val(data.userdetails['gender']);
                $('#qualification').val(data.userdetails['qualification']);
                $('#salary').val(data.userdetails['salary']);
                $('#address').val(data.userdetails['address']);
                $('#EditUserModel').modal('show');
            },
        });
    });

    //SHOW DELETE USER POPUP
    $('.deleteUser').click(function(e) {
        $('.modal-title').html($(this).data('name'));
        $('#user_id').val($(this).data('id'));
        $('#DeleteUserModel').modal('show');
    });

    $('#DeleteUser').submit(function(evt) {
        evt.preventDefault();
        $("#deleteBtn").attr("disabled", true);
        $("#deleteBtn").html('Wait...');
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: App_Base_Url + "/user/delete",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {

                if (data.status == 200) {

                    //DISABLE BUTTON CHANGE ITS VALUE
                    $("#deleteBtn").attr("disabled", false);
                    $("#deleteBtn").html('Yes');
                    $('#deletemessage').html(data.message);
                    $('#deletemessage').css('color', 'green');

                    setTimeout(function() {
                        $('#DeleteUserModel').modal('hide');
                    }, 2000);

                    setTimeout(function() {
                        location.reload();
                    }, 1000);

                } else {
                    $('#deletemessage').html('Something went wrong');
                    $('#deletemessage').css('color', 'red');
                }
            },
        });
    });

    // UPDATE FORM VALIDATE
    $('#EditUserForm').validate({

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
    $('#EditUserForm').submit(function(evt) {

        evt.preventDefault();

        //CHECK FORM IS VALID OR NOT
        if (!$("#EditUserForm").valid()) {

            return false;
        }

        // $("#submitBtn").attr("disabled", true);
        // $("#submitBtn").html('Wait....');

        var formData = new FormData(this);

        $.ajax({

            type: 'POST',
            url: App_Base_Url + "/user/update",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {

                console.log(data);

                if (data.status == 200) {

                    //DISABLE BUTTON CHANGE ITS VALUE
                    $("#submitBtn").attr("disabled", false);
                    $("#submitBtn").html('Submit');
                    $('#message').html(data.message);
                    $('#message').css('color', 'green');

                    setTimeout(function() {
                        $('#EditUserModel').modal('hide');
                    }, 1000);

                    setTimeout(function() {
                        location.reload();
                    }, 1000);

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

                    $("#EditUserForm label").each(function() {
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