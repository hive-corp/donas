<?php
    require_once 'global.php';
    header("Location: encomendas.php");
    session_start();

    $agendar = new PedidoServico();

    $agendar->setIdPedidoServico($_GET['e']);

    daoPedidoServico::Aceitar($agendar);
    
?>
