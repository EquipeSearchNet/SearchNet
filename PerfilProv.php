<?php
include("protect.php");
protect();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Language" content="pt-br">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="images/icons/wifi.ico" />
    <title>Search Net</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" />
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate-style.css" />
    <link href="css/main.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />

</head>
<!-- page header -->

<div class="container" id="home">
    <div class="col-12 text-center">
        <div class="tm-page-header">
            <h1 class="d-inline-block mr-1 font">Search</h1><i class="fas fa-4x fa-wifi mr-2" style="color: white;"></i>
            <h1 class="font">Net</h1>
        </div>
    </div>
</div>

<body>

    <style>
        input[type=text]:focus {
            background-color: transparent;
            border: none;
            outline: none;
            outline-style: none;
            box-shadow: none;
            border-color: transparent;
            border-bottom: 2px solid white;
            color: #FFFFFF;
        }

        input[type=email]:focus {
            background-color: transparent;
            border: none;
            outline: none;
            outline-style: none;
            box-shadow: none;
            border-color: transparent;
            border-bottom: 2px solid white;
            color: #FFFFFF;
        }

        input[type=email] {
            background-color: transparent;
            border: none;
            outline: none;
            outline-style: none;
            box-shadow: none;
            border-color: transparent;
            border-bottom: 2px solid white;
            color: #FFFFFF;
        }

        input[type=text] {
            background-color: transparent;
            border: none;
            outline: none;
            outline-style: none;
            box-shadow: none;
            border-color: transparent;
            border-bottom: 2px solid white;
            color: #FFFFFF;
        }

        input[type=file] {
            color: #FFFFFF;
        }

        ::placeholder {
            color: #FFFFFF;
        }
    </style>
    <!-- navbar -->
    <div class="tm-nav-section" style="background-color: #233237;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-md navbar-dark">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tmMainNav" aria-controls="tmMainNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="tmMainNav">
                            <ul class="navbar-nav mx-auto tm-navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link font" onclick="location.href='site.php#home'">Início<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font" onclick="location.href='site.php#features'">Features</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font" onclick="location.href='site.php#activities'">Activities</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font" onclick="location.href='site.php#company'">Company</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font" onclick="location.href='site.php#contact'">Contatar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font" onclick="location.href='logout.php'">Desconectar</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <?php
    include('ConecBanco.php');

    $sql = "SELECT * FROM provedora WHERE CodProv = '$_SESSION[usuario]'";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    $Cod = $row['CodProv'];
    $nome = $row['NomeProv'];
    $email = $row['email'];
    $cel = $row['CelProv'];
    $municipio = $row['MuniProv'];
    $site = $row['SiteProv'];
    $endereco = $row['EnderProv'];
    $uf = $row['UFProv'];
    $cep = $row['CepProv'];
    $senha = $row['senha'];
    $tel = $row['TelProv'];
    $arq = 'img/LogoProv/' . $Cod . '.png';

    ?>

    <section class="container tm-contact-section mi">
        <form class="form-control font" style="background-image: linear-gradient(#32484D, #121212);" enctype="multipart/form-data" id="FormPerf" name="FormPerf">
            <div class=" form-row">
                <div class="form-group col-md-3">
                    <label for="img-01">Logo</label>
                    <?php if (file_exists($arq)) { ?> <img style="background-color: transparent;" class="form-control" src="img/LogoProv/<?= $Cod ?>.png" width="225px" height="100px"> <?php } else { ?> <img style="background-color: transparent;" src="img/LogoProv/noimage.png" name="img" class="form-control"> <?php } ?>
                </div>
                <div class="form-group col-md-9">
                    <label for="arquivo">Arquivo</label>
                    <input type="file" style="background-color: transparent;" class="form-control" id="arquivo" name="arquivo">
                </div>
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" value="<?= $email ?>" name="email" id="email" placeholder="exemplo@email.com" required>
            </div>
            <div class="form-group">
                <label for="NomeProv">Nome da provedora</label>
                <input type="text" class="form-control" value="<?= $nome ?>" name="NomeProv" id="NomeProv" maxlength="250" placeholder="Ex: Claro" required>
            </div>
            <div class="form-group">
                <label for="txtTel">Telefone</label>
                <input type="text" class="form-control" value="<?= $tel ?>" name="txtTel" id="txtTel" data-mask="(00) 0000-0000" placeholder="(00) 0000-0000 (opcional)">
            </div>
            <div class="form-group">
                <label for="txtCel">Celular</label>
                <input type="text" class="form-control" value="<?= $cel ?>" name="txtCel" id="txtCel" data-mask="(00) 00000-0000" placeholder="(00) 00000-0000 (opcional)">
            </div>
            <div class="form-group">
                <label for="txtSite">Site</label>
                <input type="text" class="form-control" value="<?= $site ?>" name="txtSite" id="txtSite" maxlength="500" placeholder="Link do site (opcional)">
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" value="<?= $cep ?>" name="cep" id="cep" placeholder="00000-000" data-mask="00000-000" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="municipio">Município</label>
                    <input type="text" class="form-control" value="<?= $municipio ?>" name="municipio" id="municipio" maxlength="50" placeholder="Ex: Campinas" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="UF">UF</label>
                    <input type="text" name="uf" id="uf" value="<?= $uf ?>" style="overflow: scroll" placeholder="UF" class="form-control" pattern="[a-zA-Z]*" maxlength="2" required>
                </div>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control" value="<?= $endereco ?>" name="endereco" id="endereco" placeholder="Adicione complemento, apto, rua etc..." required>
            </div><br>
            <button type="submit" class="btn btn-outline-primary btn-lg">Enviar</button>
        </form>
    </section>


    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/jquery.singlePageNav.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.mask.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script>
        /**
         * detect IE
         * returns version of IE or false, if browser is not Internet Explorer
         */

        $(':radio').mousedown(function(e) {
            var $self = $(this);
            if ($self.is(':checked')) {
                var uncheck = function() {
                    setTimeout(function() {
                        $self.removeAttr('checked');
                    }, 0);
                };
                var unbind = function() {
                    $self.unbind('mouseup', up);
                };
                var up = function() {
                    uncheck();
                    unbind();
                };
                $self.bind('mouseup', up);
                $self.one('mouseout', unbind);
            }
        });

        const SenhaCaracter = () => {
            const senha = document.getElementById("senha").value;
            if (senha.length < 5) {
                document.getElementById("senha").value = "";
                document.getElementById("lblSenha").innerHTML = "<style='color:red;'>A senha deve conter pelo menos 5 caracteres.</>";
                setTimeout(function() {
                    document.getElementById("lblSenha").innerHTML = "Senha";
                }, 4000)
            }
        }
        const PreencheForm = (endereco) => {
            document.getElementById('municipio').value = endereco.localidade;
            document.getElementById('endereco').value = endereco.logradouro + ', ' + endereco.bairro;
            document.getElementById('uf').value = endereco.uf;
        }

        const LimpaForm = (endereco) => {
            document.getElementById('municipio').value = '';
            document.getElementById('endereco').value = '';
            document.getElementById('uf').value = '';
        }

        const cepValido = (cep) => cep.length == 9;

        const pesquisarCep = async () => {
            LimpaForm();
            const cep = document.getElementById('cep').value;
            const url = 'https://viacep.com.br/ws/' + cep + '/json/';

            if (cepValido(cep)) {
                const dados = await fetch(url);
                const endereco = await dados.json();

                if (endereco.hasOwnProperty('erro')) {

                    document.getElementById("endereco").value = "Cep não encontrado.";
                    setTimeout(function() {
                        document.getElementById("endereco").value = "";
                    }, 4000)

                } else {
                    document.getElementById("endereco").value = "";
                    PreencheForm(endereco);
                }

            } else {
                <?php $erro[] = "CEP invalido."; ?>
                document.getElementById("endereco").value = "Cep invalido.";
                document.getElementById("cep").value = "";
                setTimeout(function() {
                    document.getElementById("endereco").value = "";
                }, 4000)
            }
        }

        function Timeout(fn, interval) {
            var id = setTimeout(fn, interval);
            this.cleared = false;
            this.clear = function() {
                this.cleared = true;
                clearTimeout(id);
            };
        }

        document.getElementById('cep').addEventListener('focusout', pesquisarCep);
        document.getElementById('senha').addEventListener('focusout', SenhaCaracter);

        /*
                $(document).ready(function() {
                    $('[name=txtTel]').mask('(00) 0000-0000');
                });

                $(document).ready(function() {
                    $('#FormPerf').on('submit', function(e) {
                        e.preventDefault();
                        $.ajax({
                            url: $(this).attr('action') || window.location.pathname,
                            type: "POST",
                            data: $(this).serialize(),
                            success: function(response) {
                                alert(resopnse);
                            },
                            error: function(jXHR, textStatus, errorThrown) {
                                alert(errorThrown);
                            }
                        });
                    });
                });
        */
        /*    
            function Modif(form) {
                 var arquivo = form.arquivo.value;
                 var email = form.email.value;
                 var senha = form.senha.value;
                 var NomeProv = form.NomeProv.value;
                 var txtTel = form.txtTel.value;
                 var txtCel = form.txtCel.value;
                 var txtSite = form.txtSite.value;
                 var cep = form.cep.value;
                 var municipio = form.municipio.value;
                 var uf = form.uf.value;
                 var endereco = form.endereco.value;
                 form.append('arquivo', event.target.files[0]); 


                 $.ajax({
                     url: "ModifProv.php",
                     method: "POST",
                     data: {
                         "arquivo": arquivo,
                         "email": email,
                         "senha": senha,
                         "NomeProv": NomeProv,
                         "txtTel": txtTel,
                         "txtCel": txtCel,
                         "txtSite": txtSite,
                         "cep": cep,
                         "municipio": municipio,
                         "uf": uf,
                         "endereco": endereco,
                     },
                     success: function(response) {
                         alert(response);
                     }
                 })

                 return false;

             } 
          */

        $(document).ready(function(e) {
            // Submit form data via Ajax
            $("#FormPerf").on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'ModifProv.php',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire(
                            response,
                        ).then(function() {
                            location.reload();
                        }, function(dismiss) {
                            return false;
                        })
                    },
                    error: function(response) {
                        msgErr();
                    }
                });
            });
        });
        /*
                function msgSuc() {
                    Swal.fire(
                        'Concluido!',
                        response,
                        'success'
                    ).then(function() {
                        location.reload();
                    }, function(dismiss) {
                        return false;
                    })
                }
        */
        function msgErr() {
            Swal.fire({
                icon: 'error',
                title: 'Erro'
            }).then(function() {
                location.reload();
            }, function(dismiss) {
                return false;
            })
        }


        function detectIE() {
            var ua = window.navigator.userAgent;

            var msie = ua.indexOf("MSIE ");
            if (msie > 0) {
                // IE 10 or older => return version number
                return parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)), 10);
            }

            var trident = ua.indexOf("Trident/");
            if (trident > 0) {
                // IE 11 => return version number
                var rv = ua.indexOf("rv:");
                return parseInt(ua.substring(rv + 3, ua.indexOf(".", rv)), 10);
            }

            // var edge = ua.indexOf('Edge/');
            // if (edge > 0) {
            //     // Edge (IE 12+) => return version number
            //     return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
            // }

            // other browser
            return false;
        }

        function setVideoHeight() {
            const videoRatio = 1920 / 1080;
            const minVideoWidth = 400 * videoRatio;
            let secWidth = 0,
                secHeight = 0;

            secWidth = videoSec.width();
            secHeight = videoSec.height();

            secHeight = secWidth / 2.13;

            if (secHeight > 600) {
                secHeight = 600;
            } else if (secHeight < 400) {
                secHeight = 400;
            }

            if (secWidth > minVideoWidth) {
                $("video").width(secWidth);
            } else {
                $("video").width(minVideoWidth);
            }

            videoSec.height(secHeight);
        }

        // Parallax function
        // https://codepen.io/roborich/pen/wpAsm
        var background_image_parallax = function($object, multiplier) {
            multiplier = typeof multiplier !== "undefined" ? multiplier : 0.5;
            multiplier = 1 - multiplier;
            var $doc = $(document);
            $object.css({
                "background-attatchment": "fixed"
            });
            $(window).scroll(function() {
                var from_top = $doc.scrollTop(),
                    bg_css = "center " + multiplier * from_top + "px";
                $object.css({
                    "background-position": bg_css
                });
            });
        };

        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $(".scrolltop:hidden")
                    .stop(true, true)
                    .fadeIn();
            } else {
                $(".scrolltop")
                    .stop(true, true)
                    .fadeOut();
            }

            // Make sticky header
            if ($(this).scrollTop() > 158) {
                $(".tm-nav-section").addClass("sticky");
            } else {
                $(".tm-nav-section").removeClass("sticky");
            }
        });

        let videoSec;

        $(function() {
            if (detectIE()) {
                alert(
                    "Please use the latest version of Edge, Chrome, or Firefox for best browsing experience."
                );
            }

            const mainNav = $("#tmMainNav");
            mainNav.singlePageNav({
                filter: ":not(.external)",
                offset: $(".tm-nav-section").outerHeight(),
                updateHash: true,
                beforeStart: function() {
                    mainNav.removeClass("show");
                }
            });

            videoSec = $("#tmVideoSection");

            // Adjust height of video when window is resized
            $(window).resize(function() {
                setVideoHeight();
            });

            setVideoHeight();

            $(window).on("load scroll resize", function() {
                var scrolled = $(this).scrollTop();
                var vidHeight = $("#hero-vid").height();
                var offset = vidHeight * 0.6;
                var scrollSpeed = 0.25;
                var windowWidth = window.innerWidth;

                if (windowWidth < 768) {
                    scrollSpeed = 0.1;
                    offset = vidHeight * 0.5;
                }

                $("#hero-vid").css(
                    "transform",
                    "translate3d(-50%, " + -(offset + scrolled * scrollSpeed) + "px, 0)"
                ); // parallax (25% scroll rate)
            });

            // Parallax image background
            background_image_parallax($(".tm-parallax"), 0.4);

            // Back to top
            $(".scroll").click(function() {
                $("html,body").animate({
                        scrollTop: $("#home").offset().top
                    },
                    "1000"
                );
                return false;
            });
        });
    </script>
</body>

</html>