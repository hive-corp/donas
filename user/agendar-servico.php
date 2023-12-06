<?php

require_once 'global.php';

// header("Location: anuncio.php?a=" . $_GET['a']);
session_start();

$anuncio = new Anuncio();
$anuncio->setIdAnuncio($_GET['a']);

$dados = daoAnuncio::consultarPorId($_GET['a']);

$cliente = new Cliente();
$cliente->setIdCliente($_SESSION['id']);

$agendar = new PedidoServico();
$data = !empty($_POST['data']) ? $_POST['data'] : null;
$dataFormatada = !empty($data) ? date('Y-m-d\TH:i', strtotime($data)) : null;
$dataFeito = date('Y-m-d H:i:s');
// Calcula o valor total com base na quantidade
$valorTotal = $dados['valorAnuncio'];
$agendar->setCliente($cliente);
$agendar->setAnuncio($anuncio);
$agendar->setValorTotal($valorTotal);
$agendar->setDataServicoContratado($dataFeito);
$agendar->setDataServicoMarcado($dataFormatada);
$agendar->setStatusPedidoServico(1);

daoPedidoServico::criar($agendar);

$idcliente = $_SESSION['id'];
$idvendedora = daoAnuncio::consultarPorId($_GET['a'])['idVendedora'];

$notific = new NotifcVendedora();

$cliente = new Cliente();
$cliente->setIdCliente($idcliente);
$notific->setCliente($cliente);

$anuncio = new Anuncio();
$anuncio->setIdAnuncio($_GET['a']);
$notific->setAnuncio($anuncio);

$vendedora = new Vendedora();
$vendedora->setIdVendedora($idvendedora);
$notific->setVendedora($vendedora);

$notific->setTipoNotificacao(3);
$notific->setStatusNotificacao(0);

daoNotifcVendedora::cadastrar($notific);
