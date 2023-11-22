<?php
header("Access-Control-Allow-Origin: *");

require_once('../global.php');

$vendedora = new Vendedora();

$vendedora->setEmailVendedora($_POST['email']);

$consultaVendedora = daoVendedora::consultarPorEmail($vendedora);
if($consultaVendedora == 0 || password_verify($_POST['pass'], $consultaVendedora['senhaVendedora'])){
    if(daoVendedora::consultaStatus($vendedora)){
        echo 1;
    }else{
        echo 2;
    }
}else{
    echo 0;
}