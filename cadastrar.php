<?php

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['usuario'])) {

    header("Location: site.php");
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/wifi.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <!--===============================================================================================-->
    <script src="js/sweetalert2.all.min.js"></script>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css"
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/main2.css">

    <title>Search Net - Cadastrar</title>
</head>

<?php //if(isset($_POST["cep"])) { 
?>

<?php
// }
?>

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

        input[type=password]:focus {
            background-color: transparent;
            border: none;
            outline: none;
            outline-style: none;
            box-shadow: none;
            border-color: transparent;
            border-bottom: 2px solid white;
            color: #FFFFFF;
        }

        input[type=password] {
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
    <?php
    include("ConecBanco.php");
    include('isCnpjValid.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';


    if (isset($_POST["uf"], $_POST["email"], $_POST["endereco"], $_POST["municipio"], $_POST["cnpj"], $_POST["cep"], $_POST["NomeProv"], $_POST["txtTel"], $_POST["txtSite"], $_POST["txtCel"])) {

        $coduf = $_POST['uf'];
        $email = $_POST['email'];
        $ender = $_POST['endereco'];
        $muni = $_POST['municipio'];
        $cep = $_POST['cep'];
        $nome = $_POST['NomeProv'];
        $Tel = $_POST['txtTel'];
        $Cel = $_POST['txtCel'];
        $site = $_POST['txtSite'];
        $cnpj = $_POST['cnpj'];
        $isCnpjValid = isCnpjValid($cnpj);
        $_SESSION['email'] = $_POST['email'];
    ?>
        <script>

        </script>
        <?php

        $sql_code = "SELECT * FROM provedora WHERE email = '$email'";
        $sql_query = $conn->query($sql_code) or die($conn->error);
        $dado = $sql_query->fetch_assoc();
        $total = $sql_query->num_rows;

        if ($total > 0) {

            $erro[] = "Este email ja pertence a um usuario";
        ?>
            <script>
                setTimeout(function() {
                    document.getElementById("Search").innerHTML = "<h1 style='color:#ffffff;'>Search " + "<i class='zmdi zmdi-wifi-alt'></i>" + " Net</h1>";
                }, 4000)
            </script>

        <?php
        }

        $sqlcnpj = "SELECT * FROM provedora WHERE CnpjProv = '$cnpj'";
        $sqllicnpj = $conn->query($sqlcnpj) or die($conn->error);
        $dados = $sqllicnpj->fetch_assoc();
        $totcnpj = $sqllicnpj->num_rows;

        if ($totcnpj > 0) {

            $erro[] = "Este cnpj ja pertence a um usuário";
        ?>
            <script>
                setTimeout(function() {
                    document.getElementById("Search").innerHTML = "<h1 style='color:#ffffff;'>Search " + "<i class='zmdi zmdi-wifi-alt'></i>" + " Net</h1>";
                }, 4000)
            </script>

        <?php
        }

        if ($isCnpjValid == false) {

            $erro[] = "Cnpj inválido";
        ?>
            <script>
                setTimeout(function() {
                    document.getElementById("Search").innerHTML = "<h1 style='color:#ffffff;'>Search " + "<i class='zmdi zmdi-wifi-alt'></i>" + " Net</h1>";
                }, 4000)
            </script>

            <?php
        }

        if (count(array($erro)) == 0 || !isset($erro)) {

            $token = MD5($cnpj);

            $sql = "INSERT INTO provedora (UFProv, MuniProv, EnderProv, CepProv, CnpjProv, email, NomeProv, TelProv, SiteProv, CelProv, TokenProv)
            VALUES ('$coduf', '$muni', '$ender', '$cep', '$cnpj', '$email', '$nome', '$Tel', '$site', '$Cel', '$token')";


            if ($conn->query($sql) === TRUE) {

                $linkUsu = "http://localhost/root/TCC/np.php?token=$token";

                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                $subject = "Search Net - Validação de provedora " . $nome;

                try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'equipesearchnet@gmail.com';                     //SMTP username
                    $mail->Password   = 'searchnet1234';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                    $mail->CharSet = "UTF-8";

                    //To load the French version
                    $mail->setLanguage('pt_br', '/PHPMailer-master/language/phpmailer.lang-pt_br.php');

                    //Recipients

                    //Remetente
                    $mail->setFrom('equipesearchnet@gmail.com', $nome);

                    //Destinatario
                    $mail->addAddress($email, $nome);     //Add a recipient
                    //$mail->addAddress('ellen@example.com');               //Name is optional
                    //$mail->addReplyTo('equipesearchnet@gmail.com', 'Information');
                    //$mail->addCC('equipesearchnet@gmail.com');    
                    //$mail->addBCC('bcc@example.com');

                    //Attachments
                    $mail->AddEmbeddedImage('img/Search_Net.png', 'logo_SN');         //Add attachments
                    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = $subject;
                    $mail->Body    = "<html> <body style='font-family:Raleway'>";
                    $mail->Body  .= "<b>Boa noite, $nome</b><br><br>Confirme seu cadastro.<br><br>";
                    $mail->Body .= '<table cellpadding="3">';
                    $mail->Body  .= "
                        <tr>
                        <td width='50'> <strong> Nome </strong> </td>
                        <td width='5'> : </td>
                        <td> $nome </td>
                        </tr>
                        <tr>
                        <td> <strong> Email </strong> </td>
                        <td> : </td>
                        <td> $email </td>
                        </tr>
                        <tr>
                        <td> <a href='$linkUsu'>Validar minha conta.</a> </td>
                        </tr>
                        </table>
                        </body>
                        <img src='cid:logo_SN' width='170' height='100'> </html>";;

                    $mail->AltBody = $subject;

                    $mail->send();
            ?>
                    <script>
                        Swal.fire(
                            'Concluido!',
                            'Email enviado com sucesso.',
                            'success',
                        ).then(function() {
                            <?php header('Location: site.php'); ?>
                        }, function(dismiss) {
                            return false;
                        })
                    </script>
                <?php

                } catch (Exception $e) {
                ?>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro',
                            text: 'Erro na inserção:<?php $conn->error; $mail->ErrorInfo; ?>',
                        })
                    </script>
                <?php
                }
                ?>
                <script>
                    Swal.fire(
                        'Concluido!',
                        'Email enviado com sucesso.',
                        'success',
                    ).then(function() {
                        <?php header('Location: site.php'); ?>
                    }, function(dismiss) {
                        return false;
                    })
                </script>
            <?php
            } else {
            ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro',
                        text: 'Erro na inserção:<?php $conn->error; $mail->ErrorInfo; ?>',
                    })
                </script>
    <?php
            }
        }
    }
    ?>
    <div class="limiter">
        <div class="container-login100" style="background-color: #233237;">
            <div style="width: 600px; background-image: linear-gradient(#32484D, #121212);" class="wrap-login100">
                <span style="color:#ffffff" class="login100-form-title p-b-48">
                    <?php
                    if (isset($erro) && count(array($erro)) > 0) {
                        foreach ($erro as $msg) {
                            echo "<h1 id='Search' class='animated shake slow' style='color: #c62b2b;'>$msg</h1>";
                        }
                    } else {
                    ?> <h1 id="Search">Search <i class="zmdi zmdi-wifi-alt"></i> Net</h1>
                    <?php
                    }
                    ?>
                </span>
                <form class="login100-form validate-form" action="" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label style="color:#ffffff" for="Email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="exemplo@email.com" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="color:#ffffff" for="cnpj">CNPJ</label>
                        <input type="text" class="form-control cnpj" name="cnpj" id="cnpj" placeholder="00.000.000/0000-00" data-mask="00.000.000/0000-00" data-mask-reverse="true" required>
                    </div>
                    <div class="form-group">
                        <label style="color:#ffffff" for="NomeProv">Nome da provedora</label>
                        <input type="text" class="form-control" name="NomeProv" id="NomeProv" maxlength="250" placeholder="Ex: Claro" required>
                    </div>
                    <div class="form-group">
                        <label style="color:#ffffff" for="txtTel">Telefone</label>
                        <input type="text" class="form-control" name="txtTel" id="txtTel" data-mask="(00) 0000-0000" placeholder="(00) 0000-0000 (opcional)">
                    </div>
                    <div class="form-group">
                        <label style="color:#ffffff" for="txtCel">Celular</label>
                        <input type="text" class="form-control" name="txtCel" id="txtCel" data-mask="(00) 00000-0000" placeholder="(00) 00000-0000 (opcional)">
                    </div>
                    <div class="form-group">
                        <label style="color:#ffffff" for="txtSite">Site</label>
                        <input type="text" class="form-control" name="txtSite" id="txtSite" maxlength="500" placeholder="Link do site (opcional)">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label style="color:#ffffff" for="cep">CEP</label>
                            <input type="text" class="form-control" name="cep" id="cep" placeholder="00000-000" data-mask="00000-000" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label style="color:#ffffff" for="municipio">Município</label>
                            <input type="text" class="form-control" name="municipio" id="municipio" maxlength="50" placeholder="Ex: Campinas" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label style="color:#ffffff" for="UF">UF</label>
                            <input type="text" name="uf" id="uf" style="overflow: scroll" placeholder="UF" class="form-control" pattern="[a-zA-Z]*" maxlength="2" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="color:#ffffff" for="endereco">Endereço</label>
                        <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Adicione complemento, apto, rua etc..." required>
                    </div><br>
                    <button type="submit" class="btn btn-outline-primary btn-lg">Cadastrar</button>
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
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <!--===============================================================================================-->
    <script src="js/jquery.mask.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main2.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript">
        'use strict';

        const SenhaCaracter = () => {
            const senha = document.getElementById("senha").value;
            if (senha.length < 5) {
                document.getElementById("senha").value = "";
                document.getElementById("Search").innerHTML = "<h1 class='animated shake slow' style='color: #c62b2b;'>A senha deve conter pelo menos <strong>5</strong> caracteres.</h1>";
                setTimeout(function() {
                    document.getElementById("Search").innerHTML = "<h1 style='color:#ffffff;'>Search " + "<i class='zmdi zmdi-wifi-alt'></i>" + " Net</h1>";
                }, 4000)
            } else {
                document.getElementById("Search").innerHTML = "<h1 style='color:#ffffff;'>Search " + "<i class='zmdi zmdi-wifi-alt'></i>" + " Net</h1>";
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
                    <?php $erro[] = "CEP não encontrado."; ?>

                    document.getElementById("Search").innerHTML = "<h1 class='animated shake slow' style='color: #C62B2B;'>Cep não encontrado.</h1>";
                    setTimeout(function() {
                        document.getElementById("Search").innerHTML = "<h1 style='color:#ffffff;'>Search " + "<i class='zmdi zmdi-wifi-alt'></i>" + " Net</h1>";
                    }, 4000)

                } else {
                    document.getElementById("Search").innerHTML = "<h1 style='color:#ffffff;'>Search " + "<i class='zmdi zmdi-wifi-alt'></i>" + " Net</h1>";
                    PreencheForm(endereco);
                }

            } else {
                <?php $erro[] = "CEP invalido."; ?>
                document.getElementById("Search").innerHTML = "<h1 class='animated shake slow' style='color: #c62b2b;'>Cep invalido.</h1>";
                document.getElementById("cep").value = "";
                setTimeout(function() {
                    document.getElementById("Search").innerHTML = "<h1 style='color:#ffffff;'>Search " + "<i class='zmdi zmdi-wifi-alt'></i>" + " Net</h1>";
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
        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('municipio').value = ("");
            document.getElementById('endereco').value = ("");
            document.getElementById('uf').value = ("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('municipio').value = (conteudo.localidade);
                document.getElementById('endereco').value = (conteudo.logradouro + ', ' + conteudo.bairro);
                document.getElementById('uf').value = (conteudo.uf);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                <?php //$erro[] = "CEP não encontrado."; 
                ?>
            }
        }

        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('municipio').value = "...";
                    document.getElementById('endereco').value = "...";
                    document.getElementById('uf').value = "...";

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    <?php //$erro[] = "Formato de CEP inválido."; 
                    ?>
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
                <?php //unset($erro); 
                ?>
            }
        }; */
    </script>
</body>

</html>