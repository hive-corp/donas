<?php

    require_once 'global.php';

    header("Location: anuncio.php?a=".$_GET['a']);

    session_start();

    $anuncio = new Anuncio();
    $anuncio->setIdAnuncio($_GET['a']);

    $dados = daoAnuncio::consultarPorId($_GET['a']);

    $cliente = new Cliente();
    $cliente->setIdCliente($_SESSION['id']);

    $encomenda = new Encomenda();

    $encomenda->setCliente($cliente);
    $encomenda->setAnuncio($anuncio);
    $encomenda->setValorEncomenda($dados['valorAnuncio']);
    $encomenda->setStatusEncomenda(1);

    daoEncomenda::criar($encomenda);
?>