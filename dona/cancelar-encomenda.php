<?php

    require_once 'global.php';

    header("Location: encomendas.php");

    session_start();

    $encomenda = new PedidoProduto();

    $encomenda->setIdPedidoProduto($_GET['e']);

    daoPedidoProduto::cancelar($encomenda);
?>
