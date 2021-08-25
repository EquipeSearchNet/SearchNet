<?php /*
include("protect.php");
protect(); */
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
  <link rel="icon" type="image/png" href="images/icons/wifi.ico" />
  <link rel="stylesheet" href="css/styles.css" />
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
  <link href="css/main.css" rel="stylesheet" />
  <title>Search Net</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" />
  <!-- https://fonts.google.com/specimen/Open+Sans -->
  <link rel="stylesheet" href="css/all.min.css" />
  <!-- https://fontawesome.com/ -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="css/tooplate-style.css" />
  <link href="css/main.css" rel="stylesheet" />
  <link href="css/starrr.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css.map" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/jquery.dataTables.min.css" />
</head>
<!-- page header -->

<div class="container" id="home">
  <div class="col-12 text-center">
    <div class="tm-page-header">
      <h1 class="font d-inline-block mr-1">Search</h1><i class="font fas fa-4x fa-wifi mr-2"></i>
      <h1 class="font">Net</h1>
    </div>
  </div>
</div>

<body>
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
                <li class="nav-item active font">
                  <a class="nav-link" href="#home">Início<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item font">
                  <a class="nav-link" href="#features">Features</a>
                </li>
                <li class="nav-item font">
                  <a class="nav-link" href="#activities">Activities</a>
                </li>
                <li class="nav-item font">
                  <a class="nav-link" href="#company">Company</a>
                </li>
                <li class="nav-item font">
                  <a class="nav-link" href="#contact">Contatar</a>
                </li>
                <li class="nav-item font" id="prov">
                  <a class="nav-link" onclick="location.href='PerfilProv.php'">Provedora</a>
                </li>
                <?php
                if (!isset($_SESSION)) {
                  session_start();
                }
                if (!isset($_SESSION['usuario']) || !is_numeric($_SESSION['usuario'])) {

                ?>
                  <script>
                    document.getElementById("prov").children[0].style.display = "none"
                    document.getElementById("cadast").children[0].style.display = "none"
                  </script>

                  <li class="nav-item font">
                    <a class="nav-link" onclick="location.href='login.php'">Logar</a>
                  </li>

                  <li class="nav-item font">
                    <a class="nav-link" id="cadast" onclick="location.href='cadastrar.php'">Cadastrar</a>
                  </li>
                <?php
                }
                ?>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- Video Banner -->
  <section class="tm-banner-section" id="tmVideoSection">
    <div class="container tm-banner-text-container">
      <div class="row">
        <div class="col-12">
          <header>
            <div class="s003">
              <form action="" method="Post">
                <div class="inner-form">
                  <div class="input-field second-wrap">
                    <input name="busca" type="text" class="font" placeholder="Digite seu município!!!!" />
                  </div>
                  <div class="input-field third-wrap">
                    <button class="btn-search" type="submit" id="procurar">
                      <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                      </svg>
                    </button>
                  </div>
              </form>
            </div>
        </div>
        </header>
      </div>
    </div>
    </div>
    <!-- Video -->
    <video id="hero-vid" autoplay="" loop="" muted>
      <source src="videos/city-night-blur-01.mp4" type="video/mp4" />
      Seu navegador não suporta o vídeo.
    </video>
  </section>
  <?php

  include("ConecBanco.php");

  if (isset($_POST["busca"])) {
  ?>
    <script>
      window.location.href = "#OpProv";
    </script>
  <?php
    $Muni = $_POST["busca"];

    $sqlProv = "SELECT * FROM provedora WHERE MuniProv = '$Muni' AND StatusProv = 'A'";
    $result = $conn->query($sqlProv);
    $nProvs = mysqli_num_rows($result);
  }
  ?>
  <?php

  if (isset($_POST["busca"]) && (!empty($Muni)) && (!is_numeric($Muni))) {

  ?>
    <section class="container tm-contact-section" style="color: #000; font-family: 'Raleway', sans-serif;" id="OpProv">

      <h1 class="font">

        Provedoras dísponiveis: <?= $nProvs ?>

      </h1>
      </div>
      <?php

      while ($row = $result->fetch_assoc()) {

      ?>
        <?php
        $Codigo = $row['CodProv'];
        $nome = $row['NomeProv'];
        $ender = $row['EnderProv'];
        $tel = $row['TelProv'];
        $site = $row['SiteProv'];
        $file = 'img/LogoProv/' . $Codigo . '.png';

        $sqlAval = "SELECT * FROM avaliacao WHERE CodProv = '$Codigo'";
        $avaliacoes = 0;
        $result_aval = $conn->query($sqlAval);
        while ($row_aval = $result_aval->fetch_assoc()) {

          $avaliacoes += $row_aval['AvalUsu'];
        }

        $MediaAval = 0;
        if ($avaliacoes > 0) {

          $MediaAval = $avaliacoes / mysqli_num_rows($result_aval);
        }

        ?>


        <br>
        <div style="overflow-x:auto;">
          <div class="card">
          
            <nav>
              <div class="nav nav-tabs" id="nav-tab<?= $Codigo ?>" name="<?=$Codigo?>" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home<?= $Codigo ?>" role="tab" aria-controls="nav-home" aria-selected="true"> <?php if (file_exists($file)) { ?> <img class="imag" src="img/LogoProv/<?= $Codigo ?>.png" width="100px" height="40px"> <?php } else { ?> <?= $nome ?> <?php } ?></a>
                <?php if (!empty($site)) { ?> <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile<?= $Codigo ?>" role="tab" aria-controls="nav-profile" aria-selected="false">Planos</a> <?php } ?>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact<?= $Codigo ?>" role="tab" aria-controls="nav-contact" aria-selected="false">Avaliar</a>
                <a class="nav-item nav-link" id="nav-Aval-tab" data-toggle="tab" href="#nav-Aval<?= $Codigo ?>" role="tab" aria-controls="nav-Aval" aria-selected="false">Avalição</a>
              </div>
            </nav>
            <div class="reg tab-content card-body" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home<?= $Codigo ?>" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="container" style="max-height: 400px;">
                  <h5 class="text-center card-title"><?= $nome ?></h5>
                  <p class="card-text">Telefones: <?= $tel ?><br>
                    Endereço: <?= $ender ?></p>
                  <?php if (!empty($site)) { ?> <a href="<?= $site ?>" target="_blank" class="btn btn-primary btn-lg">Site</a> <?php } else { ?> <strong>Consulte os planos via telefone/whatsapp</strong> <?php } ?>
                </div>
              </div>
              <div class="tab-pane reg fade" id="nav-profile<?= $Codigo ?>" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="container" style="max-height: 400px;">
                  <?= $MediaAval ?>
                </div>
              </div>

              <div class="tab-pane reg fade" id="nav-contact<?= $Codigo ?>" role="tabpanel" aria-labelledby="nav-contact-tab">
                <form class="form-horizontal" method="POST" onsubmit="return saveAval(this);">
                  <div class="container" style="max-height: 400px;">
                    <input type="hidden" name="provCod" value="<?= $Codigo ?>">
                    <div class="form-group text-center">
                      <div class="starrr"></div>
                    </div>

                    <div class="form-group">
                      <input type="text" id="NomeUsu" name="NomeUsu" pattern="[a-zA-Z/s]*" maxlength="70" class="form-control" placeholder="Insira o nome... (apenas letras)" required>
                    </div>

                    <div class="form-group">
                      <textarea id="MsgUsu" name="MsgUsu" class="form-control" rows="5" placeholder="Resuma sua experiência (opcional)" maxlength="500"></textarea>
                    </div>

                    <div class="form-group">
                      <input class="form-control" type="submit" value="enviar">
                    </div>
                  </div>
                </form>
              </div>

              <div class="tab-pane reg fade" id="nav-Aval<?= $Codigo ?>" role="tabpanel" aria-labelledby="nav-Aval-tab">
                <div class="container" style="max-height: 400px;">
                  <?php if ($avaliacoes == 0) {   ?>

                    Nenhum avaliação ainda, Seja o primero!

                  <?php
                  } else { ?>
                    <div class="ratings fa-3x text-center" data-rating="<?= $MediaAval ?>"></div>
                    <div class="text-center"><?= $MediaAval ?></div>
                    <table id="Comentarios" class="display" style="width:100%">
                      <thead>
                        <tr>
                          <th>Nome</th>
                          <th>Avaliação</th>
                          <th>Feedback</th>
                        </tr>
                      </thead>
                    </table>
                  <?php
                  } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
    <?php
      }
    }
    ?>
    </section>
    <!-- Features -->
    <div class="container tm-features-section font" id="features">
      <div class="row tm-features-row">
        <section class="col-md-6 col-sm-12 tm-feature-block">
          <header class="tm-feature-header">
            <i class="font fas fa-5x fa-star tm-feature-icon"></i>
            <h3 class="tm-feature-h font">Método de avaliação</h3>
          </header>
          <p>
            Documentos da Agência Nacional de Telecomunicações apresentam diversas pesquisas de satisfação e contentamento do cliente em relação ao serviço oferecido das grandes provedoras de internet. Tais pesquisas serão reutilizadas e adaptadas ao método avaliativo do Search Net.
          </p>
          <p>
            A funcionalidade de avaliação do projeto será feita por meio de uma metodologia avaliativa de 5 (cinco) estrelas, em que 0 seria a menor satisfação, e 5 a maior.
          </p>
        </section>
        <section class="col-md-6 col-sm-12 tm-feature-block">
          <header class="tm-feature-header">
            <i class="font fas fa-5x fa-wifi tm-feature-icon"></i>
            <h3 class="font tm-feature-h">Projeto</h3>
          </header>
          <p>
            Search net foi planejada de modo a auxiliar as pessoas na busca de uma internet ideal nestes tempos necessários de pandemia, mostrando diversas opções de planos de provedores menores, com o diferencial do método de avaliação dessas empresas.
          </p>
          <p>
            Facilitando a pesquisa por outras opções para pessoas de regiões mais afastadas dos grandes centros, portanto, a empresa de pequeno porte ganharia mais destaque no mercado e seus clientes não ficariam mais reféns do grande monopólio de provedoras de internet.
          </p>
        </section>
      </div>
    </div>

    <!-- Activities -->
    <div class="container font" id="activities">
      <div class="row">
        <div class="col-12">
          <div class="tm-parallax">
            <header class="tm-parallax-header">
              <h2 class="">Activities</h2>
            </header>
          </div>
        </div>
      </div>
      <div class="row font">
        <div class="col-lg-6">
          <div class="tm-activity-block">
            <div class="tm-activity-img-container">
              <img src="img/img-01.jpg" alt="Image" class="tm-activity-img" />
            </div>
            <div class="tm-activity-block-text">
              <h3 class="tm-text-blue">Lorem ipsum dolor sit amet</h3>
              <p>
                Orci varius natoque penatibus et magnis dis parturient montes,
                nascetur ridiculus mus. Sed eu turpis nec sem lacinia
                condimentum et a orci.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 font">
          <div class="tm-activity-block mr-lg-0 ml-lg-auto">
            <div class="tm-activity-img-container">
              <img src="img/img-02.jpg" alt="Image" class="tm-activity-img" />
            </div>
            <div class="tm-activity-block-text">
              <h3 class="tm-text-blue">Lorem ipsum dolor sit amet</h3>
              <p>
                Orci varius natoque penatibus et magnis dis parturient montes,
                nascetur ridiculus mus. Sed eu turpis nec sem lacinia
                condimentum et a orci.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 font">
          <div class="tm-activity-block">
            <div class="tm-activity-img-container">
              <img src="img/img-03.jpg" alt="Image" class="tm-activity-img" />
            </div>
            <div class="tm-activity-block-text">
              <h3 class="tm-text-blue">Lorem ipsum dolor sit amet</h3>
              <p>
                Orci varius natoque penatibus et magnis dis parturient montes,
                nascetur ridiculus mus. Sed eu turpis nec sem lacinia
                condimentum et a orci.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 font">
          <div class="tm-activity-block mr-lg-0 ml-lg-auto">
            <div class="tm-activity-img-container">
              <img src="img/img-04.jpg" alt="Image" class="tm-activity-img" />
            </div>
            <div class="tm-activity-block-text">
              <h3 class="tm-text-blue">Lorem ipsum dolor sit amet</h3>
              <p>
                Orci varius natoque penatibus et magnis dis parturient montes,
                nascetur ridiculus mus. Sed eu turpis nec sem lacinia
                condimentum et a orci.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="container tm-company-section font" id="company">
      <div class="row">
        <div class="col-xl-9 col-lg-8 col-md-12 tm-company-left">
          <div class="tm-company-about">
            <div class="tm-company-img-container">
              <img src="img/img-05.jpg" alt="Image" />
            </div>
            <div class="tm-company-about-text">
              <header>
                <h2 class="tm-company-about-header">Our Company</h2>
              </header>
              <p>
                Phasellus fringilla convallis libero non aliquam. Morbi justo
                lorem, varius ultricies pulvinar ac, aliquet quis ipsum.
              </p>
              <p class="mb-4">
                Suspendisse aliquam pulvinar odio sed rhoncus. Cras pretium diam
                ut metus tristique, a ultricies sapien euismod. Duis dui diam,
                maximus ac ligula a, accumsan cursus ante.
              </p>
              <a href="#" style="color:#FFFFFF;" class="btn tm-btn tm-float-right font-family: Raleway;">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-xl-9 col-lg-4 col-md-12 tm-company-right  ml-lg-auto mr-lg-0">
          <div class="tm-company-right-inner">
            <ul class="nav nav-tabs" id="tmCompanyTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link tm-nav-link-border-right active" id="vision-tab" data-toggle="tab" href="#vision" role="tab" aria-controls="vision" aria-selected="true">Vision</a>
              </li>
              <li class="nav-item">
                <a class="nav-link tm-no-border-right" id="mission-tab" data-toggle="tab" href="#mission" role="tab" aria-controls="mission" aria-selected="false">Mission</a>
              </li>
            </ul>
            <div class="tab-content" id="tmTabContent">
              <div class="tab-pane fade show active" id="vision" role="tabpanel" aria-labelledby="vision-tab">
                <p>
                  Phasellus suscipit sapien magna, vel dictum lorem fringilla.
                </p>
                <p>
                  Class aptent taciti sociosqu ad litora torquent per conubia
                  nostra.
                </p>
                <p>
                  Nulla ornare ligula nibh, sit amet tristique magna efficitur
                  eu.
                </p>
              </div>
              <div class="tab-pane fade" id="mission" role="tabpanel" aria-labelledby="mission-tab">
                <p>
                  Class aptent taciti sociosqu ad litora torquent per conubia
                  nostra.
                </p>
                <p>
                  Nulla ornare ligula nibh, sit amet tristique magna efficitur
                  eu.
                </p>
                <p>
                  Phasellus suscipit sapien magna, vel dictum lorem fringilla.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact -->
    <section class="container tm-contact-section" id="contact">
      <div class="row">
        <div class="col-xl-5 col-lg-6 col-md-12 tm-contact-left">
          <div class="tm-contact-form-container ml-auto mr-0">
            <header>
              <h2 class="tm-contact-header font">Contate nos</h2>
            </header>
            <form class="form-horizontal" name="contato" id="contato" action="Email.php" method="post">
              <div class="form-group">
                <input type="text" id="txtUsu" name="txtUsu" class="form-control" placeholder="Nome" required />
              </div>
              <div class="form-group">
                <input type="email" id="txtEmail" name="txtEmail" class="form-control" placeholder="Email" required />

              </div>
              <div class="form-group">
                <input class="form-control" data-mask="(00) 00000-0000" placeholder="(00) 00000-0000" type="text" id="txtTel" name="txtTel" required />

              </div>
              <div class="form-group" style="font-family: 'Raleway', sans-serif;">
                <select name="selContat" class="form-control">
                  <option value="1" selected>Sugestão</option>
                  <option value="2">Reclamação</option>
                  <option value="3">Feedback</option>
                </select>
              </div>

              <div class="form-group" aria-label="Default select example">
                <textarea id="txtMsg" name="txtMsg" class="form-control" placeholder="Mensagem" maxlength="500" required rows="3"></textarea>
              </div>
              <div class="tm-text-right">
                <button type="submit" class="btn tm-btn tm-btn-big" style="font-family: Raleway; color:#FFFFFF;">
                  Enviar
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-xl-7 col-lg-6 col-md-12 tm-contact-right font">
          <div class="tm-contact-figure-block">
            <figure class="d-inline-block">
              <img src="img/img-06.jpg" alt="Image" class="img-fluid" />
              <figcaption class="tm-contact-figcaption">
                Nulla arcu tortor, mattis in diam eget, hendrerit vulcountavalte
                ligula. Nam non purus consequat, dictum lectus lobortis, laoreet
                nibh. Cras vitae facilisis felis. Phasellus tristique.
              </figcaption>
            </figure>
          </div>
        </div>
      </div>
    </section>
    <footer class="container tm-footer font">
      <div class="row tm-footer-row">
        <p class="col-md-10 col-sm-12 mb-0">
          Copyright &copy; 2018 Company Name - Design:
          <a rel="nofollow" href="https://www.facebook.com/tooplate" class="tm-footer-link">Tooplate</a>
        </p>
        <div class="col-md-2 col-sm-12 scrolltop">
          <div class="scroll icon">
            <i class="fa fa-4x fa-angle-up">
            </i>
          </div>
        </div>
      </div>
    </footer>

    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/jquery.singlePageNav.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.mask.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/starrr.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script>
      /**
       * detect IE
       * returns version of IE or false, if browser is not Internet Explorer
       */

      $(document).ready(function() {
        $('[name=txtTel]').mask('(00) 00000-0000');
      });

      var avaliacao = 0;
      $(function() {
        $(".starrr").starrr().on("starrr:change", function(event, value) {
          //alert(value);
          avaliacao = value;
        });

        var rating = document.getElementsByClassName("ratings");
        for (var a = 0; a < rating.length; a++) {
          $(rating[a]).starrr({
            readOnly: true,
            rating: rating[a].getAttribute("data-rating")
          });
        }
      });

      function saveAval(form) {
        var provCod = form.provCod.value;
        var NomeUsu = form.NomeUsu.value;
        var MsgUsu = form.MsgUsu.value;

        $.ajax({
          url: "SalvaAval.php",
          method: "POST",
          data: {
            "avaliacao": avaliacao,
            "provCod": provCod,
            "MsgUsu": MsgUsu,
            "NomeUsu": NomeUsu,
          },
          success: function(response) {
            Swal.fire(
              'Obrigado!',
              response,
              'success'
            )

            document.getElementById("NomeUsu").value = "";
            document.getElementById("MsgUsu").value = "";

          }
        })

        return false;

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

      $(document).ready(function() {
        $('table.display').DataTable({
          "pageLength": 3,
          "processing": true,
          "serverSide": true,
          "bLengthChange": false,
          "scrollY": "300px",
          "scrollCollapse": true,
          "ajax": {
            "url": "teste2.php",
            "type": "POST"
          },
          "language": {
            "url": "js/DataTable-pt.json"
          }
        });
      });

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

      $(document).ready(function() {
        $('#contato').on('submit', function(e) {
          e.preventDefault();
          $.ajax({
            url: $(this).attr('action') || window.location.pathname,
            type: "POST",
            data: $(this).serialize(),
            success: function(data) {
              msgcontat();
              limpa();
              // $("#msg").html(data);
            },
            error: function(jXHR, textStatus, errorThrown) {
              alert(errorThrown);
            }
          });
        });
      });

      function msgcontat() {
        Swal.fire(
          'Obrigada!',
          'Mensagem enviada!',
          'success'
        )
      }

      function limpa() {

        document.getElementById("txtEmail").value = "";
        document.getElementById("txtTel").value = "";
        document.getElementById("txtMsg").value = "";
        document.getElementById("txtUsu").value = "";

      }
    </script>
</body>

</html>
