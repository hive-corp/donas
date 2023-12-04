<?php

require_once 'global.php';

header("Location: seus-pedidos.php");

session_start();

$agendar = new PedidoServico();

$agendar->setIdPedidoServico($_GET['e']);

daoPedidoServico::cancelar($agendar);

$id = daoPedidoServico::consultarPorId($_GET['e'])['idAnuncio'];
$idcliente = $_SESSION['id'];
$idvendedora = daoAnuncio::consultarPorId($id)['idVendedora'];

$notific = new NotifcVendedora();

$cliente = new Cliente();
$cliente->setIdCliente($idcliente);
$notific->setCliente($cliente);

$anuncio = new Anuncio();
$anuncio->setIdAnuncio($id);
$notific->setAnuncio($anuncio);

$vendedora = new Vendedora();
$vendedora->setIdVendedora($idvendedora);
$notific->setVendedora($vendedora);

$notific->setTipoNotificacao(5);
$notific->setStatusNotificacao(0);

daoNotifcVendedora::cadastrar($notific);
