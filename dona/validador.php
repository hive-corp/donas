<?php
require_once 'global.php';

try {
    session_start();

    $vendedora = new Vendedora();

    $vendedora->setEmailVendedora($_SESSION['email']);
    $vendedora->setSenhaVendedora($_SESSION['senha']);

    $consultaVendedora = daoVendedora::consultaLogin($vendedora);
    if ($consultaVendedora == 0) {
        header("Location: ../login.php");
    }
    
} catch (Exception $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
