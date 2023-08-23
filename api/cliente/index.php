<?php

header("Access-Control-Allow-Origin: *");

require_once('../global.php');

$cliente = new Cliente();

$cliente->setNomeCliente($_POST['nome']);
$cliente->setEmailCliente($_POST['email']);
$cliente->setNomeUsuarioCliente($_POST['username']);
$cliente->setSenhaCliente($_POST['pass']);
$cliente->setCepCliente($_POST['cep']);

$cpf = str_replace('.', '', $_POST['cpf']);
$cliente->setCpfCliente($cpf);

$cliente->setDtNascCliente($_POST['nasc']);
$cliente->setLogradouroCliente($_POST['log']);
$cliente->setBairroCliente($_POST['bairro']);
$cliente->setCidadeCliente($_POST['cidade']);
$cliente->setEstadoCliente($_POST['uf']);
$cliente->setComplementoCliente($_POST['comp']);
$cliente->setNumeroCliente($_POST['num']);

daoCliente::cadastrar($cliente);

$id = daoCliente::consultarIdPorEmail($cliente);

$nomeimagem = $_FILES['foto']['name'];
$tipo = $_FILES['foto']['type'];

$extensao = substr($nomeimagem, -4);
$extensao == 'jpeg' ? $extensao = substr($nomeimagem, -5) : $extensao;

$arquivo = "assets/img/users/clientes/" . $id . $extensao;

move_uploaded_file($_FILES['foto']['tmp_name'], "../../".$arquivo);

$cliente->setIdCliente($id);
$cliente->setFotoCliente($arquivo);

daoCliente::editarFoto($cliente);

