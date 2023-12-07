<?php

require_once 'global.php';

header("Location: anuncio.php?a=" . $_GET['a']);
session_start();

date_default_timezone_set('America/Sao_Paulo');


$anuncio = new Anuncio();
$anuncio->setIdAnuncio($_GET['a']);

$dados = daoAnuncio::consultarPorId($_GET['a']);

$cliente = new Cliente();
$cliente->setIdCliente($_SESSION['id']);

$encomenda = new PedidoProduto();
$qtd = isset($_POST['qtd']) ? intval($_POST['qtd']) : 1;
$data = !empty($_POST['data']) ? $_POST['data'] : null;
$dataFormatada = !empty($data) ? date('Y-m-d', strtotime($data)) : null;
$dataFeito = date('Y-m-d H:i:s');

// Calcula o valor total com base na quantidade
$valorTotal = $dados['valorAnuncio'] * $qtd;
$encomenda->setCliente($cliente);
$encomenda->setAnuncio($anuncio);
$encomenda->setValorTotal($valorTotal);
$encomenda->setQtdProdutoPedido($qtd);
$encomenda->setDataPedidoFeito($dataFeito);
$encomenda->setDataPedidoEntregue($dataFormatada);
$encomenda->setStatusPedidoProduto(1);

daoPedidoProduto::criar($encomenda);

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

$notific->setTipoNotificacao(2);
$notific->setStatusNotificacao(0);

daoNotifcVendedora::cadastrar($notific);
