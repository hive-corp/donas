<?php

    require_once 'global.php';

    header("Location: encomendas.php");

    session_start();

    $encomenda = new PedidoProduto();

    $encomenda->setIdPedidoProduto($_GET['e']);

    if(!empty($_POST['motivo-pedido'])){
        $encomenda->setMotivoCancelamento($_POST['motivo-pedido']);
    }else{
        $encomenda->setMotivoCancelamento('Não especificado');
    }

    daoPedidoProduto::cancelar($encomenda);

    $id = daoPedidoProduto::consultarPorId($_GET['e'])['idAnuncio'];
    $idcliente = daoPedidoProduto::consultarPorId($_GET['e'])['idCliente'];
    
    $notific = new NotifcCliente();

    $cliente = new Cliente();

    $cliente->setIdCliente($idcliente);
    $notific->setCliente($cliente);

    $denuncia = new Denuncia();
    $denuncia->setIdDenuncia(null);

    $anuncio = new Anuncio();

    $anuncio->setIdAnuncio($id);
    $notific->setAnuncio($anuncio);

    $notific->setPedidoProduto($encomenda);

    $notific->setTipoNotificacao(4);
    $notific->setStatusNotificacao(0);

    daoNotifcCliente::cadastrar($notific);
?>
