$(function() {
    $(".loginForm").validate({
        rules: {
            username: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
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

