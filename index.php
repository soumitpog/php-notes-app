<?php
session_start();
include('connection.php');
// log out
include('logout.php');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styling.css">
    <title>Notes App</title>
</head>

<body>


    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Online Notes App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="#modalLoginForm" class="nav-link" data-toggle="modal">Login</a></li>
            </ul>
        </div>
    </nav>

    <!-- our jumbotron -->
    <div class="jumbotron" id="myContainer">
        <h1 class="signup-heading">online notes app</h1>
        <button type="button" class="btn btn-success btn-lg" data-target="#modalSignupForm" data-toggle="modal">Sign-up
            It's Free</button>
    </div>

    <!-- signup form -->
    <form action="" method="post" id="signup-form">
        <div class="modal" id="modalSignupForm" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- modal header -->
                    <div class="modal-header">
                        <h4 class="modal-title w-100 font-weight-bold">Sign up today</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- will gonna show the error message if cannot create a user -->
                        <div id="signup-message"></div>

                        <!-- modal form inputs -->
                        <div class="md-form mb-2">
                            <label for="username" class="sr-only">Username:</label>
                            <input class="form-control" type="text" name="username" id="username" placeholder="username"
                                maxlength="30">
                        </div>
                        <div class="md-form">
                            <label for="password" class="sr-only">Password:</label>
                            <input type="password" id="password" name="password" class="form-control validate"
                                placeholder="choose a password" maxlength="30">
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-success" name="signup" type="submit">Sign-up</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!-- login form -->
    <form action="" method="post" id="login-form">
        <div class="modal" id="modalLoginForm" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- modal header -->
                    <div class="modal-header">
                        <h4 class="modal-title w-100 font-weight-bold">Log in</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- will gonna show the error message if cannot create a user -->
                        <div id="login-message"></div>

                        <!-- modal form inputs -->
                        <div class="md-form mb-2">
                            <label for="loginusername" class="sr-only">Username:</label>
                            <input class="form-control" type="text" name="loginusername" id="loginusername"
                                placeholder="username" maxlength="30">
                        </div>
                        <div class="md-form">
                            <label for="loginpassword" class="sr-only">Password:</label>
                            <input type="password" id="loginpassword" name="loginpassword" class="form-control validate"
                                placeholder="choose a password" maxlength="30">
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-success" name="login" type="submit">Log-in</button>
                    </div>
                </div>
            </div>
        </div>
    </form>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <!-- // jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="index.js"></script>
</body>

</html>