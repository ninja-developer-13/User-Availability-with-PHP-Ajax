$("#loading").hide();
// When the browser is ready...
$(document).ready(function () {
    // Setup form validation on the #signup element
    $("#submit_form").validate({
        // Specify the validation rules
        rules: {
            username: {
                required: true,
            },
        },

        // Specify the validation error messages
        messages: {
            username: {
                required: "Please enter username",
            },
        },

        submitHandler: function (form) {
            $("#loading").show();
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "check_username.php",
                data: $("#submit_form").serialize(),
                success: function (json_data) {
                    var msg = json_data.msg;
                    var flag = json_data.flag;
                    if (flag == 1) {
                        $("#loading").hide();
                        $("#message").html(msg).show();
                        $("#submit_form").trigger("reset");
                    } else {
                        $("#message").html(msg).show();
                        $("#submit_form").trigger("reset");
                    }
                },
            });
        },
    });
});
