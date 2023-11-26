<?php
    require_once 'global.php';
    header("Location: encomendas.php");

    session_start();

    $pagar = new Vendedora();

    $pagar->setIdVendedora($_SESSION['id']);

    daoVendedora::alterarNivel($pagar);
?>