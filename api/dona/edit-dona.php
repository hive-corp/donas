<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

require_once('../global.php');

session_start();

$id = $_SESSION['id'];

$vendedora = new Vendedora();

$vendedora->setIdVendedora($id);
$vendedora->setNomeVendedora($_POST['nome']);
$vendedora->setEmailVendedora($_POST['email']);
$vendedora->setSenhaVendedora($_SESSION['senha']);
$vendedora->setDtNascVendedora($_SESSION['data-nasc']);
$vendedora->setStatusVendedora(1);

daoVendedora::editarVendedora($vendedora);


if (isset($_FILES["foto-vendedora"]) && !empty($_FILES["foto-vendedora"]["name"])) {
    if (is_uploaded_file($_FILES["foto-vendedora"]["tmp_name"])) {
        $extensao = substr($nomeimagem, -4);
        $extensao == 'jpeg' ? $extensao = substr($nomeimagem, -5) : $extensao;

        $arquivo = "assets/media/users/donas/" . $id . $extensao;

        move_uploaded_file($_FILES['foto-vendedora']['tmp_name'], "../../" . $arquivo);

        $vendedora->setFotoVendedora($arquivo);

        daoVendedora::editarFoto($vendedora);
    }
}

$consultaVendedora = daoVendedora::consultaLogin($vendedora);

$_SESSION['id'] = $consultaVendedora['idVendedora'];
$_SESSION['nome'] = $consultaVendedora['nomeVendedora'];
$_SESSION['email'] = $consultaVendedora['emailVendedora'];
$_SESSION['senha'] = $consultaVendedora['senhaVendedora'];
$_SESSION['data-nasc'] = $consultaVendedora['dtNascVendedora'];
$_SESSION['foto'] = $consultaVendedora['fotoVendedora'];
