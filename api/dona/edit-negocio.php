<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

require_once('../global.php');

session_start();

$id = $_SESSION['id'];

$vendedora = new Vendedora();

$vendedora->setIdVendedora($id);

$vendedora->setEmailVendedora($_SESSION['email']);
$vendedora->setSenhaVendedora($_SESSION['senha']);


$vendedora->setNomeNegocioVendedora($_POST['nome-empresa']);
$vendedora->setNomeUsuarioNegocioVendedora($_POST['username-empresa']);
$vendedora->setBioNegocioVendedora($_POST['bio-empresa']);
$vendedora->setLogNegocio($_POST['log']);
$vendedora->setCidadeNegocioVendedora($_POST['cidade']);
$vendedora->setEstadoNegocioVendedora($_POST['uf']);
$vendedora->setBairroNegocioVendedora($_POST['bairro']);
$vendedora->setNumNegocioVendedora($_POST['num']);
$vendedora->setCompNegocioVendedora($_POST['comp']);

$cep = str_replace('-', '', $_POST['cep']);
$vendedora->setCepNegocioVendedora($cep);

$cnpj = str_replace('-', '', $_POST['cnpj']);
$cnpj = str_replace('.', '', $cnpj);
$cnpj = str_replace('/', '', $cnpj);
$vendedora->setCnpjNegocioVendedora($cnpj);

$vendedora->setNivelNegocioVendedora($_SESSION['nivel-vendedora']);

$tel = str_replace('-', '', $_POST['telefone']);

$vendedora->setTelefoneNegocioVendedora($tel);

$categoria = new Categoria();

$categoria->setIdCategoria($_POST['categoria']);
$vendedora->setCategoria($categoria);

daoVendedora::editarNegocio($vendedora);

if (isset($_FILES["foto-empresa"]) && !empty($_FILES["foto-empresa"]["name"])) {
    if (is_uploaded_file($_FILES["foto-empresa"]["tmp_name"])) {
        $nomeimagem = $_FILES['foto-empresa']['name'];
        $tipo = $_FILES['foto-empresa']['type'];

        $extensao = substr($nomeimagem, -4);
        $extensao == 'jpeg' ? $extensao = substr($nomeimagem, -5) : $extensao;

        $arquivo = "assets/media/users/negocios/" . $id . $extensao;

        move_uploaded_file($_FILES['foto-empresa']['tmp_name'], "../../" . $arquivo);

        $vendedora->setFotoNegocioVendedora($arquivo);

        daoVendedora::editarFotoNegocio($vendedora);
    }
}

$consultaVendedora = daoVendedora::consultaLogin($vendedora);

$_SESSION['nome-empresa'] = $consultaVendedora['nomeNegocioVendedora'];
$_SESSION['username'] = $consultaVendedora['nomeUsuarioNegocioVendedora'];
$_SESSION['bio'] = $consultaVendedora['bioNegocioVendedora'];
$_SESSION['tel'] = $consultaVendedora['telefoneNegocioVendedora'];
$_SESSION['foto-empresa'] = $consultaVendedora['fotoNegocioVendedora'];
$_SESSION['cidade'] = $consultaVendedora['cidadeNegocioVendedora'];
$_SESSION['estado'] = $consultaVendedora['estadoNegocioVendedora'];
$_SESSION['log'] = $consultaVendedora['logNegocioVendedora'];
$_SESSION['bairro'] = $consultaVendedora['bairroNegocioVendedora'];
$_SESSION['num'] = $consultaVendedora['numNegocioVendedora'];
$_SESSION['comp'] = $consultaVendedora['compNegocioVendedora'];
$_SESSION['cep'] = $consultaVendedora['cepNegocioVendedora'];
$_SESSION['cnpj'] = $consultaVendedora['cnpjNegocioVendedora'];
$_SESSION['nivel-vendedora'] = $consultaVendedora['nivelNegocioVendedora'];
$_SESSION['categoria-id'] = $consultaVendedora['idCategoria'];

