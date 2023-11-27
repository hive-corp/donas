<?php

    require_once 'global.php';

    header("Location: encomendas.php");

    session_start();

    $agendar = new PedidoServico();

    $agendar->setIdPedidoServico($_GET['e']);

    daoPedidoServico::cancelar($agendar);

    $id = daoPedidoServico::consultarPorId($_GET['e'])['idAnuncio'];
    $idcliente = daoPedidoServico::consultarPorId($_GET['e'])['idCliente'];
    
    $notific = new NotifcCliente();

    $cliente = new Cliente();

    $cliente->setIdCliente($idcliente);
    $notific->setCliente($cliente);

    $denuncia = new Denuncia();
    $denuncia->setIdDenuncia(null);

    $anuncio = new Anuncio();

    $anuncio->setIdAnuncio($id);
    $notific->setAnuncio($anuncio);

    $notific->setTipoNotificacao(8);
    $notific->setStatusNotificacao(0);

    daoNotifcCliente::cadastrar($notific);
?>
