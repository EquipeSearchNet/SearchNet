<?php

session_start();

include("ConecBanco.php");

$token = "";

if ($_GET) {
    $token = trim($_GET["token"]);
    $_SESSION["token"] = trim($_GET["token"]);
}

$sql = "SELECT * FROM provedora WHERE TokenProv = '$token' AND StatusProv = 'I' limit 1";

$result = $conn->query($sql);
$linha = $result->fetch_assoc();
$token2 = $linha["TokenProv"];

if ($token2 != $token) {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Erro',
            text: 'Usuario não autorizado.',
        });
        history.back();</script>";
    header('location: cadastrar.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Search Net - Senha</title>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/wifi.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/main2.css">
    <!--===============================================================================================-->
</head>

<body style="font-family: Raleway !important;">
    <style>
        .a {
            cursor: pointer;
        }
    </style>
    <div class="limiter">
        <div class="container-login100" style="background-color: #233237;">
            <div class="wrap-login100" style="background-image: linear-gradient(#32484D, #121212);">
                <form id="login" class="login100-form validate-form" action="gravarnp.php" method="POST">
                    <span class="login100-form-title p-b-48">
                        <?php
                        if (isset($erro) && count(array($erro)) > 0) {
                            foreach ($erro as $msg) {
                                echo "<h4>$msg</h4>";
                            }
                        } else {
                        ?> <h4 id="Search" style="color: #ffffff;">Search<i class="zmdi zmdi-wifi-alt"></i>Net</h4> <?php
                                                                                                                }
                                                                                                                    ?>
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" style="font-family: 'Raleway', sans-serif; color: #FFFFFF;" type="password" id="senha" name="senha" required>
                        <span class="focus-input100" data-placeholder="Digitar nova senha"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" style="font-family: 'Raleway', sans-serif; color: #FFFFFF;" type="password" id="confsenha" name="confsenha" required>
                        <span class="focus-input100" data-placeholder="Confirmar senha"></span>
                    </div>

                    <div id="message"></div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button id="btnSubmit" class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="js/sweetalert2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main2.js"></script>
    <script>
        $('#senha, #confsenha').on('keyup', function() {
            if ($('#senha').val() != $('#confsenha').val()) {
                $('#message').html('Senhas não coincidem').css('color', 'red');
                $('#btnSubmit').css('background-color', 'grey');
                $('#btnSubmit').click(function(event) {
                        event.preventDefault();
                    });
            } else {
                $('#btnSubmit').unbind('click');
                $('#btnSubmit').css('background-color', 'transparent');
                $('#message').html('');
            }
        });

        $(document).ready(function(e) {
            // Submit form data via Ajax
            $("#login").on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'gravarnp.php',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire(
                            response,
                        ).then(function() {
                            window.location.replace("login.php");
                        }, function(dismiss) {
                            return false;
                        })
                    }
                });
            });
        });



        const SenhaCaracter = () => {
            const senha = document.getElementById("senha").value;

            if (senha.length < 5) {
                document.getElementById("senha").value = "";
                document.getElementById("Search").innerHTML = "<h4 class='animated shake slow' style='color: #c62b2b;'>A senha deve conter pelo menos <strong>5</strong> caracteres.</h4>";
                setTimeout(function() {
                    document.getElementById("Search").innerHTML = "<h4 style='color:#ffffff;'>Search" + "<i class='zmdi zmdi-wifi-alt'></i>" + "Net</h4>";
                }, 4000)
            } else {
                document.getElementById("Search").innerHTML = "<h4 style='color:#ffffff;'>Search" + "<i class='zmdi zmdi-wifi-alt'></i>" + "Net</h4>";
            }
        }

        const ConfSenhaCaracter = () => {
            const confsenha = document.getElementById("confsenha").value;

            if (confsenha.length < 5) {
                document.getElementById("confsenha").value = "";
                document.getElementById("Search").innerHTML = "<h4 class='animated shake slow' style='color: #c62b2b;'>A senha deve conter pelo menos <strong>5</strong> caracteres.</h4>";
                setTimeout(function() {
                    document.getElementById("Search").innerHTML = "<h4 style='color:#ffffff;'>Search" + "<i class='zmdi zmdi-wifi-alt'></i>" + "Net</h4>";
                }, 4000)
            } else {
                document.getElementById("Search").innerHTML = "<h4 style='color:#ffffff;'>Search" + "<i class='zmdi zmdi-wifi-alt'></i>" + "Net</h4>";
            }
        }

        document.getElementById('senha').addEventListener('focusout', SenhaCaracter);
        document.getElementById('confsenha').addEventListener('focusout', ConfSenhaCaracter);
    </script>
</body>

</html>