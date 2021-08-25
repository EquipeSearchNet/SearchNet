<?php
include("protect.php");
protect();
include("ConecBanco.php");

$email = $_POST["email"];
$senha = md5(md5($_POST["senha"]));
$NomeProv = $_POST["NomeProv"];
$txtTel = $_POST["txtTel"];
$txtCel = $_POST["txtCel"];
$txtSite = $_POST["txtSite"];
$cep = $_POST["cep"];
$municipio = $_POST["municipio"];
$uf = $_POST["uf"];
$endereco = $_POST["endereco"];

if(isset($_POST["email"], $_POST["senha"], $_POST["NomeProv"],  $_POST["txtTel"],  $_POST["txtCel"],  $_POST["txtSite"],  $_POST["cep"],  $_POST["municipio"],  $_POST["uf"],  $_POST["endereco"])) {

$sqlUP = "UPDATE provedora
          SET NomeProv = '$NomeProv', email = '$email', senha = '$senha', TelProv  = '$txtTel', CelProv  = '$txtCel', SiteProv  = '$txtSite', CepProv  = '$cep', MuniProv  = '$municipio', UFProv  = '$uf', EnderProv  = '$endereco'
          WHERE CodProv = '$_SESSION[usuario]'";

}

if($conn->query($sqlUP) == TRUE) {
        
    echo "Alterações efetuadas com sucesso<br>";

} else {

    echo "Erro na inserção: " . $conn->error . "<br>";

}  

// Gravar no array $_UP a Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = 'img/LogoProv/';
// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
// Array com as extensões permitidas
$_UP['extensoes'] = array('png');
// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
$_UP['renomeia'] = true;
// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não há arquivo';

// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {
    die("Não foi possível fazer o upload, erro: " . $_UP['erros'][$_FILES['arquivo']['error']]);
    exit; // Para a execução do script
}

// Consegue o nome do arquivo sem a extensão
$tmp = explode('.', $_FILES['arquivo']['name']);
$sonome = strtolower(reset($tmp));

// Verifica a extensão do arquivo
$extensao = strtolower(end($tmp));
if (array_search($extensao, $_UP['extensoes']) === false) {
    echo "Por favor, envie arquivos com a seguinte extensão: png";
} else {
    if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
        echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
    } else {
        $nome_original = $_FILES['arquivo']['name'];
        if ($_UP['renomeia'] == true) {
            // Coloca o TimeStamp
            $nome_final = $_SESSION['usuario'] . '.' . $extensao;
        } else {
            // Mantém o nome original do arquivo
            $nome_final = $_FILES['arquivo']['name'];
        }
    }

    // Depois verifica se é possível mover o arquivo para a pasta escolhida
    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
        
        // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
        echo "Arquivo alterado com sucesso!";
        
    } else {
        // Não foi possível fazer o upload, provavelmente a pasta está incorreta
        echo "Não foi possível enviar o arquivo, tente novamente";
    }

}
