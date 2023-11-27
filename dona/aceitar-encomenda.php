<?php
    require_once 'global.php';
    header("Location: encomendas.php");
    session_start();

    $encomenda = new PedidoProduto();

    $encomenda->setIdPedidoProduto($_GET['e']);

    daoPedidoProduto::Aceitar($encomenda);


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

    $notific->setTipoNotificacao(3);
    $notific->setStatusNotificacao(0);

    daoNotifcCliente::cadastrar($notific);
?>
