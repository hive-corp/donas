<?php

    require_once 'global.php';

    header("Location: anuncio.php?a=".$_GET['a']);

    session_start();

    $avaliacao = new Avaliacao();
    
    $cliente = new Cliente();
    $cliente->setIdCliente($_SESSION['id']);
    $avaliacao->setCliente($cliente);

    $avaliacao->setConteudoAvaliacao($_POST['comentario']);

    $anuncio = new Anuncio();
    $anuncio->setIdAnuncio($_GET['a']);
    $avaliacao->setAnuncio($anuncio);

    $estrelas = isset($_POST['rate']) ? $_POST['rate'] : 0;
    $avaliacao->setEstrelasAvaliacao($estrelas);

    daoAvaliacao::cadastrar($avaliacao);

    $mediaEstrelas = daoAvaliacao::consultarMediaAvaliacao($_GET['a']);

    $anuncio->setEstrelasAnuncio($mediaEstrelas);

    daoAnuncio::editarEstrelas($anuncio);
?>