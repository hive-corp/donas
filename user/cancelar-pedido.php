<?php

    require_once 'global.php';

    header("Location: seus-pedidos.php");

    session_start();

    $encomenda = new PedidoProduto();

    $encomenda->setIdPedidoProduto($_GET['p']);

    daoPedidoProduto::cancelar($encomenda);
?>
