<?php

require_once('../global.php');

$vendedora = new Vendedora();

$vendedora->setNomeVendedora($_POST['nome']);
$vendedora->setEmailVendedora($_POST['email']);
$vendedora->setSenhaVendedora($_POST['pass']);
$vendedora->setDtNascVendedora($_POST['nasc']);
$vendedora->setStatusVendedora(0);
$vendedora->setNomeNegocioVendedora($_POST['nome-empresa']);
$vendedora->setNomeUsuarioNegocioVendedora($_POST['username-empresa']);
$vendedora->setLogNegocio($_POST['log']);
$vendedora->setCidadeNegocioVendedora($_POST['cidade']);
$vendedora->setEstadoNegocioVendedora($_POST['uf']);
$vendedora->setBairroNegocioVendedora($_POST['bairro']);
$vendedora->setNumNegocioVendedora($_POST['num']);
$vendedora->setCompNegocioVendedora($_POST['comp']);
$vendedora->setCepNegocioVendedora($_POST['cep']);
$vendedora->setCnpjNegocioVendedora($_POST['cnpj']);
$vendedora->setNivelNegocioVendedora($_POST['nivel'] == "Premium" ? 1 : 0);

$categoria = new Categoria();

$categoria->setIdCategoria($_POST['categoria']);

$vendedora->setCategoria($categoria);

daoVendedora::cadastrar($vendedora);

$id = daoVendedora::consultarIdPorEmail($vendedora);
$vendedora->setIdVendedora($id);

$nomeimagem = $_FILES['foto-vendedora']['name'];
$tipo = $_FILES['foto-vendedora']['type'];

$extensao = substr($nomeimagem, -4);
$extensao == 'jpeg' ? $extensao = substr($nomeimagem, -5) : $extensao;

$arquivo = "assets/img/users/donas/" . $id . $extensao;

move_uploaded_file($_FILES['foto-vendedora']['tmp_name'], "../../".$arquivo);

$vendedora->setFotoVendedora($arquivo);

daoVendedora::editarFoto($vendedora);

$nomeimagem = $_FILES['foto-empresa']['name'];
$tipo = $_FILES['foto-empresa']['type'];

$extensao = substr($nomeimagem, -4);
$extensao == 'jpeg' ? $extensao = substr($nomeimagem, -5) : $extensao;

$arquivo = "assets/img/users/negocios/" . $id . $extensao;

move_uploaded_file($_FILES['foto-empresa']['tmp_name'], "../../".$arquivo);

$vendedora->setFotoNegocioVendedora($arquivo);

daoVendedora::editarFotoNegocio($vendedora);
?>