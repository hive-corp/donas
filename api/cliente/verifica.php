<?php
header("Access-Control-Allow-Origin: *");

require_once('../global.php');

$cliente = new Cliente();

$cliente->setEmailCliente($_POST['email']);

$consultaCliente = daoCliente::consultarPorEmail($cliente);
if($consultaCliente == 0 || password_verify($_POST['pass'], $consultaCliente['senhaCliente'])){
    if(daoCliente::consultaStatus($cliente)){
        echo 1;
    }else{
        echo 2;
    }
}else{
    echo 0;
}