<?php
require_once 'global.php';

try {
    session_start();

    $cliente = new Cliente();

    $cliente->setEmailCliente($_SESSION['email']);
    $cliente->setSenhaCliente($_SESSION['senha']);

    $consultaCliente = daoCliente::consultaLogin($cliente);
    if ($consultaCliente == 0) {
        header("Location: ../login.php");
    }
    
} catch (Exception $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
