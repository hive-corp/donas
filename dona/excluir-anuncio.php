<?php

    require_once 'global.php';

    header("Location: index.php");

    session_start();

    $anuncio = new Anuncio();
    $anuncio->setIdAnuncio($_GET['a']);

    $encomendas = daoEncomenda::listarEncomendasAnuncio($_GET['a']);

    foreach($encomendas as $e){
        $encomenda = new Encomenda;
        $encomenda->setIdEncomenda($e['idEncomenda']);

        daoEncomenda::deletar($encomenda);
    }

    daoAnuncio::deletar($anuncio);
?>