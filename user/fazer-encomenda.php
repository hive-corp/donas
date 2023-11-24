<?php

    require_once 'global.php';

    header("Location: anuncio.php?a=".$_GET['a']);
    session_start();

    $anuncio = new Anuncio();
    $anuncio->setIdAnuncio($_GET['a']);

    $dados = daoAnuncio::consultarPorId($_GET['a']);

    $cliente = new Cliente();
    $cliente->setIdCliente($_SESSION['id']);

    $encomenda = new PedidoProduto();
    $qtd = isset($_POST['qtd']) ? intval($_POST['qtd']) : 1;
    $data = !empty($_POST['data-entrega']) ? $_POST['data-entrega'] : null;
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
?>
