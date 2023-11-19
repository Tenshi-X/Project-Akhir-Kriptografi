<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS_files/login-form.css">
    <script src="JS_files/login-form.js"></script>
</head>

<body style="background-image:url('Images/background.jpg');background-size: cover;">
    <form action="login_process.php" method="post">
        <div class="container">
            <div class="container form bg-white pt-5 mt-4 mb-3">
                <!--change after click on sign up-->
                <p class="text-center login-heading hide-me">login</p>
                <div class="container hide-me">
                    <div class="row">
                        <div class="col mt-4 pl-5 pr-5">
                            <p class="username">username</p>
                            <div class="row mt-4">
                                <div class="col-2 text-center pt-1 pr-0">
                                    <i class="fa fa-user-o" aria-hidden="true" id="user"></i>
                                </div>
                                <div class="col-10 pl-0">
                                    <input type="text" placeholder="Type your username" class='input-1' name="username">
                                </div>
                            </div>
                            <hr class="hr-1">
                            <div class="hide"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-4 pl-5 pr-5">
                            <p class="username">Password</p>
                            <div class="row mt-4">
                                <div class="col-2 text-center pt-1 pr-0">
                                    <i class="fa fa-lock" aria-hidden="true" id="lock"></i>
                                </div>
                                <div class="col-10 pl-0">
                                    <input type="password" placeholder="Type your password" class="input-2" name="password">
                                </div>
                            </div>
                            <hr class="hr-2">
                            <div class="hide-1"></div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col pl-5 pr-5">
                            <span>
                                <button type="submit" class="btn btn-block text-white login-button">
                                    login
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center pt-3">
                            <a href="register-form.php"><span class="login-page">Sign up</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>

</html>