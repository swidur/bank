// Wait for the DOM to be ready
$(function () {
    // Initialize form validation on the registration form.
    $("form[name='forgotPassword']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            email: {
                email: true,
                required: true,
                maxlength: 255
            }
        },
        // Specify validation error messages
        messages: {
            email: {
                email: "Proszę podać prawidłowy adres email",
                required: "To pole jest wymagane",
                maxlength: "Adres email nie może być dłuższy niż 255 znaków"
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });

});
