<?php

    require_once 'global.php';

    header("Location: profile.php?user=".$_GET['user']);

    session_start();

    $seguidor = new Seguidor();
    
    $cliente = new Cliente();
    $cliente->setIdCliente($_SESSION['id']);
    $seguidor->setCliente($cliente);

    $vendedora = new Vendedora();
    $vendedora->setNomeUsuarioNegocioVendedora($_GET['user']);

    $idvendedora = daoVendedora::consultarIdPorNomeUsuario($vendedora);

    $vendedora->setIdVendedora($idvendedora);

    $seguidor->setVendedora($vendedora);

    daoSeguidor::cadastrar($seguidor);

 
?>