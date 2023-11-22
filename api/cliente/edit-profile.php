<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

require_once('../global.php');

session_start();

$id = $_SESSION['id'];

$cliente = new Cliente();

$cliente->setNomeCliente($_POST['nome']);
$cliente->setEmailCliente($_POST['email']);
$cliente->setNomeUsuarioCliente($_POST['username']);
$cliente->setSenhaCliente($_SESSION['senha']);

$cep = str_replace('-', '', $_POST['cep']);
$cliente->setCepCliente($cep);
$cliente->setCpfCliente($_SESSION['cpf']);

$cliente->setDtNascCliente($_SESSION['data-nasc']);
$cliente->setLogradouroCliente($_POST['log']);
$cliente->setBairroCliente($_POST['bairro']);
$cliente->setCidadeCliente($_POST['cidade']);
$cliente->setEstadoCliente($_POST['uf']);
$cliente->setComplementoCliente($_POST['comp']);
$cliente->setNumeroCliente($_POST['num']);

$cliente->setIdCliente($id);

daoCliente::editar($cliente);

if (isset($_FILES["foto"]) && !empty($_FILES["foto"]["name"])) {
    if (is_uploaded_file($_FILES["foto"]["tmp_name"])) {
        $nomeimagem = $_FILES['foto']['name'];
        $tipo = $_FILES['foto']['type'];

        $extensao = substr($nomeimagem, -4);
        $extensao == 'jpeg' ? $extensao = substr($nomeimagem, -5) : $extensao;

        $arquivo = "assets/media/users/clientes/" . $id . $extensao;

        move_uploaded_file($_FILES['foto']['tmp_name'], "../../" . $arquivo);

        $cliente->setFotoCliente($arquivo);

        daoCliente::editarFoto($cliente);
    }
}

$consultaCliente = daoCliente::consultaLogin($cliente);

$_SESSION['nome'] = $consultaCliente['nomeCliente'];
$_SESSION['username'] = $consultaCliente['nomeUsuarioCliente'];
$_SESSION['email'] = $consultaCliente['emailCliente'];
$_SESSION['senha'] = $consultaCliente['senhaCliente'];
$_SESSION['data-nasc'] = $consultaCliente['dtNascCliente'];
$_SESSION['foto'] = $consultaCliente['fotoCliente'];
$_SESSION['cidade'] = $consultaCliente['cidadeCliente'];
$_SESSION['estado'] = $consultaCliente['estadoCliente'];
$_SESSION['log'] = $consultaCliente['logradouroCliente'];
$_SESSION['bairro'] = $consultaCliente['bairroCliente'];
$_SESSION['num'] = $consultaCliente['numeroCliente'];
$_SESSION['comp'] = $consultaCliente['complementoCliente'];
$_SESSION['cep'] = $consultaCliente['cepCliente'];
