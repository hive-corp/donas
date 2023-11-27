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

$tipoChave = $_POST['tipo-chave'];
    
$chave = $_POST['chave'];

if($tipoChave == 1){
    $chave = str_replace('-', '', $chave);
    $chave = str_replace('.', '', $chave);
    $chave = str_replace('/', '', $chave);
}else if($tipoChave == 3){
    $chave = str_replace('-', '', $chave);
    $chave = str_replace('(', '', $chave);
    $chave = str_replace(')', '', $chave);
    $chave = str_replace(' ', '', $chave);
}

$vendedora->setChavePixVendedora($chave);

daoVendedora::editarChavePix($vendedora);

$consultaVendedora = daoVendedora::consultaLogin($vendedora);

$_SESSION['chave'] = $consultaVendedora['chavePixVendedora'];
