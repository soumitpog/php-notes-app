// sign-up process
$("#signup-form").submit(function (e) {
    // prevent default
    e.preventDefault();
    var datatopost = $(this).serializeArray();
    // send them to signup.php
    $.ajax({
        url: "signup.php",
        type: "POST",
        data: datatopost,
        success: function (data) {
            if (data) {
                $("#signup-message").html(data);
            }
        },
        error: function () {
            $("#signup-message").html("<div class='alert alert-danger'>There was an error</div>");
        }
    });
});

// log-in process
$("#login-form").submit(function (e) {
    // prevent default
    e.preventDefault();
    var datatopost = $(this).serializeArray();
    // send them to signup.php
    $.ajax({
        url: "login.php",
        type: "POST",
        data: datatopost,
        success: function (data) {
            if (data == 'success') {
                window.location = "mainpageloggedin.php";
            } else {
                $("#login-message").html(data);
            }
        },
        error: function () {
            $("#signup-message").html("<div class='alert alert-danger'>There was an error</div>");
        }
    });
});