<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="<?php echo $base; ?>assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .d-none {
            display: none;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="<?php echo $base; ?>assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="" method="POST">
            <img class="mb-4" src="<?php echo $base; ?>assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <div id="formlogin">
                <h1 class="h3 mb-3 fw-normal">Please Login</h1>

                <div class="form-floating">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <button class="w-100 btn btn-lg btn-primary" id="login" type="submit">Login</button>
                    </div>
                    <div class="col-sm-6">
                        <button class="w-100 btn btn-lg btn-success" id="register" type="button">Register</button>
                    </div>
                </div>
            </div>
            <div id="formregister" class="d-none">
                <h1 class="h3 mb-3 fw-normal">Please Register</h1>

                <div class="form-floating">
                    <input type="text" class="form-control" id="user" name="user" placeholder="user">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                    <label for="floatingInput">Nama</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <button class="w-100 btn btn-lg btn-success" id="registerpost" type="submit">Register</button>
                    </div>
                    <div class="col-sm-6">
                        <button class="w-100 btn btn-lg btn-warning" id="cancel" type="button">Cancel</button>
                    </div>
                </div>
            </div>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
        </form>

    </main>


    <script src="<?php echo $base; ?>assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript">
        var url_post;
        var url_postregister;
        url_post = '<?php echo $base; ?>index.php/login/validationlogin';
        url_postregister = '<?php echo $base; ?>index.php/login/register'; //setting url post, variable di dapat dari controller  

        $(document).ready(function() {
            $('#login').click(
                function() {
                    $.ajax({
                        type: "POST", //type ajax adalah post
                        url: url_post, // ketik di klik, akan mengirim data ke url postnya
                        dataType: "json", //data yang di kirim berupa json
                        data: {
                            username: $("#username").val(), //username: adalah sebuah properties, $("#username") adalah sebuah object dari id input username
                            password: $("#password").val() //password: adalah sebuah properties, $("#password") adalah sebuah object dari id input password

                        },
                        cache: false,
                        success: function(data, text) {
                            if (data.hasil == true) {
                                // alert(data.msg); //ketika sukses maka akan masuk ke halaman   
                                setTimeout(function() {
                                    window.location = data.redirecto;
                                }, 1000);
                            } else {
                                alert(data.msg);
                                setTimeout(function() {
                                    window.location = data.redirecto;
                                }, 2000);
                            }
                        },
                        error: function(request, status, error) {
                            alert(request.responseText + " " + status + " " + error);
                        }
                    });
                    return false;
                });

            $('#register').click(
                function() {
                    $("#formregister").removeClass("d-none");
                    $("#formlogin").addClass("d-none");
                });

            $('#cancel').click(
                function() {
                    $("#formregister").addClass("d-none");
                    $("#formlogin").removeClass("d-none");
                });
            $('#registerpost').click(
                function() {
                    $.ajax({
                        type: "POST",
                        url: url_postregister,
                        dataType: "json",
                        data: {
                            user: $("#user").val(),
                            pass: $("#pass").val(),
                            nama: $("#nama").val()
                        },
                        cache: false,
                        success: function(data, text) {

                            if (data.hasil == true) {
                                setTimeout(function() {
                                    window.location = data.redirecto;
                                }, 1000);
                            } else {
                                alert(data.msg);
                                setTimeout(function() {
                                    window.location = data.redirecto;
                                }, 2000);
                            }
                        },
                        error: function(request, status, error) {
                            alert(request.responseText + " " + status + " " + error);
                        }
                    });
                    return false;
                });
        });
    </script>
</body>

</html>