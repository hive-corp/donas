<?php

    require_once 'global.php';

    header("Location: anuncio.php?a=".$_GET['a']);

    session_start();

    $anuncio = new Anuncio();
    $anuncio->setIdAnuncio($_GET['a']);

    $dados = daoAnuncio::consultarPorId($_GET['a']);

    $cliente = new Cliente();
    $cliente->setIdCliente($_SESSION['id']);

    $encomenda = new PedidoProduto();

    $encomenda->setCliente($cliente);
    $encomenda->setAnuncio($anuncio);
    $encomenda->setValorTotal($dados['valorAnuncio']);
    $encomenda->setStatusPedidoProduto(1);

    daoPedidoProduto::criar($encomenda);
?>
