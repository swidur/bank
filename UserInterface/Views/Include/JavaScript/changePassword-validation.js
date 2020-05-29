// Wait for the DOM to be ready
$(function () {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='login']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
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
