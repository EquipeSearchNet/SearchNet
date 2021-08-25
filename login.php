<?php

include("ConecBanco.php");

if (!isset($_SESSION))
		session_start();

if (isset($_SESSION['usuario'])) {

    header("Location: site.php");
}

if (isset($_POST['email']) && strlen($_POST['email']) > 0) {

	$_SESSION['email'] = $conn->escape_string($_POST['email']);
	//$_SESSION['senha'] = $_POST['senha'];
	$_SESSION['senha'] = md5(md5($_POST['senha']));

	$sql_code = "SELECT senha, codprov FROM provedora WHERE email = '$_SESSION[email]'";
	$sql_query = $conn->query($sql_code) or die($conn->error);
	$dado = $sql_query->fetch_assoc();
	$total = $sql_query->num_rows;

	if ($total == 0) {
		$erro[] = "Este email nao pertence a nenhum usuario";
	} else {
		if ($dado['senha'] == $_SESSION['senha']) {
			$_SESSION['usuario'] = $dado['codprov'];
		} else {
			$erro[] = "Senha Incorreta";
		}
	}

	if (count(array($erro)) == 0 || !isset($erro)) {
		header('Location: site.php');
	}
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Search Net - Login</title>
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
	<link rel="stylesheet" type="text/css" href="css/main2.css">
	<!--===============================================================================================-->
</head>

<body>
	<div class="limiter">
		<div class="container-login100" style="background-color: #233237;">
			<div class="wrap-login100"  style="background-image: linear-gradient(#32484D, #121212);">
				<form id="login" class="login100-form validate-form" action="" method="POST">
					<span style="color: #ffffff;" class="login100-form-title p-b-26">
						Bem vindo
					</span>
					<span class="login100-form-title p-b-48">
						<?php
						if (isset($erro) && count(array($erro)) > 0) {
							foreach ($erro as $msg) {
								echo "<h4>$msg</h4>";
							}
						} else {
						?> <h4 style="color: #ffffff;">Search<i class="zmdi zmdi-wifi-alt"></i>Net</h4> <?php
																			}
																				?>
					</span>

					<div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
						<input class="input100" type="text" maxlength="200" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="senha">
						<span class="focus-input100" data-placeholder="Senha"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span style="color: #A6A6A6;" class="txt1">
							Não possui conta?
						</span>

						<a style="color: #A6A6A6;" class="txt2" href="cadastrar.php">
							Cadastrar
						</a>
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
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main2.js"></script>
</body>

</html>