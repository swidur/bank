// Wait for the DOM to be ready
$(function () {
    // Initialize form validation on the registration form.
    $("form[name='login']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            email: {
                required: true
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 128
            }
        },
        // Specify validation error messages
        messages: {
            email: "Proszę podać prawidłowy adres email",
            password: {
                required: "Proszę podać hasło",
                minlength: "Hasło musi mieć minimum 8 znaków"
            }

        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });

});
