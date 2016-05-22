$(function() {
    $(".registerForm").validate({
        rules: {
            username: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            },
            passwordConfirm: {
                required: true,
                minlength: 6,
                equalTo: '#password'
            }
        },

        messages: {
            username: {
                required: 'Required',
                email: 'Invalid email'
            },
            password: {
                required: 'Required',
                minlength: 'Minimum length 6'
            },
            passwordConfirm: {
                required: 'Required',
                minlength: 'Minimum length 6',
                equalTo: 'Does not match'
            }

        },
        highlight: function (element) {
            $(element).addClass('error-border');
        },
        unhighlight: function (element) {
            $(element).removeClass('error-border');
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parents('.form-group').find('div.error.inline'));
        },
        errorElement: 'span',
        errorClass: 'text-danger'
    });
});