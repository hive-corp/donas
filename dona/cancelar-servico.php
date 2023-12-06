<?php

    require_once 'global.php';

    // header("Location: encomendas.php");

    session_start();

    $agendar = new PedidoServico();

    $agendar->setIdPedidoServico($_GET['e']);

    if(!empty($_POST['motivo-servico'])){
        $agendar->setMotivoCancelamento($_POST['motivo-servico']);
    }else{
        $agendar->setMotivoCancelamento('Não especificado');
    }

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

    $notific->setPedidoServico($agendar);
    $notific->setTipoNotificacao(8);
    $notific->setStatusNotificacao(0);

    daoNotifcCliente::cadastrar($notific);
?>
