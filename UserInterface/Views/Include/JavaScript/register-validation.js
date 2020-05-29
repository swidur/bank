// Wait for the DOM to be ready
$(function () {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='registration']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            firstName: {
                required: true,
                maxlength: 50
            },
            lastName: {
                required: true,
                maxlength: 50,
            },
            email: {
                email: true,
                required: true,
                maxlength: 255
            },
            confirmEmail: {
                required: true,
                equalTo: '#email',
                maxlength: 255
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 128
            },
            confirmPassword: {
                required: true,
                minlength: 8,
                equalTo: '#password',
                maxlength: 128
            }
        },
        // Specify validation error messages
        messages: {
            firstName: {
                required: "To pole jest wymagane",
                maxlength: "Imię nie może być dłuższe niż 50 znaków"
            },
            lastName: {
                required: "To pole jest wymagane",
                maxlength: "Hasło jest zbyt długie"
            },
            email: {
                required: "To pole jest wymagane",
                email: "Proszę podać prawidłowy adres email",
                maxlength: "Adres email nie może być dłuższy niż 255 znaków"
            },
            confirmEmail: {
                required: "To pole jest wymagane",
                equalTo: "Adresy rożnią się od siebie",
                email: "Proszę podać prawidłowy adres email",
                maxlength: "Adres email nie może być dłuższy niż 255 znaków"
            },
            password: {
                required: "To pole jest wymagane",
                minlength: "Hasło musi mieć minimum 8 znaków",
                maxlength: "Hasło nie może być dłuższe niż 128 znaków"
            },
            confirmPassword: {
                required: "To pole jest wymagane",
                minlength: "Hasło musi mieć minimum 8 znaków",
                equalTo: "Hasła rożnią się od siebie",
                maxlength: "Hasło nie może być dłuższe niż 128 znaków"
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });

});
