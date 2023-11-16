<?php

    require_once 'global.php';

    header("Location: index.php");

    session_start();

    $anuncio = new Anuncio();
    $anuncio->setIdAnuncio($_GET['a']);

    $encomendas = daoPedidoProduto::listarPedidosAnuncio($_GET['a']);

    foreach($encomendas as $e){
        $encomenda = new PedidoProduto;
        $encomenda->setIdPedidoProduto($e['idPedidoProduto']);

        daoPedidoProduto::deletar($encomenda);
    }

    daoAnuncio::deletar($anuncio);
?>
