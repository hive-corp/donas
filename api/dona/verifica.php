<?php
header("Access-Control-Allow-Origin: *");

require_once('../global.php');

$vendedora = new Vendedora();

$vendedora->setEmailVendedora($_POST['email']);
$vendedora->setSenhaVendedora($_POST['pass']);

if(daoVendedora::verificaLogin($vendedora)){
    if(daoVendedora::consultaStatus($vendedora)){
        echo 1;
    }else{
        echo 2;
    }
}else{
    echo 0;
}